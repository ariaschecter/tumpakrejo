<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class BlogController extends Controller
{
    public function kegiatan() {
        $kegiatans = Blog::where('kategori_blog', 'kegiatan')->get();
        return view('admin.blog.kegiatan', compact('kegiatans'));
    }
    public function prestasi() {
        $prestasis = Blog::where('kategori_blog', 'prestasi')->get();
        return view('admin.blog.prestasi', compact('prestasis'));
    }
    public function ekstra() {
        $ekstras = Blog::where('kategori_blog', 'ekstra')->get();
        return view('admin.blog.ekstra', compact('ekstras'));
    }

    public function create() {
        return view('admin.blog.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'kategori_blog' => 'required',
            'judul_blog' => 'required',
            'deskripsi_blog' => 'required',
            'gambar_blog' => 'required|file|image',
        ]);

        $image = $request->file('gambar_blog');
        $name_gen = time() . hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $save_url = 'image/' . $name_gen;
        Image::make($image)->save($save_url);
        $validated['slug_blog'] = Str::slug($request->judul_blog);
        $validated['gambar_blog'] = $save_url;

        Blog::create($validated);

        $notification = [
            'message' => 'Blog Inserted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('admin.blog.' . $request->kategori_blog)->with($notification);
    }

    public function edit(Blog $blog) {
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog) {
        $validated = $request->validate([
            'kategori_blog' => 'required',
            'judul_blog' => 'required',
            'deskripsi_blog' => 'required',
            'gambar_blog' => 'file|image',
        ]);

        $validated['slug_blog'] = Str::slug($request->judul_blog);
        if ($request->gambar_blog) {
            if(file_exists(public_path($blog->gambar_blog))) unlink($blog->gambar_blog);
            $image = $request->file('gambar_blog');
            $name_gen = time() . hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $save_url = 'image/' . $name_gen;
            Image::make($image)->save($save_url);
            $validated['gambar_blog'] = $save_url;
        }
        $blog->update($validated);

        $notification = [
            'message' => 'Blog Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('admin.blog.' . $request->kategori_blog)->with($notification);
    }

    public function destroy(Blog $blog) {
        if(file_exists(public_path($blog->gambar_blog))) unlink($blog->gambar_blog);
        $blog->delete();

        $notification = [
            'message' => 'Blog Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
