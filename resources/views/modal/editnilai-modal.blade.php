<div class="modal fade" id="editModal{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <form method="PUT" action="/update-data/{{$data->id}}">
            {{ csrf_field() }}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Nilai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @csrf
                    <label for="exampleInputEmail1" class="form-label">Pilih Siswa</label>
                    <select class="form-select" aria-label="Default select example" name="user_id">
                        @foreach($dataUser as $user)
                            @foreach($user->roles as $dataRoles)
                                @if($dataRoles->name == 'users')
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endif
                            @endforeach
                        @endforeach
                    </select>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nilai</label>
                        <input type="number" name="nilai" class="form-control">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
    </div>
</div>