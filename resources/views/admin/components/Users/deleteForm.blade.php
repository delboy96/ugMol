@extends('admin.layoutAdmin')
@section('content')
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('users.delete', $user->id_u)}}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h4 class="modal-title">Izbriši Korisnika</h4>
                    <a href="{{route('users.index')}}"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button></a>
                </div>
                <div class="modal-body">
                    <p>Da li ste sigurni da želite da obrišete ovog korisnika?</p>
                    <p class="text-warning"><small>Jednom obirisan korisnik se više ne može vratiti.</small></p>
                </div>
                <div class="modal-footer">
                    <a href="{{route('users.index')}}"><input  type="button" class="btn btn-default" data-dismiss="modal" value="Odustani"></a>
                    <input type="submit" class="btn btn-danger" value="Izbriši">
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
