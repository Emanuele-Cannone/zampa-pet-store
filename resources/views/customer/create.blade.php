@extends('layouts.app')

@section('content')
    <div class="col-md-12 mt-3">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Crea nuovo cliente</h3>
                <div class="float-right">
                    <a href="{{ route('customers.index') }}" class="btn btn-primary">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Indietro
                    </a>
                </div>
            </div>

            <form method="POST" action="{{ route('customers.store') }}">
                @include('customer.partials.form')
            </form>
        </div>
    </div>
@endsection
