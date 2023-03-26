<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;
use Image;

class AssetController extends Controller
{
    public function index() {
        $assets = Asset::all();
        $title = 'All Asset';
        return view('admin.asset.index', compact('assets', 'title'));
    }

    public function create() {
        $title = 'Add Asset';
        return view('admin.asset.create', compact('title'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'gambar_asset' => 'required|image|file',
            'judul_asset' => 'required',
            'deskripsi_asset' => 'required'
        ]);

        $image = $request->file('gambar_asset');
        $name_gen = time() . hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $save_url = 'image/' . $name_gen;
        Image::make($image)->save($save_url);
        $validated['gambar_asset'] = $save_url;

        Asset::create($validated);

        $notification = [
            'message' => 'Asset Inserted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('admin.asset.index')->with($notification);
    }

    public function edit(Asset $asset) {
        $title = 'Edit Asset';
        return view('admin.asset.edit', compact('asset', 'title'));
    }

    public function update(Request $request, Asset $asset) {
        $validated = $request->validate([
            'gambar_asset' => 'image|file',
            'judul_asset' => 'required',
            'deskripsi_asset' => 'required'
        ]);

        if ($request->gambar_asset) {
            if(file_exists(public_path($asset->gambar_asset))) unlink($asset->gambar_asset);
            $image = $request->file('gambar_asset');
            $name_gen = time() . hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $save_url = 'image/' . $name_gen;
            Image::make($image)->save($save_url);
            $validated['gambar_asset'] = $save_url;
        }

        $asset->update($validated);

        $notification = [
            'message' => 'Asset Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('admin.asset.index')->with($notification);
    }

    public function destroy(Asset $asset) {
        if(file_exists(public_path($asset->gambar_asset))) unlink($asset->gambar_asset);
        $asset->delete();

        $notification = [
            'message' => 'Asset Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
