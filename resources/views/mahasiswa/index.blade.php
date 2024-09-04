@extends('layout/aplikasi')

@section('konten')
   <div class="container mt-5 d-flex justify-content-center">
    <div class="card" style="width: 400px;">
        <div class="card-body text-center">
            @if ($data->foto)
                <div class="mb-3">
                    <img class="img-fluid rounded-circle" style="max-width: 150px; max-height: 150px;" src="{{ url('foto'.'/'.$data->foto) }}" alt="Foto Mahasiswa"/>
                </div>
            @endif
            <h5 class="card-title">{{ $data->nama }}</h5>
            <p class="card-text"><strong>Nomor Induk :</strong> {{ $data->nomor_induk }}</p>
            <p class="card-text"><strong>Email :</strong> {{ $data->email }}</p>
            <p class="card-text"><strong>Alamat :</strong> {{ $data->alamat }}</p>
            <p class="card-text"><strong>Jurusan :</strong> {{ $data->jurusan }}</p>
            <p class="card-text"><strong>Paket SKS :</strong>{{ $data->SKS }}</p>
        </div>
        <div class="text-center mb-3">
            <a href='{{ url("/mahasiswa/".$data->nomor_induk."/edit") }}' class="btn btn-secondary btn-sm" style="width: 200px;">Edit Data</a>
        </div>        
    </div>
</div>
@endsection 