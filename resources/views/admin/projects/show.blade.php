@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card text-center">
                    <div class="card-body">
                        <p class="card-text">Category: {{ $project->type->name }}</p>
                        <h5 class="card-title"> {{ $project->author }} </h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary"> {{ $project->title }} </h6>
                        <p class="card-text"> {{ $project->description }} </p>
                        <a href="{{ route('admin.projects.index') }}" title="Back"><button class="btn btn-secondary me-2">Back <i class="fa fa-arrow-left"></i></button></a>
                        <a href="{{ route('admin.projects.edit', $project) }}"><button class="btn btn-warning">Edit <i class="fa fa-pencil"></i></button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
