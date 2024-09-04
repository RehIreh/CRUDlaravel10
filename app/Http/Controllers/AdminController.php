<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
           $data = mahasiswa::orderBy('nomor_induk', 'asc')->paginate(5);
           return view('siswa/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nomor_induk',$request->nomor_induk);
        Session::flash('nama',$request->nama);
        Session::flash('jurusan',$request->jurusan);
        Session::flash('alamat',$request->alamat);
        Session::flash('SKS',$request->SKS);
        Session::flash('email', $request->email);


        $request->validate([
            'nomor_induk' => 'required|numeric|unique:mahasiswa,nomor_induk',
            'nama'=> 'required',
            'jurusan'=> 'required',
            'alamat'=>'required',
            'SKS'=>'required',
            'foto'=>'required|mimes:jpeg,jpg,png,gif',
            'email' => 'required|email|unique:mahasiswa,email'
        ], [
            'nomor_induk.required'=>'Nomor Induk wajib diisi',
            'nomor_induk.numeric'=>'Nomor Induk wajib diisi dalam angka',
            'nomor_induk.unique'=>'Nomor Induk sudah terdaftar, silakan gunakan nomor yang lain',
            'nama.required'=>'Nama wajib diisi',
            'jurusan.required'=>'Jurusan wajib diisi',
            'alamat.required'=>'Alamat wajib diisi',
            'SKS.required'=>'Paket SKS wajib diisi',
            'foto.required'=>'Foto wajib diisi',
            'email.required'=> 'Email wajib diisi',
            'foto.mimes'=>'Upload foto dengan ekstensi JPEG/JPG/PNG/GIF',
            'email.unique' => 'Email sudah terdaftar',
        ]);

        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis').".".$foto_ekstensi;
        $foto_file->move(public_path('foto'),$foto_nama);

        $data = [
            'nomor_induk' => $request->input('nomor_induk'),
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'jurusan' => $request->input('jurusan'),
            'alamat' => $request->input('alamat'),
            'SKS' => $request->input('SKS'),
            'foto' => $foto_nama,
        ];
        mahasiswa::create($data);
        return redirect('admin')->with('success', 'Berhasil memasukan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = mahasiswa::where('nomor_induk',$id)->first();
        return view('siswa/show')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = mahasiswa::where('nomor_induk',$id)->first();
        return view('siswa/edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama'=> 'required',
            'jurusan'=> 'required',
            'alamat'=>'required',
            'SKS'=>'required',
            'email'=>'required'
        ], [
            'nama.required'=>'Nama wajib diisi',
            'jurusan.required'=>'Jurusan wajib diisi',
            'alamat.required'=>'Alamat wajib diisi',
            'SKS.required'=>'Paket SKS wajib diisi',
            'email.required'=>'email wajib diisi',
        ]);
        $data = [
            'nama' => $request->input('nama'),
            'jurusan' => $request->input('jurusan'),
            'alamat' => $request->input('alamat'),
            'SKS' => $request->input('SKS'),
            'email'=> $request->input('email')
        ];

        if($request->hasfile('foto')){
            $request->validate([
                'foto'=>'mimes:jpeg,jpg,png,gif'
            ], [
                'foto.mimes' => 'Upload foto dengan ekstensi JPEG/JPG/PNG/GIF'
            ]);   
            $foto_file = $request->file('foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_nama = date('ymdhis').".".$foto_ekstensi;
            $foto_file->move(public_path('foto'),$foto_nama);

            $data_foto = mahasiswa::where('nomor_induk', $id)->first();
            File::delete(public_path('foto').'/'.$data_foto->foto);

            $data['foto'] = $foto_nama;
        }

        mahasiswa::where('nomor_induk',$id)->update($data);
        return redirect('/admin')->with('success','Data telah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = mahasiswa::where('nomor_induk', $id)->first();
            if ($data) {
                File::delete(public_path('foto' . '/' . $data->foto));
                mahasiswa::where('nomor_induk', $id)->delete();
                User::where('email', $data->email)->delete();

                return redirect('/admin')->with('success', 'Data berhasil dihapus');
            } else {
                return redirect('/admin')->with('error', 'Data mahasiswa tidak ditemukan');
            }
    }
}
