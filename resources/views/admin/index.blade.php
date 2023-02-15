@extends('layouts.app')

@section('content')

<div class="container">
    <div>
        <a class="btn btn-primary my-4" href="{{route('projects.create')}}">Create</a>
        <a class="btn btn-secondary fw-semibold mx-4" href="http://127.0.0.1:8000/api/projects">JSON</a>
    </div>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach ($projects as $project)
        <div class="col">
            <div class="card">
                <img src="{{asset('/storage/'.  $project->cover_img)}}" class="card-img-top" alt="cover image">
                <div class="card-body pt-5">
                    <h5 class="card-title"> {{$project->name}}</h5>
                    <h5 class="card-title"> {{ $project->type ? $project->type->name : ' ' }}</h5>
                    <p class="card-text">{{Str::limit($project->description , 30)}}</p>
                    <div class="d-flex gap-3 pt-4">
                        <a href="{{ route('projects.show', $project->id) }}" class="btn btn-success">Show</a>
                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-info">Edit</a>
                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                            @csrf()
                            @method('delete')
                            <button class="btn btn-danger">X</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div>
        <a class="btn btn-dark my-4" href="{{route('dashboard')}}">Back to Dashboard</a>
    </div>
</div>
@endsection
