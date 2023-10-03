<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use App\Http\Requests\StorePemasokRequest;
use App\Http\Requests\UpdatePemasokRequest;

class PemasokController extends Controller
{
    public function index()
    {
    
        $data['pemasok'] = Pemasok::orderBy('created_at', 'DESC')->get();
        return view('pemasok.indexPemasok')->with($data);
    }

    public function create()
    {
        //
    }

    public function store(StorePemasokRequest $request)
    {
    
        Pemasok::create($request->all());
        return redirect('pemasok')->with('success', 'Data pemasok berhasil ditambahkan!');
       
    }

    public function show(Pemasok $pemasok)
    {
        //
    }

    public function edit(Pemasok $pemasok)
    {
        //
    }

    public function update(UpdatePemasokRequest $request, Pemasok $pemasok)
    {
            $pemasok->update($request->all());
            return redirect('pemasok')->with('success', 'Data Pemasok berhasil diedit!');
    }

    public function destroy(Pemasok $pemasok)
    {
       
            $pemasok->delete();
            return redirect('pemasok')->with('success', 'Data berhasil dihapus');
    }
}
