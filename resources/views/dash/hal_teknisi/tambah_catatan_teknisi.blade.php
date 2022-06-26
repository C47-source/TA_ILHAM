<div class="modal fade" id="catatan{{ $service_masuk->id_service }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ketikan Catatan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ url('catatan-perbaikan',$service_masuk->id_service) }}" method="POST">
            @csrf
            @method('PUT')
           
            <div class="form-group">
                <textarea name='catatan_teknisi' class="form-control" name="" id="" cols="30" rows="10">{{ $service_masuk->catatan_teknisi }}</textarea>
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
  