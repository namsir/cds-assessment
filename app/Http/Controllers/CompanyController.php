<?php

    namespace App\Http\Controllers;

    use App\Company;
    use App\Log;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Validation\Rule;

    class CompanyController extends Controller
    {

        public function validator( Request $request, $rules = [] )
        {
            return $this->validate( $request, [
                'CompanyName'         => [ 'required', 'min:2', 'max:255' ],
                'Ticker'              => [ 'sometimes', 'nullable', 'string', 'max:50' ],
                'NickName'            => [ 'sometimes', 'nullable', 'string', 'max:255' ],
                'Address_1'           => [ 'sometimes', 'nullable', 'string', 'max:255' ],
                'Address_2'           => [ 'sometimes', 'nullable', 'string', 'max:255' ],
                'City'                => [ 'sometimes', 'nullable', 'alpha', 'max:50' ],
                'State'               => [ 'sometimes', 'nullable', 'alpha', 'max:5' ],
                'PostalCode'          => [ 'sometimes', 'nullable', 'string', 'max:10' ],
                'HomeCountry'         => [ 'sometimes', 'nullable', 'string', 'max:255' ],
                'MainCountryOfOrigin' => [ 'sometimes', 'nullable', 'string', 'max:255' ],
                'Active'              => [],
                'Deleted'             => [],
                'Archived'            => [],

            ] );
        }

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $user = Auth::user();

            if ( ! $user ) {
                return view( 'company.index', compact( 'companies' ) );
            }
            $company = $user->company()->with( [ 'contacts' ] )->first();

            return view( 'company.index', compact( 'company' ) );
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view( 'company.create' );
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         *
         * @return \Illuminate\Http\Response
         */
        public function store( Request $request )
        {
            $user      = Auth::user();
            $validated = $this->validator( $request );

            $company = $user->company()->create( $validated );

            $user->logs()->create( [
                                       'Action'  => 'CREATE',
                                       'Subject' => 'COMPANY ' . $company->CompanyName,
                                   ] );

            return view( 'company.index', compact( 'company' ) );
        }

        /**
         * Display the specified resource.
         *
         * @param int $id
         *
         * @return \Illuminate\Http\Response
         */
        public function show( Request $request, Company $company )
        {
            return view( 'company.show', compact( 'company' ) );
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param Request $request
         * @param Company $company
         *
         * @return void
         * @throws \Exception
         */
        public function edit( Request $request, Company $company )
        {

            return view( 'company.edit', compact( 'company' ) );
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param Company $company
         *
         * @return void
         */
        public function update( Request $request, Company $company )
        {
            $validated               = $this->validator( $request );
            $validated[ 'Active' ]   = $request->has( 'Active' );
            $validated[ 'Deleted' ]  = $request->has( 'Deleted' );
            $validated[ 'Archived' ] = $request->has( 'Archived' );

            if ( $validated[ 'Deleted' ] ) {
                $validated[ 'Active' ]   = 0;
                $validated[ 'Archived' ] = 0;
            }
            $company->update( $validated );

            Auth()->user()->logs()->create( [
                                                'Action'  => 'UPDATE',
                                                'Subject' => 'COMPANY ' . $company->CompanyName,
                                            ] );

            return redirect( '/company' );
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param Request $request
         * @param Company $company
         *
         * @return void
         */
        public function destroy( Request $request, Company $company )
        {
            $company->Deleted = 1;
            $company->save();
            Auth()->user()->logs()->create( [
                                                'Action'  => 'DELETE',
                                                'Subject' => 'COMPANY ' . $company->CompanyName,
                                            ] );

            return redirect( '/companies' );
        }
    }
