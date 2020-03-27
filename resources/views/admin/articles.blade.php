@extends('admin.layoutAdmin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Članci</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 style="float:left;" class="m-0 font-weight-bold text-primary">Upravljanje Člancima</h6>
                <div style="float:right; width:50%; text-align: right;" class="col-sm-6 ">
                    <a href="{{route('articles.create')}}" class="btn btn-success " ><i
                            class="material-icons" style="float: left;padding-right: 0.5em;">&#xE147;</i>
                        <span class="">Dodaj novi članak</span></a>
                </div>
            </div>
            <nav style="margin-top: 20px;" class="blog-pagination justify-content-center d-flex">
                <ul class="pagination">
                    @if ($articles->lastPage() > 1)
                        @for ($i = 1; $i <= $articles->lastPage(); $i++)
                            <li class="{{ ($articles->currentPage() == $i) ? ' active page-item' : 'page-item' }}">
                                <a class="page-link" href="{{ $articles->url($i) }}">{{ $i }}</a>
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
                        @foreach($articles as $article)
                            <tr>
                                <td>{{ $article->title }}</td>
                                <td style="width: 65%">{{ $article->body }}</td>
                                <td>{{ $article->img }}</td>
                                {{--                                <td>{{ $post->time }}</td>--}}
                                <td>{{ Carbon\Carbon::parse($article->date)->diffForHumans() }}</td>
                                <td style="text-align: center" class="align-middle">
                                    <a href="{{route('articles.edit', $article->id)}}" class="edit">
                                        <i class="material-icons" data-toggle="tooltip" title="Izmeni">&#xE254;</i>
                                    </a>
                                </td>
                                <td style="text-align: center" class="align-middle"><a href="{{route('article.del', $article->id)}}" class="delete">
                                        <i class="material-icons" data-toggle="tooltip" title="Obriši">&#xE872;</i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="col-lg-12">
                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                @if ($articles->lastPage() > 1)
                                    @for ($i = 1; $i <= $articles->lastPage(); $i++)
                                        <li class="{{ ($articles->currentPage() == $i) ? ' active page-item' : 'page-item' }}">
                                            <a class="page-link" href="{{ $articles->url($i) }}">{{ $i }}</a>
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
