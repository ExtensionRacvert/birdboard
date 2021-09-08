@extends('layouts.app')

@section('content')

    <header class="container">
        <div class="row d-flex">
            <div class="col">
                <nav aria-label="breadcrumb mb-0">
                    <ol class="breadcrumb p-2">
                        <li class="breadcrumb-item active" aria-current="page">
                            <p class="text-muted mb-0">My Projects
                            </p>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="col items-center">
                <a href="/projects/create" 
                    type="button" 
                    class="btn btn-info btn-sm text-white float-right mt-2"><i class="fa fa-plus mr-1"></i> Add Project</a>
            </div>
        </div>
    </header>
    
    <main class="container">

        <div class="row mt-3">
            @forelse( $projects as $project )
                <div class="col-md-4 mb-4">
                    <a href="{{ $project->path() }}">
                        <div class="card bg-white border-0 shadow-sm pt-2 py-2">
                            <div class="p-2" style="border-left: 4px solid #6cb2eb;"><a href="{{ $project->path() }}">{{ $project->title }}</a></div>
                            <div class="p-2 pl-3">{{ $project->description }}</div>
                            <div class="row">
                                <div class="col"></div>
                                <div class="col"><small class="float-right pr-2 text-muted" >Created {{ $project->created_at->diffForHumans() }}</small></div>
                            </div>
                        </div>
                    </a>
                </div>
                @empty
                <div>You have no projects yet.</div>
            @endforelse
        </div>

    </main>

@endsection