@extends('layouts.app')

@section('content')
    <?php
    // dd($companies);
    ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(count($companies) > 0)
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Company Name</th>
                            <th scope="col">Ticker</th>
                            <th scope="col">NickName</th>
                            <th scope="col">Address</th>
                            <th scope="col">Address 2</th>
                            <th scope="col">City</th>
                            <th scope="col">State</th>
                            <th scope="col">Postal Code</th>
                            <th scope="col">Home Country</th>
                            <th scope="col">Main Country Of Origin</th>
                            <th scope="col"># of Contacts</th>
                            <th scope="col">Active</th>
                            <th scope="col">Deleted</th>
                            <th scope="col">Archived</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($companies as $company)
                            <tr>
                                <th scope="row">{{ $company->PRI }}</th>
                                <td>{{ $company->CompanyName }}</td>
                                <td>{{ $company->Ticker }}</td>
                                <td>{{ $company->NickName }}</td>
                                <td>{{ $company->Address_1 }}</td>
                                <td>{{ $company->Address_2 }}</td>
                                <td>{{ $company->City }}</td>
                                <td>{{ $company->State }}</td>
                                <td>{{ $company->PostalCode }}</td>
                                <td>{{ $company->HomeCountry }}</td>
                                <td>{{ $company->MainCountryOfOrigin }}</td>
                                <td>{{ $company->contacts_count }}</td>
                                <td>{{ $company->Active ? 'Yes':'No' }}</td>
                                <td>{{ $company->Deleted ? 'Yes':'No' }}</td>
                                <td>{{ $company->Archived ? 'Yes':'No' }}</td>
                                <td>
                                    <a href="/companies/{{$company->PRI}}" type="button" class="btn btn-info btn-sm">View</a>
                                    <a href="/companies/{{$company->PRI}}/edit" type="button"
                                       class="btn btn-info btn-sm">Edit</a>
                                    <form action="/companies/{{$company->PRI}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button href="/companies/{{$company->PRI}}"
                                                type="submit"
                                                class="btn btn-danger btn-sm">Delete
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    @if(Auth::user())
                        <h2>You do not have any companies. Please <a href="/companies/create">Click here</a> to create
                            one.</h2>
                    @else
                        <h2>You do not have any companies. Please <a href="/login">login</a> to create one.</h2>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection
