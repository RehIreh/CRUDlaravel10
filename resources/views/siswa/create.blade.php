@extends('layout/aplikasi')

@section('konten')
<form method="post" action="/admin" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label for="nomor_induk" class="form-label">Nomor Induk</label>
    <input type="text" class="form-control" name='nomor_induk' id="nomor_induk" value="{{ Session::get('nomor_induk') }}">
  </div>
  <div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" class="form-control" name='nama' id="nama" value="{{ Session::get('nama') }}">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" name='email' id="email" value="{{ Session::get('email') }}">
  </div>
  <div class="mb-3">
    <label for="jurusan" class="form-label">Jurusan</label>
    <select class="form-control" name='jurusan' id="jurusan">
      <option value="Informatika" {{ old('jurusan', Session::get('jurusan')) == 'Informatika' ? 'selected' : '' }}>Informatika</option>
      <option value="Sistem Informasi" {{ old('jurusan', Session::get('jurusan')) == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
      <option value="Sistem Informasi Akutansi" {{ old('jurusan', Session::get('jurusan')) == 'Sistem Informasi Akutansi' ? 'selected' : '' }}>Sistem Informasi Akutansi</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <textarea class="form-control" name='alamat'id="alamat">{{ Session::get('alamat') }} </textarea>
  </div>
  <div class="mb-3">
    <label for="sks" class="form-label">Paket SKS</label>
    <select class="form-control" name='SKS' id="sks">
      <option value="Paket 1" {{ old('SKS', Session::get('SKS')) == 'Paket 1' ? 'selected' : '' }}>Paket 1</option>
      <option value="Paket 2" {{ old('SKS', Session::get('SKS')) == 'Paket 2' ? 'selected' : '' }}>Paket 2</option>
      <option value="Paket 3" {{ old('SKS', Session::get('SKS')) == 'Paket 3' ? 'selected' : '' }}>Paket 3</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="foto" class="form-label">Foto</label>
    <input type="file" class="form-control" name="foto" id="foto">
  </div>
  <div class="mb-3"> 
    <button type="submit" class="btn btn-primary">Simpan</button>
  </div>
</form>
@endsection