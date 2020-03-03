
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
                        <input type="text" name="CompanyName" class="form-control" id="companyname">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="ticker">Ticker</label>
                        <input type="text" name="Ticker" class="form-control" id="ticker">
                    </div>
                </div>
                <div class="form-group">
                    <label for="nickname">NickName</label>
                    <input type="text" class="form-control" id="nickname" name="NickName">
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
                        <label for="inputZip">Postal Code</label>
                        <input type="text" name="PostalCode" class="form-control" id="inputZip">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputZip">Home Country</label>
                        <input type="text" name="PostalCode" class="form-control" id="inputZip">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputZip">Main Country Of Origin</label>
                        <input type="text" name="MainCountryOfOrigin" class="form-control" id="inputZip">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
            </form>

        </div>
    </div>
</div>
@endsection
