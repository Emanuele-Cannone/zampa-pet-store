@extends('layouts.app')

@section('content')
    <div class="col-md-12 mt-3">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Modifica cliente - <b class="text-uppercase">{{$customer->name}}</b></h3>
                <div class="float-right">
                    <a href="{{ route('customers.index') }}" class="btn btn-primary">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Indietro
                    </a>
                </div>
            </div>

            <form method="POST" action="{{ route('customers.update',$customer) }}">
                @method('PUT')
                @include('customer.partials.form')
            </form>
        </div>
    </div>
@endsection
