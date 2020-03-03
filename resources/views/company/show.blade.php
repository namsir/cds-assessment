@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="post" action="/companies/{{$company->PRI}}">
                    @csrf
                    @method('PATCH')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="companyname">Company Name</label>
                            <input type="text" name="CompanyName" class="form-control" id="companyname" value="{{$company->CompanyName}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ticker">Ticker</label>
                            <input type="text" name="Ticker" class="form-control" id="ticker" value="{{$company->Ticker}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nickname">NickName</label>
                        <input type="text" class="form-control" id="nickname" name="NickName" value="{{$company->NickName}}">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" name="Address_1" id="inputAddress" value="{{$company->Address_1}}"
                               placeholder="1234 Main St">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Address 2</label>
                        <input type="text" class="form-control" name="Address_2" id="inputAddress2" value="{{$company->Address_2}}"
                               placeholder="Apartment, studio, or floor">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">City</label>
                            <input type="text" name="City" class="form-control" id="inputCity" value="{{$company->City}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">State</label>
                            <input type="text" name="State" class="form-control" id="inputState" value="{{$company->State}}">
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="inputZip">Postal Code</label>
                            <input type="text" name="PostalCode" class="form-control" id="inputZip" value="{{$company->PostalCode}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputZip">Home Country</label>
                            <input type="text" name="PostalCode" class="form-control" id="inputZip" value="{{$company->Country}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputZip">Main Country Of Origin</label>
                            <input type="text" name="MainCountryOfOrigin" class="form-control" id="inputZip" value="{{$company->MainCountryOfOrigin}}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-check mb-4">
                            <input class="form-check-input" name="Active" type="checkbox" id="companyactive"  {{  ($company->Active ? ' checked' : '') }}>
                            <label class="form-check-label" for="companyactive">
                                Active
                            </label>
                        </div>
                        <div class="form-check mb-4">
                            <input class="form-check-input" name="Deleted" type="checkbox" id="companydeleted" {{  ($company->Deleted ? ' checked' : '') }}>
                            <label class="form-check-label" for="companydeleted">
                                Deleted
                            </label>
                        </div>
                        <div class="form-check mb-4">
                            <input class="form-check-input" name="Archived" type="checkbox" id="companyarchived" {{  ($company->Archived ? ' checked' : '') }}>
                            <label class="form-check-label" for="companyarchived">
                                Archived
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection
