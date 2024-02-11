@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('cluster.new_cluster') }}</h1>
                </div>
            </div>
        </div>
    </div>
    <form method="post" action="{{ route('clusters.store') }}">
        @csrf
        @include('cluster.partials.form')

        <div class="d-flex justify-content-end py-2">
            <button type="submit" class="btn btn-success">{{ __('common.create') }}</button>
        </div>
    </form>
    <!-- /.content -->
@endsection
