<div class="modal fade" id="edit_sparepart{{ $data->id_sparepart }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Create Sparepart</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ url('data-sparepart',$data->id_sparepart) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-fingerprint"></i></span>
                <input readonly value="{{ $data->id_sparepart }}" name="id_sparepart" type="text" class="form-control" placeholder="ID Jasa" aria-label="" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-tablet-alt"></i></span>
                <input name="nama_sparepart" value="{{ $data->nm_sparepart }}" type="text" class="form-control" placeholder="Nama Sparepart" aria-label="" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-hand-holding-usd"></i></span>
                <input name="harga" type="number" value="{{ $data->harga }}" class="form-control" placeholder="Harga" aria-label="" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-list"></i></span>
                <select name="ketegori" class="form-select" aria-label="Default select example">
                    <option value="{{ $data->ketegori }}">{{ $data->ketegori }}</option>
                    <option value="komputer">Komputer</option>
                    <option value="leptop">Leptop</option>
                    <option value="handphone">Handphone</option>
                </select>
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
  