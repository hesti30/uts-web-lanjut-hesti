@extends('layouts.app')

@section('title', 'My Blogs')

@section('content')

    <div class="blogs-hero">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col col-lg-8">
                    <h1 class="text-center">The Blogs</h1>
                    <p class="text-center">Beberapa blog yang mungkin bermanfaat buat Anda</p>
                    {{-- <input type="text" class="form-control" placeholder="Cari blog disini"> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="new-blogs">
        <div class="container">
            <div class="row">
                <div class="col text-center badge1">
                    <p class="badge">New Blog</p>
                </div>
            </div>
            <div class="row new">
                @foreach ($new_blog as $item)
                    <div class="col">
                        <a href="/blogs/detail/{{ $item->id }}" style="text-decoration: none;">
                            <div class="card bg-dark text-white">
                                <img src="{{ Storage::url($item->thumbnail) }}" class="card-img-top">
                                <div class="card-img-overlay">
                                    <p class="card-text tanggal">{{ $item->created_at->format('d F Y') }}</p>
                                    <h5 class="card-title">{{ $item->title }}</h5>
                                    <p class="card-text">{{ $item->description }}</p>
                                    <div class="card-text blog-category d-flex align-items-center">
                                        <p>{{ $item->category->name }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="all-blogs">
        <div class="container">
            <div class="row">
                <div class="col text-center badge1">
                    <p class="badge">All Blogs</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h2 class="text-center">Semua Blog</h2>
                </div>
            </div>
            <div class="row row-cols-lg-4 row-cols-2 list-all-blogs">
                @foreach ($blogs as $blog)
                    <div class="col">
                        <a href="/blogs/detail/{{ $blog->id }}" style="text-decoration: none;">
                            <div class="card">
                                <img src="{{ Storage::url($blog->thumbnail) }}" class="card-img-top" alt="...">
                                <h5>{{ $blog->title }}</h5>
                                <p>{{ $blog->description }}</p>
                                <div class="tanggal d-flex justify-content-between align-items-center">
                                    <p>{{ $blog->created_at->format('d F Y') }}</p>
                                    <p class="category-blog">{{ $blog->category->name }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="my-3">
                    {{ $blogs->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
