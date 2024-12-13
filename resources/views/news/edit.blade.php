@extends('app')

@section('content')
    <h1>Edit Berita</h1>

    <form action="{{ route('news.update', $news->id) }}" method="POST">
    @csrf
    @method('PUT')
    <!-- Fields for updating news -->
    <form action="{{ route('news.update', $news->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="title">Judul</label>
        <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $news->title) }}" required>
    </div>

    <div class="form-group">
        <label for="description">Deskripsi</label>
        <textarea id="description" name="description" class="form-control" required>{{ old('description', $news->description) }}</textarea>
    </div>

    <div class="form-group">
        <label for="link">Link</label>
        <input type="url" id="link" name="link" class="form-control" value="{{ old('link', $news->link) }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Update Berita</button>
</form>

@endsection
