@extends('admin.layoutAdmin')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Korisnici</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 style="float:left;" class="m-0 font-weight-bold text-primary">Upravljanje Korisnicima</h6>
                <div style="float:right; width:50%; text-align: right;" class="col-sm-6 ">
                    <a href="{{route('users.create')}}" class="btn btn-success "><i
                            class="material-icons" style="float: left;padding-right: 0.5em;">&#xE147;</i>
                        <span class="">Dodaj novog korisnika</span></a>
                </div>
            </div>
            <nav style="margin-top: 20px;" class="blog-pagination justify-content-center d-flex">
                <ul class="pagination">
                    @if ($users->lastPage() > 1)
                        @for ($i = 1; $i <= $users->lastPage(); $i++)
                            <li class="{{ ($users->currentPage() == $i) ? ' active page-item' : 'page-item' }}">
                                <a class="page-link" href="{{ $users->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                </ul>
                @endif
            </nav>

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
                            <th>Ime</th>
                            <th>Mejl</th>
                            <th>Uloga</th>
                            <th>Aktivan</th>
                            <th style="text-align:center;" colspan="2">Akcije</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Ime</th>
                            <th>Mejl</th>
                            <th>Uloga</th>
                            <th>Aktivan</th>
                            <th style="text-align:center;" colspan="2">Akcije</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td >{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->active ? 'Aktivan' : 'Nije aktivan' }}</td>
                                <td style="text-align: center" class="align-middle">
                                    <a href="{{route('users.edit', $user->id_u)}}" class="edit">
                                        <i class="material-icons" data-toggle="tooltip" title="Izmeni">&#xE254;</i>
                                    </a>
                                </td>
                                <td style="text-align: center" class="align-middle"><a href="{{route('users.del', $user->id_u)}}" class="delete">
                                        <i class="material-icons" data-toggle="tooltip" title="Obriši">&#xE872;</i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="col-lg-12">
                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                @if ($users->lastPage() > 1)
                                    @for ($i = 1; $i <= $users->lastPage(); $i++)
                                        <li class="{{ ($users->currentPage() == $i) ? ' active page-item' : 'page-item' }}">
                                            <a class="page-link" href="{{ $users->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                            </ul>
                            @endif
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection
