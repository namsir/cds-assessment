@extends('layouts.app')

@section('content')
    @if(count(Auth()->user()->company->contacts))
        @include('partials.contacts', [ 'contacts' =>  Auth()->user()->company->contacts])
    @else
        <div class="container">
            <div class="row justify-content-center">
                You do not have any contacts! click&nbsp;<a href="/contacts/create" class="card-link">here</a>&nbsp;to start.
            </div>
        </div>
    @endif
@endsection
