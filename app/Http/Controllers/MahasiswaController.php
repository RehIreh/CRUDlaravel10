<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $email = Auth::user()->email;
        $data = mahasiswa::where('email', $email)->first();
        return view('mahasiswa/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = mahasiswa::where('nomor_induk',$id)->first();
        return view('mahasiswa/edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama'=> 'required',
            'alamat'=>'required',
            'SKS'=>'required',
        ], [
            'nama.required'=>'Nama wajib diisi',
            'alamat.required'=>'Alamat wajib diisi',
            'SKS.required'=>'Paket SKS wajib diisi',
        ]);
        $data = [
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'SKS' => $request->input('SKS'),
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
        $user = User::where('email', Auth::user()->email)->first();
        if ($user) {
            $user->name = $request->input('nama');
            $user->save();
        }
        return redirect('/mahasiswa')->with('success','Data telah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
