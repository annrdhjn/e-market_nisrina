<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;


class ProdukController extends Controller
{
    public function index()
    {
    
        $data['produk'] = Produk::orderBy('created_at', 'DESC')->get();
        return view('produk.index')->with($data);
    }

    public function create()
    {
        //
    }

    public function store(StoreProdukRequest $request)
    {
    
        Produk::create($request->all());
        return redirect('produk')->with('success', 'Data produk berhasil ditambahkan!');
       
    }

    public function show(Produk $produk)
    {
        //
    }

    public function edit(Produk $produk)
    {
        //
    }

    public function update(UpdateProdukRequest $request, Produk $produk)
    {
            $produk->update($request->all());
            return redirect('produk')->with('success', 'Data produk berhasil diedit!');
    }

    public function destroy(Produk $produk)
    {
       
            $produk->delete();
            return redirect('produk')->with('success', 'Data berhasil dihapus');
    }
}
