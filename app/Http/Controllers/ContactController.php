<?php

    namespace App\Http\Controllers;

    use App\Company;
    use App\Contact;
    use App\Log;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class ContactController extends Controller
    {

        public function validator( Request $request, $rules = [] )
        {
            return $this->validate( $request, [
                'Title'         => [ 'required', 'min:2', 'max:50' ],
                'Suffix'        => [ 'sometimes', 'nullable', 'string', 'max:50' ],
                'FName'         => [ 'sometimes', 'nullable', 'alpha', 'max:50' ],
                'MName'         => [ 'sometimes', 'nullable', 'string', 'max:50' ],
                'LName'         => [ 'sometimes', 'nullable', 'string', 'max:50' ],
                'Address_1'     => [ 'sometimes', 'nullable', 'string', 'max:255' ],
                'Address_2'     => [ 'sometimes', 'nullable', 'string', 'max:255' ],
                'City'          => [ 'sometimes', 'nullable', 'alpha', 'max:50' ],
                'State'         => [ 'sometimes', 'nullable', 'alpha', 'max:5' ],
                'PostalCode'    => [ 'sometimes', 'nullable', 'string', 'max:24' ],
                'Website'       => [ 'sometimes', 'nullable', 'url', 'max:255' ],
                'Email_Primary' => [ 'sometimes', 'nullable', 'email:rfc,dns', 'max:255' ],
                'Email_2'       => [ 'sometimes', 'nullable', 'email:rfc,dns', 'max:255' ],
                'Email_3'       => [ 'sometimes', 'nullable', 'email:rfc,dns', 'max:255' ],
                'Email_4'       => [ 'sometimes', 'nullable', 'email:rfc,dns', 'max:255' ],
                'Phone_Primary' => [ 'sometimes', 'nullable', 'string', 'max:10' ],
                'Phone_Mobile'  => [ 'sometimes', 'nullable', 'string', 'max:10' ],
                'Phone_Land'    => [ 'sometimes', 'nullable', 'string', 'max:10' ],
                'Phone_Fax'     => [ 'sometimes', 'nullable', 'string', 'max:10' ],
                'TwitterHandle' => [ 'sometimes', 'nullable', 'string', 'max:255' ],
                'FacebookName'  => [ 'sometimes', 'nullable', 'string', 'max:255' ],

            ] );
        }

        /**
         * Display a listing of the resource.
         *
         * @param Request $request
         * @param Company $company
         *
         * @return \Illuminate\Http\Response
         */
        public function index( Request $request, Company $company )
        {
            $user = Auth::user();
            if ( $user->PRI === $company->User_Key ) {
                $contacts = $company->contacts()->get();

                return view( 'contact.index', compact( 'contacts', 'company' ) );
            }

            abort( 404, 'Company not found' );
        }

        /**
         * Show the form for creating a new resource.
         *
         * @param Request $
         * @param Company $company
         *
         * @return void
         */
        public function create( Request $request, Company $company )
        {
            if ( Auth::user()->PRI === $company->User_Key ) {
                return view( 'contact.create', compact( 'company' ) );
            }
            abort( 404, 'Invalid Company' );
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         *
         * @return \Illuminate\Http\Response
         */
        public function store( Request $request, Company $company )
        {
            $user = Auth::user();
            if ( $user->PRI !== $company->User_Key ) {
                abort( 404, 'Please create a company before submit a contact!' );
            }

            $validated             = $this->validator( $request );
            $validated[ 'Active' ] = 1;
            $contact               = $company->contacts()->create( $validated );
            $this->createLog( $contact, 'CREATE' );

            return redirect( '/companies/' . $company->PRI . '/contacts' );
        }

        /**
         * Display the specified resource.
         *
         * @param int $id
         *
         * @return \Illuminate\Http\Response
         */
        public function show( $id )
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param Request $request
         * @param Company $company
         * @param Contact $contact
         *
         * @return \Illuminate\Http\Response
         */
        public function edit( Request $request, Company $company, Contact $contact )
        {
            return view( 'contact.edit', compact( 'contact', 'company' ) );
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param Company $company
         * @param Contact $contact
         *
         * @return void
         */
        public function update( Request $request, Company $company, Contact $contact )
        {
            $user = Auth::user();

            if ( $user->PRI !== $company->User_Key ) {
                abort( 404, 'Invalid Company' );
            }
            if ( $contact->Company_Key !== $company->PRI ) {
                abort( 404, 'Contact not found' );
            }

            $validated = $this->validator( $request );

            $contact->update( $validated );

            $this->createLog( $contact, 'UPDATE' );

            return redirect( '/companies/' . $company->PRI . '/contacts' );


        }


        public function createLog( $contact, $action )
        {
            $log = new Log( [
                                'Action'   => $action,
                                'User_Key' => Auth::user()->PRI,
                            ] );
            $contact->logs()->save( $log );
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param Company $company
         * @param Contact $contact
         *
         * @return void
         */
        public function destroy( Company $company, Contact $contact )
        {
            $user = Auth::user();
            if ( $user->PRI !== $company->User_Key ) {
                abort( 404, 'Invalid Company' );
            }
            if ( $contact->Company_Key !== $company->PRI ) {
                abort( 404, 'Contact not found' );
            }

            $contact->Deleted  = 1;
            $contact->Active   = 0;
            $contact->Archived = 0;
            $contact->save();

            $this->createLog( $contact, 'DELETE' );

            return redirect( '/companies/' . $company->PRI . '/contacts' );

        }

        public function archive( Company $company, Contact $contact )
        {
            $user = Auth::user();
            if ( $user->PRI !== $company->User_Key ) {
                abort( 404, 'Invalid Company' );
            }
            if ( $contact->Company_Key !== $company->PRI ) {
                abort( 404, 'Contact not found' );
            }

            $contact->Deleted  = 0;
            $contact->Active   = 0;
            $contact->Archived = 1;
            $contact->save();

            $this->createLog( $contact, 'ARCHIVE' );

            return redirect( '/companies/' . $company->PRI . '/contacts' );

        }

        public function active( Company $company, Contact $contact )
        {
            $user = Auth::user();
            if ( $user->PRI !== $company->User_Key ) {
                abort( 404, 'Invalid Company' );
            }
            if ( $contact->Company_Key !== $company->PRI ) {
                abort( 404, 'Contact not found' );
            }

            $contact->Deleted  = 0;
            $contact->Active   = 1;
            $contact->Archived = 0;
            $contact->save();

            $this->createLog( $contact, 'ACTIVE' );

            return redirect( '/companies/' . $company->PRI . '/contacts' );

        }
    }
