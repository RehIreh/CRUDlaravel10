@extends('layout/aplikasi')

@section('konten')
    <div class="container d-flex justify-content-center align-items-center mt-5" style="min-height: 60vh;">
        <div class="text-center">
            <h2>Anda tidak diperkenankan untuk mengakses halaman ini silahkan kembali</h2>
            <a href="{{ Auth::user()->role == 'admin' ? '/admin' :'/mahasiswa'}}"class="btn btn-secondary btn-sm" style="width: 200px;">Kembali</a>
        </div>
    </div>
@endsection


