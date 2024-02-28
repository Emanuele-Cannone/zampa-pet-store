@extends('layouts.app')

@section('content')
    <div class="content-header d-flex justify-content-between">
        <div class="col-sm-6">
            <h1 class="m-0">{{ __('vendor.vendors') }}</h1>
        </div>
        <a href="{{ route('vendors.create') }}" type="button"
           class="btn btn-success">{{ __('vendor.new_vendor') }}</a>
    </div>

    <div class="content">

{{--        <input type="text" class="search">--}}

        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>{{ __('vendor.company_name') }}</th>
                <th>{{ __('common.city') }}</th>
                <th>{{ __('common.email') }}</th>
                <th>{{ __('common.telephone') }}</th>
                <th>{{ __('common.actions') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($vendors as $vendor)
                <tr>
                    <td class="align-middle">{{ $vendor->company_name }}</td>
                    <td class="align-middle">{{ $vendor->city }}</td>
                    <td class="align-middle">{{ $vendor->email }}</td>
                    <td class="align-middle">{{ $vendor->telephone }}</td>
                    <td>
                        <a href="{{ route('vendors.edit', $vendor) }}" type="button"
                           class="btn btn-warning">{{ __('common.edit') }}</a>
                        <a href="{{ route('vendors.destroy', $vendor) }}" type="button"
                           class="btn btn-danger delete-modal">{{ __('common.edit') }}</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            {{ $vendors->links() }}
        </table>
    </div>


@endsection

@push('scripts')

    <script type="module">
        $('.delete-modal').on('click',function(e){
            e.preventDefault();
            let href = $(this).attr('href');
            let token = $('meta[name="csrf-token"]').attr('content');
            let that = this;
            Swal.fire({
                title: "Sicuro di voler eliminare questo elemento?",
                confirmButtonText: "Si",
                showCancelButton: true,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        url: href,
                        method: 'DELETE',
                        data:{
                            _token: token,
                        },
                        success: function(result) {
                            Swal.fire({
                                title: "Operazione eseguita con successo!",
                                icon: "success"
                            });
                            $(that).closest('tr').remove();
                        },
                        error: function(request,msg,error) {
                            Swal.fire({
                                title: "Qualcosa è andato storto riprovare più tardi!",
                                icon: "danger"
                            });
                        }
                    });
                }
            });
        });

        {{--$('.search').on('keyup', function(){--}}
        {{--    let search = this.val();--}}
        {{--    window.location.href = {{ route('vendors.index') }} + '?search=' + search;--}}
        {{--});--}}

    </script>

@endpush
