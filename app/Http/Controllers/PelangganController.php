<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use App\Http\Requests\StorepelangganRequest;
use App\Http\Requests\UpdatepelangganRequest;

class pelangganController extends Controller
{
    public function index()
    {
    
        $data['pelanggan'] = pelanggan::orderBy('created_at', 'DESC')->get();
        return view('pelanggan.indexPelanggan')->with($data);
    }

    public function create()
    {
        //
    }

    public function store(StorepelangganRequest $request)
    {
    
        pelanggan::create($request->all());
        return redirect('pelanggan')->with('success', 'Data pelanggan berhasil ditambahkan!');
       
    }

    public function show(pelanggan $pelanggan)
    {
        //
    }

    public function edit(pelanggan $pelanggan)
    {
        //
    }

    public function update(UpdatepelangganRequest $request, pelanggan $pelanggan)
    {
            $pelanggan->update($request->all());
            return redirect('pelanggan')->with('success', 'Data pelanggan berhasil diedit!');
    }

    public function destroy(pelanggan $pelanggan)
    {
       
            $pelanggan->delete();
            return redirect('pelanggan')->with('success', 'Data berhasil dihapus');
    }
}
