@extends('layouts.app')

@section('content')
    <div class="col-md-12 mt-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Animali</h3>
                <div class="float-right">
                    <a href="{{ route('animals.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus" aria-hidden="true"></i> Crea nuovo
                    </a>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Specie</th>
                        <th style="width: 40px">Razza</th>
                        <th>Sterilizzato</th>
                        <th>Proprietario</th>
                        <th>Azioni</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($animals as $animal)
                        <tr>
                            <td>
                                {{$animal->name}}
                            </td>
                            <td>
                                {{$animal->species}}
                            </td>
                            <td>
                                {{$animal->breed}}
                            </td>
                            <td>
                                {{$animal->is_sterilized_label}}
                            </td>
                            <td>
                                {{ isset($animal->customer) ? $animal->customer->name :'' }}
                            </td>
                            <td>
                                <a href="{{ route('animals.edit',$animal) }}" class="text-primary mr-3">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route('animals.destroy',$animal) }}" class="text-danger delete-animal">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">Niente da mostrare</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">

                </ul>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="module">
        $('.delete-animal').on('click',function(e){
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
    </script>
@endsection
