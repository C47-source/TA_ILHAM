<div class="modal fade" id="create_service_masuk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Create Sparepart</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ url('service-masuk') }}" method="POST">
            @csrf
            @method('POST')

            <div class="form-floating mb-3">
                <input name="id_service" type="text" readonly value="@if($id==false) 525{{ date('Y') }}{{ date('m') }}001 @endif @if($id==true) {{ $id->id_service+1 }} @endif" class="form-control" placeholder="ID Service">
                <label for="">ID Service</label>
            </div>
            <input type="" name="id_teknisi" value="0" hidden>
            <div class="form-floating mb-3">
                <select name="id_pelanggan" id="" class="form-control">
                @foreach ($pelanggan as $data)
                    <option value="{{ $data->id_pelanggan }}">[{{ $data->id_pelanggan }}] {{ $data->nm_pelanggan }}</option>
                @endforeach
                </select>
                <label for="">Pilih Pelanggan</label>
            </div>

            <a href="{{ url('data-pelanggan') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Pelanggan</a>

            <div class="form-floating mb-3 mt-3">
                <input type="text" name="tanggal_masuk" readonly value="{{ date('Y-m-d H:i:s') }}" class="form-control" placeholder="ID Service">
                <label for="">Tanggal Masuk</label>
            </div>

            <div class="form-floating mb-3">
                <select class="form-control" name="jenis_layanan" id="">
                    <option value="Di jemput oleh kurir">Di jemput oleh kurir</option>
                    <option value="Di Antar oleh pelanggan">Di Antar oleh pelanggan</option>
                </select>
                <label for="">Jenis layanan</label>
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
