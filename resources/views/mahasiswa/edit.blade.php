@extends('layout/aplikasi')

@section('konten')
<a href= '/mahasiswa' class="btn btn-secondary"><< Kembali</a>
<form method="post" action="{{ '/mahasiswa/'.$data->nomor_induk }}"
  enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <h1>Nomor Induk : {{ $data->nomor_induk }}</h1>
  </div>
  <div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" class="form-control" name='nama' id="nama" value="{{ $data->nama }}">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <p id="email">{{ $data->email }}</p>
    </div>

  <div class="mb-3">
    <label for="jurusan" class="form-label">Jurusan</label>
    <p id='jurusan'>{{ $data->jurusan }}</p>
  </div>
  <div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <textarea class="form-control" name='alamat'id="alamat">{{ $data->alamat }} </textarea>
  </div>
  <div class="mb-3">
    <label for="sks" class="form-label">Paket SKS</label>
    <select class="form-control" name='SKS' id="sks">
      <option value="Paket 1" {{ $data->SKS == 'Paket 1' ? 'selected' : '' }}>Paket 1</option>
      <option value="Paket 2" {{ $data->SKS == 'Paket 2' ? 'selected' : '' }}>Paket 2</option>
      <option value="Paket 3" {{ $data->SKS == 'Paket 3' ? 'selected' : '' }}>Paket 3</option>
    </select>
  </div>
  @if ($data->foto)
      <div class="mb-3">
        <img style= "max-width:100px;max-height:100px"src="{{ url('foto').'/'.$data->foto }}">
      </div>
  @endif
  <div class="mb-3">
    <label for="foto" class="form-label">Foto</label>
    <input type="file" class="form-control" name="foto" id="foto">
  </div>
  <div class="mb-3"> 
    <button type="submit" class="btn btn-primary">Update</button>
  </div>
</form>
@endsection