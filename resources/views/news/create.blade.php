@extends('app')

@section('content')
    <h1>Tambah Berita</h1>

    <form action="{{ route('news.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Judul Berita</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi Berita</label>
            <textarea id="description" name="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="link">Link Berita</label>
            <input type="url" id="link" name="link" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Tambah Berita</button>
    </form>
@endsection
