
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" action="/contacts">
                    @csrf
                    <input name="company_id" type="hidden" value="{{$company_id}}">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="companyname">Title</label>
                            <input type="text" name="Title" class="form-control" id="companyname">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="suffix">Suffix</label>
                            <input type="text" name="Suffix" class="form-control" id="suffix">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="ticker">First Name</label>
                            <input type="text" name="FName" class="form-control" id="ticker">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="LName" class="form-control" id="lastname">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" name="Address_1" id="inputAddress" placeholder="1234 Main St">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Address 2</label>
                        <input type="text" class="form-control" name="Address_2" id="inputAddress2" placeholder="Apartment, studio, or floor">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">City</label>
                            <input type="text" name="City" class="form-control" id="inputCity">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">State</label>
                            <input type="text" name="State" class="form-control" id="inputState">
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="postalcode">Postal Code</label>
                            <input type="text" name="PostalCode" class="form-control" id="postalcode">
                        </div>
                        <div class="form-group col-md-10">
                            <label for="website">Website</label>
                            <input type="text" name="Website" class="form-control" id="website">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="primaryemail">Primary Email</label>
                            <input type="text" name="Email_Primary" class="form-control" id="primaryemail">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="email2">Email 2</label>
                            <input type="text" name="Email_2" class="form-control" id="email2">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="email3">Email 3</label>
                            <input type="text" name="Email_3" class="form-control" id="email3">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="email4">Email 4</label>
                            <input type="text" name="Email_4" class="form-control" id="email4">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="primaryphone">Primary Phone</label>
                            <input type="text" name="Phone_Primary" class="form-control" id="primaryphone">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="mobile">Mobile</label>
                            <input type="text" name="Phone_Mobile" class="form-control" id="mobile">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="landline">Landline</label>
                            <input type="text" name="Phone_Land" class="form-control" id="landline">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="fax">Fax</label>
                            <input type="text" name="Phone_Fax" class="form-control" id="fax">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>
                </form>

            </div>
        </div>
    </div>
@endsection
