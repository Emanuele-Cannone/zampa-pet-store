@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('vendor.new_vendor') }}</h1>
                </div>
            </div>
        </div>
    </div>
    <form method="post" action="{{ route('vendors.store') }}">
        @csrf
        @include('vendor.partials.form')
    </form>
    <!-- /.content -->
@endsection
