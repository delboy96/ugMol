<!-- Add Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('posts.store')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Dodaj Događaj</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Naslov</label>
                        <input name="title" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Podnaslov</label>
                        <input name="subtitle" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Sadržaj</label>
                        <div class="form-line">
                            <textarea class="form-control" name="body" id="body"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Citat</label>
                        <textarea class="form-control" name="citat"></textarea>

                    </div>
                    <div class="form-group">
                        <label>Datum</label>
                        <input name="datum" type="date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Slika</label>
                        <div class="form-line">
                            <input name="img_path" type="text" class="form-control"
                                   placeholder="Putanja slike">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Odustani">
                    <input type="submit" class="btn btn-success" value="Dodaj">
                </div>
            </form>
        </div>
    </div>
</div>
