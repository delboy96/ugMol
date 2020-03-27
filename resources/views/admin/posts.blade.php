@extends('admin.layoutAdmin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Događaji</h1>
    <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 style="float:left;" class="m-0 font-weight-bold text-primary">Upravljanje Događajima</h6>
                <div style="float:right; width:50%; text-align: right;" class="col-sm-6 ">
                    <a href="{{route('posts.create')}}" class="btn btn-success " ><i
                            class="material-icons" style="float: left;padding-right: 0.5em;">&#xE147;</i>
                        <span class="">Dodaj novi događaj</span></a>
                </div>
            </div>
            <nav style="margin-top: 20px;" class="blog-pagination justify-content-center d-flex">
                <ul class="pagination">
                    @if ($posts->lastPage() > 1)
                        @for ($i = 1; $i <= $posts->lastPage(); $i++)
                            <li class="{{ ($posts->currentPage() == $i) ? ' active page-item' : 'page-item' }}">
                                <a class="page-link" href="{{ $posts->url($i) }}">{{ $i }}</a>
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
                            <th>Podnaslov</th>
                            <th>Sadržaj</th>
                            <th>Citat</th>
                            <th>Datum</th>
                            <th>Slika</th>
                            <th>Postavljeno</th>
                            <th style="text-align:center;" colspan="2">Akcije</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Naslov</th>
                            <th>Podnaslov</th>
                            <th>Sadržaj</th>
                            <th>Citat</th>
                            <th>Datum</th>
                            <th>Slika</th>
                            <th>Postavljeno</th>
                            <th style="text-align:center;" colspan="2">Akcije</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->subtitle }}</td>
                                <td style="width: 30%">{{ $post->body }}</td>
                                <td>{{ $post->citat }}</td>
                                <td>{{ $post->datum }}</td>
                                <td >{{ $post->img }}</td>
{{--                                <td>{{ $post->time }}</td>--}}
                                <td>{{ Carbon\Carbon::parse($post->time)->diffForHumans() }}</td>
                                <td class="align-middle">
                                    <a href="{{route('posts.edit', $post->id)}}" class="edit">
                                        <i class="material-icons" data-toggle="tooltip" title="Izmeni">&#xE254;</i>
                                    </a>
                                </td>
                                <td class="align-middle"><a href="{{route('posts.del', $post->id)}}" class="delete">
                                        <i class="material-icons" data-toggle="tooltip" title="Obriši">&#xE872;</i></a>
                                </td>
                                {{--                      <td class="align-middle"><a href="{{route('posts.edit', $post->id)}}">Izmeni</a></td>--}}
                                {{--                      <td class="align-middle"><a href="{{route('posts.delete', $post->id)}}">Obriši</a></td>--}}
                            </tr>
{{--                            @include('admin.components.Posts.updateForm')--}}
                        @endforeach
                        </tbody>
                    </table>
                    <div class="col-lg-12">
                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                @if ($posts->lastPage() > 1)
                                    @for ($i = 1; $i <= $posts->lastPage(); $i++)
                                        <li class="{{ ($posts->currentPage() == $i) ? ' active page-item' : 'page-item' }}">
                                            <a class="page-link" href="{{ $posts->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                            </ul>
                            @endif
                        </nav>
                    </div>
{{--                    @include('admin.components.Posts.insertForm')--}}
{{--                    @include('admin.components.Posts.deleteForm')--}}
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection
