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

            ] );
        }

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $user     = Auth::user();
            $company  = $user->company;
            $contacts = $company->with( 'contacts' )->get();

            return view( 'contact.index', compact( 'contacts', 'company' ) );
        }

        /**
         * Show the form for creating a new resource.
         *
         * @param Request $
         * @param Company $company
         *
         * @return void
         */
        public function create()
        {
            $company = Auth::user()->company;

            return view( 'contact.create', compact( 'company' ) );
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
            $user = Auth::user();
            if ( ! $user->company ) {
                abort( 404, 'Please create a company before submit a contact!' );
            }

            $validated = $this->validator( $request );
            $contact   = $user->company->contacts()->create( $validated );
            $user->logs()->create( [
                                       'Action'  => 'CREATE',
                                       'Subject' => 'CONTACT ' . $contact->FName . ' ' . $contact->LName,
                                   ] );

            return redirect( '/contacts' );
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
         * @param Contact $contact
         *
         * @return \Illuminate\Http\Response
         */
        public function edit( Contact $contact )
        {
            return view( 'contact.edit', compact( 'contact' ) );
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param Contact $contact
         *
         * @return void
         */
        public function update( Request $request, Contact $contact )
        {
            $user    = Auth::user();
            $company = $user->company;

            if ( $company->contacts()->exists() ) {

                $validated = $this->validator( $request );

                $contact->update( $validated );

                $user->logs()->create( [
                                           'Action'  => 'UPDATE',
                                           'Subject' => 'CONTACT ' . $contact->FName . ' ' . $contact->LName,
                                       ] );

                return redirect( '/contacts' );
            }

            abort( 404, 'This contact does not belong to you! Abort!' );
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param Contact $contact
         *
         * @return void
         */
        public function destroy( Contact $contact )
        {
            $user    = Auth::user();
            $company = $user->company;

            if ( $company->contacts()->exists() ) {
                $contact->Deleted = 1;
                $contact->save();

                $user->logs()->create( [
                                           'Action'  => 'DELETE',
                                           'Subject' => 'CONTACT ' . $contact->FName . ' ' . $contact->LName,
                                       ] );

                return redirect( '/contacts' );
            }

            abort( 404, 'This contact does not belong to you! Abort!' );

        }
    }
