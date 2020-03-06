<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col">
            <a href="/companies/create" class="btn btn-primary">Create a company</a>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row justify-content-center">

        @foreach($companies as $company)

            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Owner: {{ $company->owner->name ??  'Unknown'}}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $company->CompanyName }}</h5>
                        <p class="card-text">Ticker: {{ $company->Ticker }}</p>
                        <p class="card-text">NickName: {{ $company->NickName }}</p>
                        <p class="card-text">Address: {{ $company->Address_1 }}</p>
                        <p class="card-text">Address 2: {{ $company->Address_2 }}</p>
                        <p class="card-text">City: {{ $company->City }}</p>
                        <p class="card-text">State: {{ $company->State }}</p>
                        <p class="card-text">PostalCode: {{ $company->PostalCode }}</p>
                        <p class="card-text">HomeCountry: {{ $company->HomeCountry }}</p>
                        <p class="card-text">MainCountryOfOrigin: {{ $company->MainCountryOfOrigin }}</p>
                        <p class="card-text">Contacts: {{ $company->contacts_count }}</p>

                        <p class="card-text">Active: {{ $company->Active ? 'Yes':'No' }}</p>
                        <p class="card-text {{ $company->Deleted ? 'alert-danger':'' }}">Deleted: {{ $company->Deleted ? 'Yes':'No' }}</p>
                        <p class="card-text">Archived: {{ $company->Archived ? 'Yes':'No' }}</p>

                        <a href="/companies/{{$company->PRI}}/contacts" class="btn btn-primary">View Contacts</a>
                        <a href="/contacts/{{$company->PRI}}/edit" class="btn btn-primary">Edit</a>
                        <form action="/companies/{{$company->PRI}}/active" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-info">Active</button>
                        </form>
                        <form action="/companies/{{$company->PRI}}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <form class="d-inline" action="/companies/{{$company->PRI}}/archive" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-secondary">Archive</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
