@extends('layouts.app')

@section('content')

    <header class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb mb-0">
                    <ol class="breadcrumb p-2">
                        <li class="breadcrumb-item active" aria-current="page">
                            <a href="/projects">
                                <p class="text-muted mb-0">My Projects<a> / {{ $project->title }} </a>
                                </p>
                            </a>
                        </li>
                        
                        <a href="" type="button" class="btn btn-info text-white ml-auto btn-sm"><i class="fa fa-plus"></i> Add Task</a>
                    </ol>
                </nav>
            </div>
            <div class="col">
                <a href="{{ $project->path().'/edit' }}" class="btn btn-info btn-sm float-right text-white mt-2"><i class="fa fa-pencil"></i> Edit Project</a>
            </div>
        </div>
    </header>
    
    {{-- Main section --}}
    <main class="container"><hr>
        <p class="text-muted">Tasks</p>
        <div class="row ">

            {{-- Left column --}}
            <div class="col col-md-8">
                @forelse( $project->tasks as $task )
                    <div class="row bg-white border-0 shadow-sm py-3 mb-2 ml-1">
                        <div class="col" style="border-left: 4px solid #6cb2eb;">
                            <form method="POST" action="{{ $task->path() }}">
                                @method('PATCH')
                                @csrf
                                <input name="body" value="{{ $task->body }}" class="form-control  border-0 text-default bg-card w-full {{ $task->completed ? 'line-through text-muted' : '' }}">
                            </form>
                        </div>
                        <div class="col">
                            <input type="checkbox" class="float-right mt-2" class="my-auto" aria-label="Checkbox for following text input">
                        </div>
                    </div>
                    @empty
                    <div class="card border-0 p-2 pl-3 text-danger">There are no tasks for this project yet...</div>
                @endforelse
                    <div class="card border-0 bg-white p-2 ml-1 mt-3 pb-0">
                        <form action="{{ $project->path() . '/tasks' }}" method="POST" class="form-group">
                            @csrf
                            <input type="text" name="body" class="form-control bg-light border-0 mt-2" placeholder="Add a new task... and hit enter">
                        </form>
                    </div>

                {{-- General Notes --}}
                <div class="mt-5">
                    <p class="text-muted">General Notes</p>
                    <div class="row bg-white border-0 shadow-sm mt-2 p-3" style="margin-left: 0px;">
                        <form action="{{ $project->path() }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <textarea name="notes" id="" cols="30" rows="10" class="w-100 border-0 bg-light p-2">{{ $project->notes }}</textarea>
                            <button type="submit" class="btn btn-info btn-sm text-white">Save</button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Right column --}}
            <div class="col col-md-4">
                <div class="card bg-white border-0 shadow-sm pt-2 py-3">
                    <div class="p-2" style="border-left: 4px solid #6cb2eb;">
                        <h5 class="mb-0">{{ $project->title }}</h5 class="mb-0">
                    </div>
                    <div class="p-2">{{ $project->description }}</div>
                    <div class="row">
                        <div class="col"></div>
                        <div class="col"><small class="float-right pr-2 text-muted" >{{ $project->created_at->diffForHumans() }}</small></div>
                    </div>
                </div>
            </div>
        </div>

    </main>

@endsection