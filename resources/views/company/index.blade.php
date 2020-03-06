@extends('layouts.app')

@section('content')
    @if(count($companies))
        @include('partials.companies', [ 'companies' =>  $companies ])
    @else
        <div class="container">
            <div class="row justify-content-center">
                You do not have any companies! click&nbsp;<a href="/companies/create" class="card-link">here</a>&nbsp;to start.
            </div>
        </div>
    @endif
@endsection
