
<div class="field">
    <label for="title" class="label">Title</label>

    <div class="control">
        <input type="text" 
                name="title" 
                class="form-control"
                value="{{ $project->title }}"
        >
    </div>
</div>

<div class="field mt-4">
    <label for="description" class="label">Description</label>

    <div class="control">
        <textarea type="text" 
                    name="description" 
                    class="form-control" 
                    placeholder="Description"
        >{{ $project->description }}</textarea>
    </div>
</div>

<div class="row mt-4">
    <div class="col">
        <button type="submit" class="btn btn-primary btn-sm is-link"><i class="fa fa-check mr-1"></i> Update Project</button>
    </div>
    <div class="col">
        <a href="{{ $project->path() }}" type="button" class="btn btn-danger text-white btn-sm float-right">Cancel</a>
    </div>
</div>