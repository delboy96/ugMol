@extends('admin.layoutAdmin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Vesti</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 style="float:left;" class="m-0 font-weight-bold text-primary">Upravljanje Vestima</h6>
                <div style="float:right; width:50%; text-align: right;" class="col-sm-6 ">
                    <a href="{{route('news.create')}}" class="btn btn-success "><i
                            class="material-icons" style="float: left;padding-right: 0.5em;">&#xE147;</i>
                        <span class="">Dodaj novu vest</span></a>
                </div>
            </div>
            <nav style="margin-top: 20px;" class="blog-pagination justify-content-center d-flex">
                <ul class="pagination">
                    @if ($news->lastPage() > 1)
                        @for ($i = 1; $i <= $news->lastPage(); $i++)
                            <li class="{{ ($news->currentPage() == $i) ? ' active page-item' : 'page-item' }}">
                                <a class="page-link" href="{{ $news->url($i) }}">{{ $i }}</a>
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
                            <th>Naslov</th>
                            <th>Sadržaj</th>
                            <th>Slika</th>
                            <th>Postavljeno</th>
                            <th style="text-align:center;" colspan="2">Akcije</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Naslov</th>
                            <th>Sadržaj</th>
                            <th>Slika</th>
                            <th>Postavljeno</th>
                            <th style="text-align:center;" colspan="2">Akcije</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($news as $n)
                            <tr>
                                <td>{{ $n->title }}</td>
                                <td style="width: 65%">{{ $n->body }}</td>
                                <td>
                                    <img src="{{ $n->img }}" alt="preview" width="200" height="200" />
                                </td>
                                {{--                                <td>{{ $post->time }}</td>--}}
                                <td>{{ Carbon\Carbon::parse($n->date)->diffForHumans() }}</td>
                                <td style="text-align: center" class="align-middle">
                                    <a href="{{route('news.edit', $n->id)}}" class="edit">
                                        <i class="material-icons" data-toggle="tooltip" title="Izmeni">&#xE254;</i>
                                    </a>
                                </td>
                                <td style="text-align: center" class="align-middle"><a href="{{route('news.del', $n->id)}}" class="delete">
                                        <i class="material-icons" data-toggle="tooltip" title="Obriši">&#xE872;</i></a>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                    <div class="col-lg-12">
                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                @if ($news->lastPage() > 1)
                                    @for ($i = 1; $i <= $news->lastPage(); $i++)
                                        <li class="{{ ($news->currentPage() == $i) ? ' active page-item' : 'page-item' }}">
                                            <a class="page-link" href="{{ $news->url($i) }}">{{ $i }}</a>
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
