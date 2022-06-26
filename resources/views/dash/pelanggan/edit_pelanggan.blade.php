<div class="modal fade" id="edit_pelanggan{{ $data->id_pelanggan }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Edit Pelanggan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ url('data-pelanggan', $data->id_pelanggan) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-floating mb-3">
                <input readonly type="text" name="id_pelanggan" class="form-control" 
                value="{{ $data->id_pelanggan }}" placeholder="ID Pelanggan">
                <label for="">ID Pelanggan</label>
            </div>
            <div class="form-floating mb-3">
                <input value="{{ $data->nm_pelanggan }}"  type="text"  name="nama" class="form-control" placeholder="Nama Teknisi">
                <label for="nama">Nama Pelanggan</label>
            </div>
            <div class="form-floating mb-3">
                <input value="{{ $data->telp }}" type="text" name="telepon" class="form-control" placeholder="Telepon">
                <label for="telepon">Telepon</label>
            </div>
            <div class="form-floating mb-3">
                <textarea name="alamat" id="" cols="30" rows="30" style="height: 200px" class="form-control">{{ $data->alamat }}</textarea>
                <label for="alamat">Alamat</label>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
    </div>
</div>
  