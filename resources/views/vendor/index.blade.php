@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('vendor.vendors') }}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body p-2">
                            {{ $dataTable->table() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-delete" style="display: none;" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <form id="deleteForm" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('vendor.delete_title') }}</h4>
                    </div>
                    <div class="modal-body">
                        <p>{{ __('vendor.sure') }}</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-danger">{{ __('vendor.delete_btn') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('scripts')

    {{ $dataTable->scripts() }}

    <script type="module">

        $(document).on("click", ".open-delete-modal", function () {
            $("#deleteForm").attr('action', "{{ route('vendors.destroy', '') }}" + '/' + $(this).data('vendor'));
            $('#modal-delete').modal('show');
        });

    </script>

@endpush
