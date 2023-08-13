@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <div class="hero">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p>
                        Holaaa, Saya Reonaldi Saputro dan saya adalah
                    </p>
                    <h1>
                        UI/UX Designer <br>
                        Web Developer <br>
                        Mobile Developer
                    </h1>
                    <p>
                        Saya sangat suka mendesain sebuah website dan mobile apps. Selain membuat membuat desainnya, <br>
                        saya juga bisa mengimplementasikan desain yang saya buat menjadi sebuah website atau mobile apps.
                    </p>
                    <div class="tombol d-flex align-items-center justify-content-center">
                        <a href="#" class="btn mx-3 project">See My Projects -></a>
                        <a href="#" class="btn mx-3 contact">Contact Me</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="services">
        <div class="container">
            <div class="row">
                <div class="col text-center badge1">
                    <p class="badge">Services</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h2 class="text-center">Layanan yang Saya Tawarkan</h2>
                </div>
            </div>
            <div class="row row-cols-lg-3 row-cols-1 list-layanan">
                <div class="col">
                    <div class="card">
                        <img src="{{ asset('css/icon-uiux.png') }}" alt="">
                        <h5>UIUX Mobile</h5>
                        <p>Lorem ipsum dolor sit amet consectetur. Lorem ipsum dolor sit amet consectetur. Lorem ipsum dolor
                            sit amet consectetur. </p>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="{{ asset('css/icon-mobile.png') }}" alt="">
                        <h5>Mobile Development</h5>
                        <p>Lorem ipsum dolor sit amet consectetur. Lorem ipsum dolor sit amet consectetur. Lorem ipsum dolor
                            sit amet consectetur. </p>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="{{ asset('css/icon-web.png') }}" alt="">
                        <h5>Full Stack Web</h5>
                        <p>Lorem ipsum dolor sit amet consectetur. Lorem ipsum dolor sit amet consectetur. Lorem ipsum dolor
                            sit amet consectetur. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="projects">
        <div class="container">
            <div class="row">
                <div class="col text-center badge1">
                    <p class="badge">Projects</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h2 class="text-center">Project Terbaru</h2>
                </div>
            </div>
            <div class="row row-cols-lg-4 row-cols-2 list-project">
                <div class="col">
                    <div class="card">
                        <img src="{{ asset('css/web.jpg') }}" class="card-img-top" alt="...">
                        <h5>Website - Dashboard Admin</h5>
                        <p>Developing Website Apr - 2023</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="{{ asset('css/web.jpg') }}" class="card-img-top" alt="...">
                        <h5>Website - Dashboard Admin</h5>
                        <p>Developing Website Apr - 2023</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="{{ asset('css/web.jpg') }}" class="card-img-top" alt="...">
                        <h5>Website - Dashboard Admin</h5>
                        <p>Developing Website Apr - 2023</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="{{ asset('css/web.jpg') }}" class="card-img-top" alt="...">
                        <h5>Website - Dashboard Admin</h5>
                        <p>Developing Website Apr - 2023</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="{{ asset('css/web.jpg') }}" class="card-img-top" alt="...">
                        <h5>Website - Dashboard Admin</h5>
                        <p>Developing Website Apr - 2023</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="{{ asset('css/web.jpg') }}" class="card-img-top" alt="...">
                        <h5>Website - Dashboard Admin</h5>
                        <p>Developing Website Apr - 2023</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="{{ asset('css/web.jpg') }}" class="card-img-top" alt="...">
                        <h5>Website - Dashboard Admin</h5>
                        <p>Developing Website Apr - 2023</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="{{ asset('css/web.jpg') }}" class="card-img-top" alt="...">
                        <h5>Website - Dashboard Admin</h5>
                        <p>Developing Website Apr - 2023</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="tombol d-flex justify-content-center">
                        <a href="#" class="btn mx-3 project">See More -></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="blogs">
        <div class="container">
            <div class="row">
                <div class="col text-center badge1">
                    <p class="badge">Blogs</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h2 class="text-center">Blog Terbaru</h2>
                </div>
            </div>
            <div class="row row-cols-lg-4 row-cols-2 list-blog">
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
            <div class="row">
                <div class="col">
                    <div class="tombol d-flex justify-content-center">
                        <a href="/blogs" class="btn mx-3 project">See More -></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact" id="#contact">
        <div class="container">
            <div class="row">
                <div class="col text-center badge1">
                    <p class="badge">Contact</p>
                </div>
            </div>
            <div class="row d-flex align-items-center justify-content-between content g-4">
                <div class="col col-lg-6 my-3">
                    <h2>Let's start project together?</h2>
                    <p class="p">Contact me for questions, collaboration, conversation or just saying hello. Thank you
                        for stopping by
                        here,</p>
                    <div class="contact-list d-flex align-items-center justify-content-between">
                        <p>reonaldi@gmail.com</p>
                        <p>0812 3456 78910</p>
                    </div>
                </div>
                <div class="col col-lg-4 my-3">
                    <img src="{{ asset('css/profile.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
