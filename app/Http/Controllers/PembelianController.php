<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Produk;
use App\Models\Supplier;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pembelian::paginate(5);
        return view('page.pembelian.index')->with([
            'pembelian' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $supplier = Supplier::all();
        $produk = Produk::all();
        return view('page.pembelian.create')->with([
            'supplier' => $supplier,
            'produk' => $produk,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kode_pembelian = date('YmdHis');
        $data = [
            'kode_pembelian' => $kode_pembelian,
            'tgl_pembelian' => $request->input('tgl_pembelian'),
            'id_supplier' => $request->input('id_supplier'),
            'id_user' => FacadesAuth::user()->id,
        ];

        Pembelian::create($data);

        return redirect()
            ->route('pembelian.index')
            ->with('message', 'Data sudah ditambahkan');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
