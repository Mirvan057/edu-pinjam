<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('buku.index',[
            'bukus' => Buku::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'jumlah' => 'required|numeric|max:255',            
            'gambar'=> ["required",File::types(["jpeg","png","jpg"])->max(1024)],//1 mb        
        ]);


        if($request->file('gambar')){
            $validatedData['gambar'] = $request->file('gambar')->store('buku');
        }            

        Buku::create($validatedData);

        return redirect('/dashboard/buku')->with('success', 'Buku berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        return view('buku.edit',[

                'buku' => $buku
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {

$rules =[
            'nama' => 'required|max:255',
            'jumlah' => 'required|numeric|max:255',   
            'gambar'=> [File::types(["jpeg","png","jpg"])->max(1024)],//1 mb                     
        ];

        $validatedData = $request->validate($rules);

      
        if($request->file('gambar')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('buku');
        }

        Buku::where('id',$buku->id)->update($validatedData);


        return redirect('/dashboard/buku')->with('success', 'Buku berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        if($buku->gambar){
            Storage::delete($buku->gambar);
        }
        Buku::destroy($buku->id);

        return redirect('/dashboard/buku')->with('success', 'Buku berhasil dihapus');
    }



}

