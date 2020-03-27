@extends('admin.layoutAdmin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Aktivnost</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 style="float:left;" class="m-0 font-weight-bold text-primary">Aktivnost korisnika</h6>
                <div style="float:right; width:50%; text-align: right;" class="col-sm-6 ">
                    <div class="card-block">
                                <form action="{{route('activity.filter')}}" method="POST">
                                    @csrf
                            <div  class="form-group input-group input-daterange align" >
                                <input style="margin-right: 1em" id="dateOd" type="text" autocomplete="off"
                                       class="form-control datepicker" name="from" placeholder="Od"/>
                                <div class="input-group-addon alig align-self-center">-</div>
                                <input style="margin-left: 1em" id="dateDo" type="text" autocomplete="off"
                                       class="form-control datepicker"  name="to" placeholder="Do"/>
                            </div>
                            <div style="text-align: center" class='form-group'>
                                <input style="margin-right: 1em" id="resetBtn" class="btn" role="button" type="reset" value="Očisti"/>
                                <input style="margin-left: 1em" class="btn btn-primary" role="button" type="submit" value="Filtriraj"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <nav style="margin-top: 20px;" class="blog-pagination justify-content-center d-flex">
                <ul class="pagination">
                    @if ($activities->lastPage() > 1)
                        @for ($i = 1; $i <= $activities->lastPage(); $i++)
                            <li class="{{ ($activities->currentPage() == $i) ? ' active page-item' : 'page-item' }}">
                                <a class="page-link" href="{{ $activities->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                </ul>
                @endif
            </nav>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id korisnika</th>
                            <th>Aktivnost</th>
                            <th>Vreme</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id korisnika</th>
                            <th>Aktivnost</th>
                            <th>Vreme</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($activities as $activity)
                            <tr>
                                <td>{{ $activity->user_id }}</td>
                                <td style="width: 65%">{{ $activity->activity }}</td>
                                <td>{{ Carbon\Carbon::parse($activity->time)->subMinutes(60)->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="col-lg-12">
                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                @if ($activities->lastPage() > 1)
                                    @for ($i = 1; $i <= $activities->lastPage(); $i++)
                                        <li class="{{ ($activities->currentPage() == $i) ? ' active page-item' : 'page-item' }}">
                                            <a class="page-link" href="{{ $activities->url($i) }}">{{ $i }}</a>
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
