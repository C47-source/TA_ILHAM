<div class="modal fade" id="sparepart{{ $service_masuk->id_service }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pilih Sparepart</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ url('catatan-perbaikan') }}" method="POST">
            @csrf
            @method('POST')
           
            <div class="form-floating mb-3">
              <input type="text" name="jenis" hidden value="sparepart">
              <input type="text" name="id_service" hidden value="{{ $service_masuk->id_service }}">
                <select class="form-control" name="id_pembelian" id="">
                  @foreach ($spart as $data)
                      <option value="{{ $data->id_sparepart }}">{{ $data->nm_sparepart }}</option>
                  @endforeach
                </select>
                <label for="name">Pilih</label>
            </div>
            <div class="form-floating mb-3">
              <input type="number" name="jumlah" placeholder="Masukan Jumlah" value="" class="form-control">
              <label for="">Jumlah</label>
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
  