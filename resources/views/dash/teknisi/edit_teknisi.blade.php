<div class="modal fade" id="edit_teknisi{{ $data->id_teknisi }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Edit Teknisi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ url('data-teknisi',$data->id_teknisi) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-floating mb-3">
                <input readonly type="text" name="id_teknisi" class="form-control" 
                value="{{ $data->id_teknisi }}" placeholder="ID Teknisi">
                <label for="">ID Teknisi</label>
            </div>
            <div class="form-floating mb-3">
                <input value="{{ $data->nm_teknisi }}"  type="text"  name="nama" class="form-control" placeholder="Nama Teknisi">
                <label for="nama">Nama Teknisi</label>
            </div>
            <div class="form-floating mb-3">
                <input value="{{ $data->telp}}" type="text" name="telepon" class="form-control" placeholder="Telepon">
                <label for="telepon">Telepon</label>
            </div>
            <div class="form-floating mb-3">
              <input value="{{ $data->email }}" type="email" name="email" class="form-control" placeholder="Email">
              <label for="email">Email</label>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
        </form>
      </div>
    </div>
</div>
  