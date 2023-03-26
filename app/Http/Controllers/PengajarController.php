<?php

namespace App\Http\Controllers;

use App\Models\Pengajar;
use Illuminate\Http\Request;
use Image;

class PengajarController extends Controller
{
    public function index() {
        $pengajars = Pengajar::all();
        return view('admin.pengajar.index', compact('pengajars'));
    }

    public function create() {
        return view('admin.pengajar.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nama_pengajar' => 'required',
            'jabatan_pengajar' => 'required',
            'motivasi_pengajar' => 'required',
            'bio_pengajar' => 'required',
            'gambar_pengajar' => 'required|file|image',
        ]);

        $image = $request->file('gambar_pengajar');
        $name_gen = time() . hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $save_url = 'image/' . $name_gen;
        Image::make($image)->resize(420, 440)->save($save_url);
        $validated['gambar_pengajar'] = $save_url;

        Pengajar::create($validated);

        $notification = [
            'message' => 'pengajar Inserted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('admin.pengajar.index')->with($notification);
    }

    public function edit(Pengajar $pengajar) {
        return view('admin.pengajar.edit', compact('pengajar'));
    }

    public function update(Request $request, Pengajar $pengajar) {
        $validated = $request->validate([
            'nama_pengajar' => 'required',
            'jabatan_pengajar' => 'required',
            'motivasi_pengajar' => 'required',
            'bio_pengajar' => 'required',
            'gambar_pengajar' => 'file|image',
        ]);

        if ($request->gambar_pengajar) {
            unlink($pengajar->gambar_pengajar);
            $image = $request->file('gambar_pengajar');
            $name_gen = time() . hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $save_url = 'image/' . $name_gen;
            Image::make($image)->resize(420, 440)->save($save_url);
            $validated['gambar_pengajar'] = $save_url;
        }

        $pengajar->update($validated);

        $notification = [
            'message' => 'pengajar Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('admin.pengajar.index')->with($notification);
    }

    public function destroy(Pengajar $pengajar) {
        $pengajar->delete();

        $notification = [
            'message' => 'pengajar Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
