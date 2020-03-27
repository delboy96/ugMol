@extends('admin.layoutAdmin')
@section('content')
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form enctype="multipart/form-data" action="{{route('users.update', $user->id_u)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h4 class="modal-title">Izmeni Korisnika</h4>
                    <a href="{{route('users.index')}}"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button></a>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Ime</label>
                        <input name="name" type="text" class="form-control" value="{{$user->name}}">
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" type="text" class="form-control" value="{{$user->email}}">
                        @error('email')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Šifra</label>
                        <div class="form-line">
                            <textarea class="form-control" name="password" id="password"></textarea>
                        </div>
                        @error('password')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Uloga</label>
                        <select name="role_id" class="form-control">
                            @foreach($roles as $role)
                            <option value="{{$role->id_r}}"> {{$role->name}} </option>
                            @endforeach
                        </select>
                        @error('role_id')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{route('users.index')}}"><input  type="button" class="btn btn-default" data-dismiss="modal" value="Odustani"></a>
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
