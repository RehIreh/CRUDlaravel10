@extends('layout/aplikasi')

@section('konten')
  <a href="/admin/create" class="btn btn-primary">+Tambah Data Siswa</a>
    <table class="table">
      <thead>
        <tr>
            <th>Foto</th>
            <th>Nomor Induk</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Alamat</th>
            <th>Paket SKS</th>
            <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $item)
          <tr>
              <td>
                 @if ($item->foto)
                      <img style="max-width:50px;
                      max-height:50px" src="{{ url('foto'.'/'.$item->foto) }}"/>
                 @endif
              </td>
              <td>{{ $item->nomor_induk }}</td>
              <td>{{ $item->nama }}</td>
              <td>{{ $item->email }}</td>
              <td>{{ $item->jurusan }}</td>
              <td>{{ $item->alamat }}</td>
              <td>{{ $item->SKS }}</td>
              <td>
              <a class='btn btn-secondary btn-sm' href='{{ url('/admin/'.$item->nomor_induk) }}'>Detail</a>
              <a class='btn btn-warning btn-sm' href='{{ url('/admin/'.$item->nomor_induk.'/edit') }}'>Edit</a>
              <form onsubmit="return confirm('Apakah data ini ingin dihapus ?')"class= "d-inline" action="{{ '/admin/'.$item->nomor_induk }}" method="post">
                @csrf
                @method('DELETE')
                <button class='btn btn-danger btn-sm' type="submit">Hapus</button>
              </form>
              </td>
          </tr>
        @endforeach
      </tbody>
      </table>
      {{ $data->links() }}
@endsection