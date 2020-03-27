@extends('admin.layoutAdmin')
@section('content')
<!-- Add Modal HTML -->
<div id="addEmployeeModal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form enctype="multipart/form-data" action="{{route('news.store')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Dodaj Vest</h4>
                    <a href="{{route('news.index')}}"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button></a>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Naslov</label>
                        <input name="title" type="text" class="form-control">
                        @error('title')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Sadržaj</label>
                        <div class="form-line">
                            <textarea class="form-control" name="body" id="body"></textarea>
                        </div>
                        @error('body')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Slika</label>
                        <div class="form-line">
                            <input name="img" type="file" accept="image/*" class="form-control"
                                   placeholder="Putanja slike">
                        </div>
                        @error('img')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{route('news.index')}}"><input  type="button" class="btn btn-default" data-dismiss="modal" value="Odustani"></a>
                    <input type="submit" class="btn btn-success" value="Dodaj">
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
            </form>
        </div>
    </div>
</div>
@endsection
