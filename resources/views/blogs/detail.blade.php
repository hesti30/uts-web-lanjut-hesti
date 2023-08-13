@extends('layouts.app')

@section('title', 'Detail Blog')

@section('content')
    <div class="detail-blog">
        <div class="container">
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <img src="{{ Storage::url($blogs->thumbnail) }}" class="img-fluid " alt="...">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h1>{{ $blogs->title }}</h1>
                    <div class="d-flex align-items-center">
                        <h5>{{ $blogs->created_at->format('d F Y') }}</h5>
                        <h5 class="blog-category mx-5">{{ $blogs->category->name }}</h5>
                    </div>
                </div>
            </div>
            <div class="row blog-body">
                <div class="col">
                    <p class="body">{!! $blogs->body !!}</p>
                </div>
            </div>
        </div>
    </div>

@endsection
