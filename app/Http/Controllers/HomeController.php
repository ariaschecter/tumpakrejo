<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Blog;
use App\Models\Informasi;
use App\Models\Pengajar;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard() {
        return view('admin.index');
    }

    public function index() {
        $pengajars = Pengajar::all();
        $kegiatans = Blog::latest()->where('kategori_blog', 'kegiatan')->get();
        $prestasis = Blog::latest()->where('kategori_blog', 'prestasi')->get();
        $ekstras = Blog::latest()->where('kategori_blog', 'ekstra')->get();
        return view('frontend.index', compact('pengajars', 'kegiatans', 'prestasis', 'ekstras'));
    }

    public function detail(Blog $blog) {
        return view('frontend.detail', compact('blog'));
    }

    public function asset() {
        $assets = Asset::all();
        return view('frontend.asset', compact('assets'));
    }

    public function informasi() {
        $informasis = Informasi::all();
        return view('frontend.informasi', compact('informasis'));
    }

    public function pengajar() {
        $pengajars = Pengajar::all();
        return view('frontend.pengajar', compact('pengajars'));
    }
}
