@extends('layouts.app')

@section('content')
    <?php
    // dd($companies);
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Suffix</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Middle Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Address 1</th>
                        <th scope="col">Address 2</th>
                        <th scope="col">City</th>
                        <th scope="col">State</th>
                        <th scope="col">Postal Code</th>
                        <th scope="col">Website</th>
                        <th scope="col">Primary Email</th>
                        <th scope="col">Email 2</th>
                        <th scope="col">Email 3</th>
                        <th scope="col">Email 4</th>
                        <th scope="col">Primary Phone</th>
                        <th scope="col">Mobile Phone</th>
                        <th scope="col">Landline Phone</th>
                        <th scope="col">Tax</th>
                        <th scope="col">Twitter</th>
                        <th scope="col">Facebook</th>
                        <th scope="col">Active</th>
                        <th scope="col">Deleted</th>
                        <th scope="col">Archived</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <th scope="row">{{ $contact->PRI }}</th>
                            <td>{{ $contact->Title }}</td>
                            <td>{{ $contact->Suffix }}</td>
                            <td>{{ $contact->FName }}</td>
                            <td>{{ $contact->MName }}</td>
                            <td>{{ $contact->LName }}</td>
                            <td>{{ $contact->Address_1 }}</td>
                            <td>{{ $contact->Address_2 }}</td>
                            <td>{{ $contact->City }}</td>
                            <td>{{ $contact->State }}</td>
                            <td>{{ $contact->PostalCode }}</td>
                            <td>{{ $contact->Website }}</td>
                            <td>{{ $contact->Email_Primary }}</td>
                            <td>{{ $contact->Email_2 }}</td>
                            <td>{{ $contact->Email_3 }}</td>
                            <td>{{ $contact->Email_4 }}</td>
                            <td>{{ $contact->Phone_Primary }}</td>
                            <td>{{ $contact->Phone_Mobile }}</td>
                            <td>{{ $contact->Phone_Land }}</td>
                            <td>{{ $contact->Phone_Tax }}</td>
                            <td>{{ $contact->TwitterHandle }}</td>
                            <td>{{ $contact->FacebookName }}</td>
                            <td>{{ $contact->Active ? 'Yes':'No' }}</td>
                            <td>{{ $contact->Deleted ? 'Yes':'No' }}</td>
                            <td>{{ $contact->Archived ? 'Yes':'No' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
