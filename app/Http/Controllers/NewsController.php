<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class NewsController extends Controller
{
    // Menampilkan detail berita berdasarkan ID
    public function show($id)
    {
    $news = News::findOrFail($id); // Mencari berita berdasarkan ID atau akan memunculkan 404 jika tidak ditemukan
    return view('news.show', compact('news')); // Mengirimkan data ke view 'news.show'
    }
    // Menampilkan semua berita
    public function index()
    {
        $news = News::all();
        return view('news.index', compact('news'));
    }

    // Menampilkan form untuk membuat berita baru
    public function create()
    {
        return view('news.create');
    }

    // Menyimpan berita baru ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'required|url',
        ]);

        News::create($validated);
        return redirect()->route('news.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit berita
    public function edit($id)
{
    $news = News::findOrFail($id); // Mencari berita berdasarkan ID
    return view('news.edit', compact('news')); // Mengirimkan data ke view
}


    // Memperbarui berita di database
    public function update(Request $request, $id)
{
    $news = News::findOrFail($id); // Mencari berita berdasarkan ID

    // Validasi input (opsional, sesuaikan sesuai kebutuhan)
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'link' => 'required|url',
    ]);

    // Memperbarui data
    $news->update($validated);

    // Redirect kembali dengan pesan sukses
    return redirect()->route('news.index')->with('success', 'Berita berhasil diperbarui');
}

    // Menghapus berita dari database
    public function destroy($id)
    {
        $newsItem = News::findOrFail($id);
        $newsItem->delete();

        return redirect()->route('news.index')->with('success', 'Berita berhasil dihapus!');
    }
        // Fungsi untuk mencetak daftar berita ke dalam PDF
        public function cetak()
        {
            // Mengambil semua data berita
            $news = News::all();
    
            // Menggunakan view untuk di-render sebagai PDF
            $pdf = Pdf::loadView('news.cetak', compact('news'));
    
            // Unduh PDF dengan nama file "daftar_berita.pdf"
            return $pdf->download('daftar_berita.pdf');
    
            // Jika ingin menampilkan langsung di browser, gunakan:
            return $pdf->stream('daftar_berita.pdf');
        }
    
}

