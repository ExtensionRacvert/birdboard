@extends('layouts.app')

@section('content')

<main class="container w-75">
    <h4 class="heading m-auto">Edit Your Project</h4>
    <form method="POST" action="{{ $project->path() }}" class="form-group mt-3">
        @csrf
        @method('PATCH')

        @include('projects.partials.form', [
                'buttonText' => 'Update Project'
        ])
    </form>
</main>

@endsection