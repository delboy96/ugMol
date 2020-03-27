@extends('admin.layoutAdmin')
@section('content')
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form enctype="multipart/form-data" action="{{route('roles.update', $role->id_r)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h4 class="modal-title">Izmeni Ulogu</h4>
                    <a href="{{route('roles.index')}}"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button></a>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Naziv</label>
                        <input name="name" type="text" class="form-control" value="{{$role->name}}">
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{route('roles.index')}}"><input  type="button" class="btn btn-default" data-dismiss="modal" value="Odustani"></a>
                    <input type="submit" class="btn btn-info" value="Sačuvaj">
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
