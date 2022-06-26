<div class="modal fade" id="create_teknisi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Create Teknisi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ url('data-teknisi') }}" method="POST">
            @csrf
            @method('POST')
            <div class="form-floating mb-3">
                <input readonly type="text" name="id_teknisi" class="form-control" 
                value="@if($id==false) 20211 @endif @if($id==true) {{ $id->id_teknisi+1 }} @endif" placeholder="ID Teknisi">
                <label for="">ID Teknisi</label>
            </div>
            <div class="form-floating mb-3">
                <input value="{{ old('nama') }}"  type="text"  name="nama" class="form-control" placeholder="Nama Teknisi">
                <label for="nama">Nama Teknisi</label>
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
  