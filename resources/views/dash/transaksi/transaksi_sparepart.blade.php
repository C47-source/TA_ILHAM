<div class="modal fade" id="t_sparepart{{ $item->id_service }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Create Sparepart</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row mb-3">
                <div class="col-lg-6 col-6">
                    <p><b>Nama Sparepart</b></p>
                </div>
                <div class="col-lg-6 col-6 text-end">
                    <p><b>Harga</b></p>
                </div>
            </div>
            @foreach ($pembelian as $data)
            @if ($data->id_service == $item->id_service AND $data->jenis_pembelian == 'sparepart')
               <div class="row">
                    <div class="col-lg-6 col-6">
                        <p>{{ $data->nm_sparepart }}</p>
                    </div>
                    <div class="col-lg-6 col-6 text-end">
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
  