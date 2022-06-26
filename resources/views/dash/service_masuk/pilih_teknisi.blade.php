<div class="modal fade" id="kirim_teknisi{{ $data->id_service }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Pilih Teknisi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ url('service-masuk',$data->id_service) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-floating mb-3">
                <select name="id_teknisi" id="" class="form-control">
                @foreach ($teknisi as $data)
                    
                <option value="{{ $data->id_teknisi }}">[{{ $data->id_teknisi }}] {{ $data->nm_teknisi }}</option>
                
                @endforeach
            </select>
            <label for="">Pilih Teknisi</label>
        </div>
        <p>Tidak ada teknisi?</p>
        <a href="{{ url('data-teknisi') }}" class="btn btn-primary">Tambah Teknisi</a>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
    </div>
</div>
  