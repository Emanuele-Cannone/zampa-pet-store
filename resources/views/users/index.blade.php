@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Users') }}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="alert alert-info">
                        Sample table page
                    </div>

                    <div class="card">
                        <div class="card-body p-0">

                            {{ $dataTable->table() }}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
        {{ $dataTable->scripts() }}
@endpush
