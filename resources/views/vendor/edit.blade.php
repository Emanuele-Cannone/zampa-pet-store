@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('vendor.edit_vendor') .' - '.$vendor->company_name }}</h1>
                </div>
            </div>
        </div>
    </div>
    <form method="post" action="{{ route('vendors.update', $vendor) }}">
        @method('PUT')
        @csrf
        @include('vendor.partials.form')
    </form>
    <!-- /.content -->
@endsection
