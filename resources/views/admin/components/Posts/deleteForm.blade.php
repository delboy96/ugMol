<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('posts.delete', $post->id)}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Izbriši događaj</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Da li ste sigurni da želite da obrišete ovaj događaj?</p>
                    <p class="text-warning"><small>Jednom obirisan događaj se više ne može vratiti.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Odustani">
                    <input type="submit" class="btn btn-danger" value="Izbriši">
                </div>
            </form>
        </div>
    </div>
</div>
