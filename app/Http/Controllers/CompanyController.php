<?php

    namespace App\Http\Controllers;

    use App\Company;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Validation\Rule;

    class CompanyController extends Controller
    {

        public function validator( Request $request, $rules = [] )
        {
            return $this->validate( $request, [
                'CompanyName'         => [ 'required', 'min:2', 'max:255' ],
                'Ticker'              => [],
                'NickName'            => [],
                'Address_1'           => [],
                'Address_2'           => [],
                'City'                => [],
                'State'               => [],
                'PostalCode'          => [],
                'HomeCountry'         => [],
                'MainCountryOfOrigin' => [],
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
            $user      = Auth::user();
            $companies = [];
            if ( ! $user ) {
                return view( 'company.index', compact( 'companies' ) );
            }
            $companies = $user->company()->withCount( [ 'contacts' ] )->get();

            return view( 'company.index', compact( 'companies' ) );
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
            $user->company()->create( $validated );
            $company = $user->company;

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

            return redirect( '/companies' );
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

            return redirect( '/companies' );
        }
    }
