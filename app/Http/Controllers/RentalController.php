<?php

namespace App\Http\Controllers;

use App\Models\rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data rentals dengan pagination untuk menampilkan di view
        $rentals = rental::simplepaginate(5); // Menggunakan paginate agar sesuai dengan pagination di view
        return view('rental.index', compact('rentals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form tambah data rental
        return view('rental.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input form tambah rental
        $request->validate([
            'name' => 'required|min:3',
            'type' => 'required',
            'hours' => 'required|numeric',
        ], [
            'name.required' => 'Nama harus diisi',
            'name.min' => 'Nama minimal 3 karakter',
            'type.required' => 'Jenis motor harus dipilih',
            'hours.required' => 'Durasi rental harus diisi',
            'hours.numeric' => 'Durasi rental harus berupa angka',
        ]);

        // Simpan data rental yang divalidasi ke database
        rental::create([
            'name' => $request->name,
            'type' => $request->type,
            'hours' => $request->hours
        ]);

        // Redirect ke halaman daftar rental dengan pesan sukses
        return redirect()->route('rental.data_rental')->with('success', 'Data rental berhasil ditambahkan');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
        $rental = rental::where('id', $id)->first();
        return view('rental.edit', compact('rental'));
    }

    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required|min:3',
            'type' => 'required',
            'hours' => 'required|numeric',
        ]);

        $rental = rental::where('id', $id)->update([
            'name' => $request->name,
            'type' => $request->type,
            'hours' => $request->hours
        ]);
        
        return redirect()->route('rental.data_rental')->with('success', 'Data rental berhasil diubah');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Hapus data rental
        $deleteData = rental::where
        ( 'id', $id)->delete();
        return redirect()->route('rental.data_rental')->with('success', 'Data rental berhasil dihapus');
    }
}
