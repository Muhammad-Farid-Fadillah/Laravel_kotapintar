@extends('app')

@section('content')
    <h1>Kelola Berita</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('news.cetak') }}" class="btn btn-primary">Cetak PDF</a>

    <a href="{{ route('news.create') }}" class="btn btn-primary">Tambah Berita</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Link</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($news as $newsItem)
                <tr>
                    <td>{{ $newsItem->id }}</td>
                    <td>{{ $newsItem->title }}</td>
                    <td>{{ $newsItem->description }}</td>
                    <td><a href="{{ $newsItem->link }}" target="_blank">Baca</a></td>
                    <td>
                        <a href="{{ route('news.edit', $newsItem->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('news.destroy', $newsItem->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus berita ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada berita.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
