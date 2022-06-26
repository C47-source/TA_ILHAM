@extends('template_dashboard')

@section('title')
   <a href="{{ url('home') }}" style="text-decoration: none">Home</a> / Pesan Jasa Service {{ $ketegori }}
@endsection

@section('konten')
<div class="row justify-content-center mx-auto">
   <div class="col-lg-6">
    <div class="card mb-5">
        <div style="background-color:#0E0943;" class="card-header text-white">
            Pesan Jasa Service
        </div>
        <div class="card-body">
            <form action="{{ url('pesan-jasa') }}" method="POST">
                @csrf
               @method('POST')
                <div class="form-floating mb-3">
                    <input name="id_service" type="text" readonly value="@if($id==false) 525{{ date('Y') }}{{ date('m') }}001 @endif @if($id==true) {{ $id->id_service+1 }} @endif" class="form-control" placeholder="ID Service">
                    <input hidden name="id_pelanggan" type="text" readonly value="{{ Auth::user()->id_user }}" class="form-control" placeholder="ID Service">
                    <label for="">ID Service</label>
                </div>
                <input type="" name="id_teknisi" value="0" hidden>
                <div class="form-floating mb-3 mt-3">
                    <input hidden type="text" name="tanggal_masuk" readonly value="{{ date('Y-m-d H:i:s') }}" class="form-control" placeholder="ID Service">
                    <label for="">Tanggal Masuk</label>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-laptop"></i></span>
                    <input name="ketegori" class="form-control" readonly value="{{ $ketegori }}" placeholder="Ketegori" aria-label="" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-laptop"></i></span>
                    <input name="nama_unit" class="form-control" required placeholder="Nama Unit" aria-label="" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3" style="color:#0E0943 ">
                   <label for="">Kelengkapan</label>
                </div>
                <div class="form-check form-check-inline">
                    <input required class="form-check-input" name="kelengkapan[]" type="checkbox" id="inlineCheckbox1" value="Unit">
                    <label class="form-check-label" for="inlineCheckbox1">Unit</label>
                </div>
                <div class="form-check form-check-inline mb-3">
                    <input class="form-check-input" name="kelengkapan[]" type="checkbox" id="inlineCheckbox2" value="Charger">
                    <label class="form-check-label" for="inlineCheckbox2">Charger</label>
                </div>
                <div class="form-check form-check-inline mb-3">
                    <input class="form-check-input" name="kelengkapan[]" type="checkbox" id="inlineCheckbox2" value="Kotak">
                    <label class="form-check-label" for="inlineCheckbox2">Kotak</label>
                </div>
                <div class="form-check form-check-inline mb-3">
                    <input class="form-check-input" name="kelengkapan[]" type="checkbox" id="inlineCheckbox2" value="Tas">
                    <label class="form-check-label" for="inlineCheckbox2">Tas</label>
                </div>
                <div class="form-check form-check-inline mb-3">
                    <input class="form-check-input" name="kelengkapan[]" type="checkbox" id="inlineCheckbox2" value="Lainnya">
                    <label class="form-check-label" for="inlineCheckbox2">Lainnya</label>
                </div>
                <div class="input-group mb-3" style="color:#0E0943 ">
                    <label for="">Kerusakan</label>
                 </div>
                <div class="input-group mb-3">
                   <textarea required name="deskripsi_kerusakan" id="" cols="30" placeholder="Ceritakan kendala yang Gadget alami" class="form-control" rows="5"></textarea>
                </div>
                <div class="form-floating">
                    <button style="background-color:#0E0943;border:none;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      Pesan Sekarang
                      </button>
                </div>
                <!-- Button trigger modal -->
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Pilih Layanan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-check">
                                    <input value="Antar oleh Pelanggan" class="form-check-input" type="radio" name="layanan" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                      Antar oleh Pelanggan
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input value="Di Jemput Oleh Kurir" class="form-check-input" type="radio" name="layanan" id="flexRadioDefault2" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                      Di Jemput Oleh Kurir
                                    </label>
                                  </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
   </div>
</div>
@endsection

