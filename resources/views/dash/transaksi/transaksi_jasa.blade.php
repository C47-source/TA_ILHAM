<div class="modal fade" id="t_jasa{{ $item->id_service }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pembelian Jasa</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @foreach ($pembelian as $data)
            @if ($data->id_service == $item->id_service AND $data->jenis_pembelian == 'jasa')
               <div class="row">
                    <div class="col-lg-6 col-6">
                        <p><b>Nama Jasa</b></p>
                        <p>{{ $data->nm_jasa }}</p>
                    </div>
                    <div class="col-lg-6 col-6 text-end">
                        <p><b>Harga</b></p>
                        <p>{{ number_format($data->harga,2) }}</p>
                    </div>
                    <hr>
               </div>
            @endif 
            @endforeach
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>
  