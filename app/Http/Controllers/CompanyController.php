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


            $companies = $user->companies()->with('owner')->withCount( [ 'contacts' ] )->get();

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
            $user                  = Auth::user();
            $validated             = $this->validator( $request );
            $validated[ 'Active' ] = 1;
            $company               = $user->companies()->create( $validated );

            $log         = new Log();
            $log->Action = 'CREATE';

            $this->createLog( $company, 'CREATE' );

            return redirect( '/companies' );
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
            if ( $company->User_Key !== $request->user()->PRI ) {
                abort( 404, 'Company not found' );
            }
            $contacts = $company->contacts;

            return view( 'company.show', compact( 'company', 'contacts' ) );
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

            if ( $company->User_Key !== $request->user()->PRI ) {
                abort( 404, 'Company not found' );
            }

            if ( $validated[ 'Deleted' ] ) {
                $validated[ 'Active' ]   = 0;
                $validated[ 'Archived' ] = 0;
            }

            $company->update( $validated );

            $this->createLog( $company, 'UPDATE' );

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
            if ( $company->User_Key !== $request->user()->PRI ) {
                abort( 404, 'Company not found' );
            }
            $company->Deleted  = 1;
            $company->Active   = 0;
            $company->Archived = 0;
            $company->save();
            $this->createLog( $company, 'DELETE' );

            return redirect( '/companies' );
        }

        public function archive( Request $request, Company $company )
        {
            if ( $company->User_Key !== $request->user()->PRI ) {
                abort( 404, 'Company not found' );
            }
            $company->Deleted  = 0;
            $company->Active   = 0;
            $company->Archived = 1;
            $company->save();
            $this->createLog( $company, 'ARCHIVE' );

            return redirect( '/companies' );
        }

        public function active( Request $request, Company $company )
        {
            if ( $company->User_Key !== $request->user()->PRI ) {
                abort( 404, 'Company not found' );
            }
            $company->Deleted  = 0;
            $company->Active   = 1;
            $company->Archived = 0;
            $company->save();
            $this->createLog( $company, 'ACTIVE' );

            return redirect( '/companies' );
        }


        public function createLog( $company, $action )
        {
            $log = new Log( [
                                'Action'   => $action,
                                'User_Key' => Auth::user()->PRI,
                            ] );
            $company->logs()->save( $log );
        }
    }
