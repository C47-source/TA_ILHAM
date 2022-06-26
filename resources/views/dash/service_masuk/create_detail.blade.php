<div class="modal fade" id="create_detail{{ $service_masuk->id_service }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Detail</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ url('detail-service') }}" method="POST">
            @csrf
            @method('POST')
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-fingerprint"></i></span>
                <input readonly value="{{ $service_masuk->id_service }}" name="id_service" type="text" class="form-control" placeholder="ID Service" aria-label="" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-tablet-alt"></i></span>
                <input value="" name="nama_unit" type="text" class="form-control" placeholder="Nama Unit" aria-label="" aria-describedby="basic-addon1">
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" name="deskripsi_kerusakan" style="height: 150px" id="" cols="30" rows="10"></textarea>
                <label for="">Deskripsi Kerusakan</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" name="kelengkapan_unit" id="" cols="30" rows="10"></textarea>
                <label for="">Kelengkapan Unit</label>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
    </div>
</div>
  