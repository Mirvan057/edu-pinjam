<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function indexAdmin(){
        return view('listpeminjam', [
            'peminjaman' => Peminjaman::latest()->get()
        ]);
    }
    public function indexPeminjam(){
        if(request('searching')){
            $buku = Buku::where('nama','like','%' . request('searching') . '%')->get();
        }else{
            $buku = Buku::all();
        }
        return view('pinjam', [
            'bukus' =>$buku
        ]);
    }
    
    public function pinjam(Request $request, Buku $buku){

        $validatedData = $request->validate([            
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date|after:tgl_pinjam'
        ]);

        Peminjaman::create([
            'buku_id' => $buku->id,
            'user_id' => auth()->user()->id, 
            'status'=>'dipinjam',
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali
        ]);

        $jumlah = $buku->jumlah;
        $jumlah = $jumlah - 1;
        Buku::where('id',$buku->id)->update([
            'jumlah' => $jumlah
        ]);

        return redirect('/dashboard/pinjam')->with('success', 'buku berhasil terpinjam');

    }
    
    public function statusPinjam(Request $request,Peminjaman $peminjaman){
        $validatedData = $request->validate([
            'status' => 'required',
        ]);

        Peminjaman::where('id', $peminjaman->id)->update($validatedData);
        return redirect('/dashboard/bukupinjam')->with('success', 'Status buku terupdate');

    }
    public function meminjamPeminjam(){
        return view('listdipinjam', [
            'peminjaman' => Peminjaman::where('user_id', auth()->user()->id)->latest()->get()
        ]);
    }


    }