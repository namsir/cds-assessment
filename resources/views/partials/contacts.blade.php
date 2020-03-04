<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col">
            <a href="/contacts/create" class="btn btn-primary">Create a contact</a>
        </div>
    </div>
</div>
<div class="container mt-5">

    <div class="row justify-content-center">

        @foreach($contacts as $contact)
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        {{ $company->CompanyName ??  'Unknown'}}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $contact->Title }} {{ $contact->FName }} {{ $contact->MName }} {{ $contact->LName }} {{ $contact->Suffix }}</h5>
                        <p class="card-text">Address: {{ $contact->Address_1 }}</p>
                        <p class="card-text">Address 2: {{ $contact->Address_2 }}</p>
                        <p class="card-text">City: {{ $contact->City }}</p>
                        <p class="card-text">State: {{ $contact->State }}</p>
                        <p class="card-text">Postal Code: {{ $contact->PostalCode }}</p>
                        <p class="card-text">Website: {{ $contact->Website }}</p>
                        <p class="card-text">Primary Email: <a
                                href="mailto:{{ $contact->Email_Primary }}">{{$contact->Email_Primary}}</a></p>
                        <p class="card-text">Email 2: <a
                                href="mailto:{{ $contact->Email_2 }}">{{$contact->Email_2}}</a></p>
                        <p class="card-text">Email 3: <a
                                href="mailto:{{ $contact->Email_2 }}">{{$contact->Email_3}}</a></p>
                        <p class="card-text">Email 4: <a
                                href="mailto:{{ $contact->Email_2 }}">{{$contact->Email_4}}</a></p>
                        <p class="card-text">Primary Phone: <a
                                href="tel:{{ $contact->Phone_Primary }}">{{$contact->Phone_Primary}}</a></p>
                        <p class="card-text">Mobile Phone: <a
                                href="tel:{{ $contact->Phone_Mobile }}">{{$contact->Phone_Mobile}}</a></p>
                        <p class="card-text">Landline: <a
                                href="tel:{{ $contact->Phone_Land }}">{{$contact->Phone_Land}}</a></p>
                        <p class="card-text">Fax: <a
                                href="tel:{{ $contact->Phone_Fax }}">{{$contact->Phone_Fax}}</a></p>
                        <p class="card-text">Twitter Handler: {{ $contact->TwitterHandle }}</p>
                        <p class="card-text">Facebook Name: {{ $contact->FacebookName }}</p>

                        <p class="card-text">Active: {{ $contact->Active ? 'Yes':'No' }}</p>
                        <p class="card-text {{ $contact->Deleted ? 'alert-danger':'' }}">Deleted: {{ $contact->Deleted ? 'Yes':'No' }}</p>
                        <p class="card-text">Archived: {{ $contact->Archived ? 'Yes':'No' }}</p>

                        <a href="/contacts/{{$contact->PRI}}/edit" class="btn btn-primary">Edit</a>

                        <form action="/contacts/{{$contact->PRI}}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
