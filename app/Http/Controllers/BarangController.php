<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use Faker\Provider\Barcode;

class BarangController extends Controller
{
    public function index()
    {
    
        $data['barang'] = Barang::orderBy('created_at', 'DESC')->get();
        return view('barang.indexBarang')->with($data);
    }

    public function create()
    {
        //
    }

    public function store(StoreBarangRequest $request)
    {
    
        Barang::create($request->all());
        return redirect('barang')->with('success', 'Data barang berhasil ditambahkan!');
       
    }

    public function show(Barang $barang)
    {
        //
    }

    public function edit(Barang $barang)
    {
        //
    }

    public function update(UpdateBarangRequest $request, Barang $barang)
    {
            $barang->update($request->all());
            return redirect('barang')->with('success', 'Data barang berhasil diedit!');
    }

    public function destroy(Barang $barang)
    {
       
            $barang->delete();
            return redirect('barang')->with('success', 'Data berhasil dihapus');
    }
}
