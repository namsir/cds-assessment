
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="/companies">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="companyname">Company Name</label>
                        <input type="text" name="CompanyName" class="form-control @error('CompanyName') is-invalid @enderror" id="companyname" value="{{ old('CompanyName') }}">
                        @error('CompanyName')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="ticker">Ticker</label>
                        <input type="text" name="Ticker" class="form-control @error('Ticker') is-invalid @enderror" id="ticker" value="{{ old('Ticker') }}">
                        @error('Ticker')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="nickname">NickName</label>
                    <input type="text" class="form-control @error('NickName') is-invalid @enderror" id="nickname" name="NickName" value="{{ old('NickName') }}">
                    @error('NickName')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control @error('Address_1') is-invalid @enderror" name="Address_1" id="inputAddress" placeholder="1234 Main St" value="{{ old('Address_1') }}">
                    @error('Address_1')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Address 2</label>
                    <input type="text" class="form-control @error('Address_2') is-invalid @enderror" name="Address_2" id="inputAddress2" placeholder="Apartment, studio, or floor" value="{{ old('Address_2') }}">
                    @error('Address_2')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" name="City" class="form-control @error('City') is-invalid @enderror" id="inputCity" value="{{ old('City') }}">
                        @error('City')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">State</label>
                        <input type="text" name="State" class="form-control @error('State') is-invalid @enderror" id="inputState" value="{{ old('State') }}">
                        @error('State')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="PostalCode">Postal Code</label>
                        <input type="text" name="PostalCode" class="form-control @error('PostalCode') is-invalid @enderror" id="PostalCode" value="{{ old('PostalCode') }}">
                        @error('PostalCode')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="HomeCountry">Home Country</label>
                        <input type="text" name="HomeCountry" class="form-control @error('HomeCountry') is-invalid @enderror" id="HomeCountry" value="{{ old('HomeCountry') }}">
                        @error('HomeCountry')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="MainCountryOfOrigin">Main Country Of Origin</label>
                        <input type="text" name="MainCountryOfOrigin" class="form-control @error('MainCountryOfOrigin') is-invalid @enderror" id="MainCountryOfOrigin" value="{{ old('MainCountryOfOrigin') }}">
                        @error('MainCountryOfOrigin')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
            </form>

        </div>
    </div>
</div>
@endsection
