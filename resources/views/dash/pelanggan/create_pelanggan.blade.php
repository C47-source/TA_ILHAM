<div class="modal fade" id="create_pelanggan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Create Pelanggan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ url('data-pelanggan') }}" method="POST">
            @csrf
            @method('POST')
            <div class="form-floating mb-3">
                <input readonly type="text" name="id_pelanggan" class="form-control" 
                value="@if($id==false) 91{{ date('Y').date('m') }}01 @endif @if($id==true) {{ $id->id_pelanggan+1 }} @endif" placeholder="ID Pelanggan">
                <label for="">ID Pelanggan</label>
            </div>
            <div class="form-floating mb-3">
                <input value="{{ old('nama') }}"  type="text"  name="name" class="form-control" placeholder="Nama Teknisi">
                <label for="name">Nama Pelanggan</label>
            </div>
            <div class="form-floating mb-3">
                <input value="{{ old('telepon') }}" type="text" name="telepon" class="form-control" placeholder="Telepon">
                <label for="telepon">Telepon</label>
            </div>
            <div class="form-floating mb-3">
                <input value="{{ old('email') }}" type="email" name="email" class="form-control" placeholder="Email">
                <label for="email">Email</label>
            </div>
            <div class="form-floating mb-3">
                <textarea name="alamat" id="" cols="30" rows="30" style="height: 200px" class="form-control"></textarea>
                <label for="alamat">Alamat</label>
            </div>
            <div class="form-floating mb-3">
              <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
              <label for="email">Password</label>
          </div>
            <div class="form-floating mb-3">
              <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
              <label for="email">Confirm Password</label>
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
  