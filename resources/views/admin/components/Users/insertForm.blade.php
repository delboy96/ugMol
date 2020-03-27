@extends('admin.layoutAdmin')
@section('content')
<!-- Add Modal HTML -->
<div id="addEmployeeModal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form enctype="multipart/form-data" action="{{route('users.store')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Dodaj Korisnika</h4>
                    <a href="{{route('users.index')}}"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button></a>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Ime</label>
                        <input name="name" type="text" class="form-control">
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" type="text" class="form-control">
                        @error('email')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        @error('password')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label >Ponovo Unesite Šifru *</label>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password_confirmation" id="repassword">
                        </div>
                        @error('repassword')
                        <p class="text-danger text-center">{{ $message }}</p>
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
