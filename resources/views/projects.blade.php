@extends('layouts.app')

@section('title', 'My Projects')

@section('content')
    <div class="project-hero">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col col-lg-8">
                    <h1 class="text-center">Projects</h1>
                    <p class="text-center">Project yang sudah saya kerjakan sampai saat ini</p>
                </div>
            </div>
        </div>
    </div>

    <div class="project-category">
        <div class="container">
            <div class="row">
                <div class="col text-center badge1">
                    <p class="badge">Project Category</p>
                </div>
            </div>
            <div class="row row-cols-lg-3 row-cols-1 list-projects">
                @foreach ($project_categories as $project_category)
                    <div class="col">
                        <div class="card">
                            {{-- <img src="{{ asset('css/icon-uiux.png') }}" alt=""> --}}
                            <h5>{{ $project_category->name }}</h5>
                            {{-- <p>Membuat UI dan UX Mobile Apps atau Website dengan menggunakan tools Figma</p> --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="all-project">
        <div class="container">
            <div class="row">
                <div class="col text-center badge1">
                    <p class="badge">All Projects</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h2 class="text-center">Semua Project</h2>
                </div>
            </div>
            <div class="row row-cols-lg-4 row-cols-2 list-all-project">
                @foreach ($projects as $project)
                    <div class="col">
                        <div class="card">
                            <img src="{{ Storage::url($project->thumbnail) }}" class="card-img-top" alt="...">
                            <h5>{{ $project->title }}</h5>
                            <p>{{ $project->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
