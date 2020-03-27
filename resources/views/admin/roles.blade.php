@extends('admin.layoutAdmin')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Uloge</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 style="float:left;" class="m-0 font-weight-bold text-primary">Upravljanje Ulogama</h6>
                <div style="float:right; width:50%; text-align: right;" class="col-sm-6 ">
                    <a href="{{route('roles.create')}}" class="btn btn-success "><i
                            class="material-icons" style="float: left;padding-right: 0.5em;">&#xE147;</i>
                        <span class="">Dodaj novu ulogu</span></a>
                </div>
            </div>

            @if(session('message'))
                <div style="max-width: 50%;margin-top: 1em;margin-left: auto;margin-right: auto;font-weight: bold;"
                     id="poruka" class="alert alert-success align-content-center">
                    <p style="margin: 0 auto;" class="text-center">{{ session('message') }}</p>
                </div>
            @elseif(session('error'))
                <div style="max-width: 50%;margin-top: 1em;margin-left: auto;margin-right: auto;font-weight: bold;"
                     id="poruka" class="alert alert-danger align-content-center">
                    <p style="margin: 0 auto;" class="text-center">{{ session('error') }}</p>
                </div>
            @endif

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Naziv uloge</th>
                            <th>Id uloge</th>
                            <th style="text-align:center;" colspan="2">Akcije</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Naziv uloge</th>
                            <th>Id uloge</th>
                            <th style="text-align:center;" colspan="2">Akcije</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td >{{ $role->id_r }}</td>
                                <td style="text-align: center" class="align-middle">
                                    <a href="{{route('roles.edit', $role->id_r)}}" class="edit">
                                        <i class="material-icons" data-toggle="tooltip" title="Izmeni">&#xE254;</i>
                                    </a>
                                </td>
                                <td style="text-align: center" class="align-middle"><a href="{{route('roles.del', $role->id_r)}}" class="delete">
                                        <i class="material-icons" data-toggle="tooltip" title="Obriši">&#xE872;</i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
@endsection
