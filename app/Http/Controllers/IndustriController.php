<?php

namespace App\Http\Controllers;

use App\Models\Industri;
use Illuminate\Support\Str;
use App\Http\Requests\IndustriRequest;
use App\Http\Requests\IndustriUpdateRequest;
use Illuminate\Support\Carbon;


class IndustriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $industri = Industri::get();
        return view('industri.index', ['industri' => $industri]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('industri.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IndustriRequest $request)
    {
        $foto = $request->file('gambar');
        $destinationPath = 'images/';
        $profileImage = Str::slug($request->nama) . "-" . Carbon::now()->format('YmdHis') . "." . $foto->getClientOriginalExtension();
        $foto->move($destinationPath, $profileImage);

        Industri::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama, '-'),
            'deskripsi' => $request->deskripsi,
            'gambar' => $profileImage,
        ]);

        return redirect()->route('industri.index')->with('success', 'kamu berhasil menambah data');


    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $industri = Industri::where('slug', $slug)->first();
        return view('industri.show', ['industri' => $industri]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $industri = Industri::where('slug', $slug)->first();
        return view('industri.edit', ['industri' => $industri]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IndustriUpdateRequest $request, $id)
    {
        $industri = Industri::where('id', $id)->first();

        if ($request->gambar) {
            $file_path = public_path() . '/images/' . $industri->gambar;
            unlink($file_path);

            $foto = $request->file('gambar');
            $destinationPath = 'images/';
            $profileImage = Str::slug($request->nama)."-".Carbon::now()->format('YmdHis') . "." . $foto->getClientOriginalExtension();
            $foto->move($destinationPath, $profileImage);
            $industri->update([
                'nama' => $request->nama,
                'slug' => Str::slug($request->nama, '-'),
                'deskripsi' => $request->deskripsi,
                'gambar' => $profileImage,
            ]);
        } else {
            $industri->update([
                'nama' => $request->nama,
                'slug' => Str::slug($request->nama, '-'),
                'deskripsi' => $request->deskripsi,
            ]);
        }
        return redirect()->route('industri.index')->with('success', 'kamu berhasil memperbarui data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $industri = Industri::where('id', $id)->first();
        $file_path = public_path() . '/images/' . $industri->gambar;
        unlink($file_path);
        $industri->delete();
        return redirect()->route('industri.index')->with('error', 'kamu berhasil menghapus data');
    }
}
