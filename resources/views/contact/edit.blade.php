@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" action="/companies/{{$company->PRI}}/contacts/{{$contact->PRI}}">
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="companyname">Title</label>
                            <input type="text" name="Title" class="form-control @error('Title') is-invalid @enderror"
                                   id="companyname" value="{{ $contact->Title }}">
                            @error('Title')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="suffix">Suffix</label>
                            <input type="text" name="Suffix" class="form-control @error('Suffix') is-invalid @enderror"
                                   id="suffix" value="{{ $contact->Suffix }}">
                            @error('Suffix')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="fname">First Name</label>
                            <input type="text" name="FName" class="form-control @error('FName') is-invalid @enderror"
                                   id="fname" value="{{ $contact->FName }}">
                            @error('FName')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="mname">Middle Name</label>
                            <input type="text" name="MName" class="form-control @error('MName') is-invalid @enderror"
                                   id="mname" value="{{ $contact->MName }}">
                            @error('MName')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="LName" class="form-control @error('LName') is-invalid @enderror"
                                   id="lastname" value="{{ $contact->LName }}">
                            @error('LName')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control @error('Address_1') is-invalid @enderror"
                               name="Address_1" id="inputAddress" placeholder="1234 Main St"
                               value="{{ $contact->Address_1 }}">
                        @error('Address_1')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Address 2</label>
                        <input type="text" class="form-control @error('Address_2') is-invalid @enderror"
                               name="Address_2" id="inputAddress2" placeholder="Apartment, studio, or floor"
                               value="{{ $contact->Address_2 }}">
                        @error('Address_2')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">City</label>
                            <input type="text" name="City" class="form-control @error('City') is-invalid @enderror"
                                   id="inputCity" value="{{ $contact->City }}">
                            @error('City')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">State</label>
                            <input type="text" name="State" class="form-control @error('State') is-invalid @enderror"
                                   id="inputState" value="{{ $contact->State }}">
                            @error('State')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="postalcode">Postal Code</label>
                            <input type="text" name="PostalCode"
                                   class="form-control @error('PostalCode') is-invalid @enderror" id="postalcode"
                                   value="{{ $contact->PostalCode }}">
                            @error('PostalCode')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-10">
                            <label for="website">Website</label>
                            <input type="text" name="Website"
                                   class="form-control @error('Website') is-invalid @enderror" id="website"
                                   value="{{ $contact->Website }}">
                            @error('Website')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="primaryemail">Primary Email</label>
                            <input type="text" name="Email_Primary"
                                   class="form-control @error('Email_Primary') is-invalid @enderror" id="primaryemail"
                                   value="{{ $contact->Email_Primary }}">
                            @error('Email_Primary')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="email2">Email 2</label>
                            <input type="text" name="Email_2"
                                   class="form-control @error('Email_2') is-invalid @enderror" id="email2"
                                   value="{{ $contact->Email_2 }}">
                            @error('Email_2')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="email3">Email 3</label>
                            <input type="text" name="Email_3"
                                   class="form-control @error('Email_3') is-invalid @enderror" id="email3"
                                   value="{{$contact->Email_3 }}">
                            @error('Email_3')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>
                        <div class="form-group col-md-3">
                            <label for="email4">Email 4</label>
                            <input type="text" name="Email_4"
                                   class="form-control @error('Email_4') is-invalid @enderror" id="email4"
                                   value="{{ $contact->Email_4 }}">
                            @error('Email_4')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="TwitterHandle">Twitter Handler</label>
                            <input type="text" name="TwitterHandle"
                                   class="form-control @error('TwitterHandle') is-invalid @enderror" id="TwitterHandle"
                                   value="{{ $contact->TwitterHandle }}">
                            @error('TwitterHandle')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>
                        <div class="form-group col-md-6">
                            <label for="FacebookName">Facebook Name</label>
                            <input type="text" name="FacebookName"
                                   class="form-control @error('FacebookName') is-invalid @enderror" id="FacebookName"
                                   value="{{ $contact->FacebookName }}">
                            @error('FacebookName')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="primaryphone">Primary Phone</label>
                            <input type="text" name="Phone_Primary"
                                   class="form-control @error('Phone_Primary') is-invalid @enderror" id="primaryphone"
                                   value="{{ $contact->Phone_Primary }}">
                            @error('Phone_Primary')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>
                        <div class="form-group col-md-3">
                            <label for="mobile">Mobile</label>
                            <input type="text" name="Phone_Mobile"
                                   class="form-control @error('Phone_Mobile') is-invalid @enderror" id="mobile"
                                   value="{{ $contact->Phone_Mobile }}">
                            @error('Phone_Mobile')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>
                        <div class="form-group col-md-3">
                            <label for="landline">Landline</label>
                            <input type="text" name="Phone_Land"
                                   class="form-control @error('Phone_Land') is-invalid @enderror" id="landline"
                                   value="{{ $contact->Phone_Land }}">
                            @error('Phone_Land')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="fax">Fax</label>
                            <input type="text" name="Phone_Fax"
                                   class="form-control @error('Phone_Fax') is-invalid @enderror" id="fax"
                                   value="{{ $contact->Phone_Fax }}">
                            @error('Phone_Fax')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{url()->previous()}}" class="btn btn-primary">Go Back</a>
                </form>

            </div>
        </div>
    </div>
@endsection
