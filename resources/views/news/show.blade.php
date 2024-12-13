@extends('app')

@section('content')
    <div class="container">
        <h1>Detail Berita</h1>

        <div class="card">
            <div class="card-header">
                <h2>{{ $news->title }}</h2>
            </div>
            <div class="card-body">
                <p><strong>Deskripsi:</strong></p>
                <p>{{ $news->description }}</p>
                <p><strong>Link:</strong> <a href="{{ $news->link }}" target="_blank">{{ $news->link }}</a></p>
            </div>
            <div class="card-footer">
                <a href="{{ route('news.index') }}" class="btn btn-primary">Kembali ke Daftar Berita</a>
            </div>
        </div>
    </div>
@endsection
