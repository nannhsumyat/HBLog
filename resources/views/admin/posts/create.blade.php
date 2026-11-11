@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4">
    <div class="my-4">
        <a href="{{route('backend.posts.index')}}" class="btn btn-danger float-end">Cancel</a>
        <h1 class="mt-4 d-inline">Posts</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Posts</li>
            <li class="breadcrumb-item active">Create Posts</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Posts list
            </div>
                <div class="card-body">
                    <form action="{{route('backend.posts.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control @error ('title') is-invalid @enderror" value="{{old('title')}}">
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" accept="image/*" name="image" id="image" class="form-control @error ('image') is-invalid @enderror" value="{{old('image')}}">
                            @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control @error ('description') is-invalid @enderror"> {{old('description')}}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select name="category_id" id="category" class="form-select @error ('category_id') is-invalid @enderror">
                                <option value="">Choose Category</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="hidden" name="user_id" value="1">
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection