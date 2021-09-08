@extends('layouts.app')

@section('content')

<main class="container w-75">
    <h4 class="heading m-auto">Create Project</h4>
    <form method="POST" action="/projects" class="form-group mt-3">
        @csrf

        @include('projects.partials.form', [
                 'project' => new App\Models\Project,
                 'buttonText' => 'Create Project'
        ])
    </form>
</main>

@endsection