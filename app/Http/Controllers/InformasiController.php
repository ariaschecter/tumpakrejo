<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;
use Image;

class InformasiController extends Controller
{
    public function index() {
        $informasis = Informasi::all();
        $title = 'All Informasi';
        return view('admin.informasi.index', compact('informasis', 'title'));
    }

    public function create() {
        $title = 'Add Informasi';
        return view('admin.informasi.create', compact('title'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'gambar_informasi' => 'required|image|file',
            'judul_informasi' => 'required',
            'deskripsi_informasi' => 'required'
        ]);

        $image = $request->file('gambar_informasi');
        $name_gen = time() . hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $save_url = 'image/' . $name_gen;
        Image::make($image)->save($save_url);
        $validated['gambar_informasi'] = $save_url;

        Informasi::create($validated);

        $notification = [
            'message' => 'Informasi Inserted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('admin.informasi.index')->with($notification);
    }

    public function edit(Informasi $informasi) {
        $title = 'Edit Informasi';
        return view('admin.informasi.edit', compact('informasi', 'title'));
    }

    public function update(Request $request, Informasi $informasi) {
        $validated = $request->validate([
            'gambar_informasi' => 'image|file',
            'judul_informasi' => 'required',
            'deskripsi_informasi' => 'required'
        ]);

        if ($request->gambar_informasi) {
            if(file_exists(public_path($informasi->gambar_informasi))) unlink($informasi->gambar_informasi);
            $image = $request->file('gambar_informasi');
            $name_gen = time() . hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $save_url = 'image/' . $name_gen;
            Image::make($image)->save($save_url);
            $validated['gambar_informasi'] = $save_url;
        }

        $informasi->update($validated);

        $notification = [
            'message' => 'Informasi Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('admin.informasi.index')->with($notification);
    }

    public function destroy(Informasi $informasi) {
        if(file_exists(public_path($informasi->gambar_informasi))) unlink($informasi->gambar_informasi);
        $informasi->delete();

        $notification = [
            'message' => 'Informasi Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
