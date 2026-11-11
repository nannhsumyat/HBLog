@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4">
    <div class="my-4">
        <a href="{{route('backend.posts.index')}}" class="btn btn-danger float-end">Cancel</a>
        <h1 class="mt-4 d-inline">Edit Posts</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Posts</li>
            <li class="breadcrumb-item active">Edit Posts</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Edit Posts
            </div>
                <div class="card-body">
                    <form action="{{route('backend.posts.update', $post->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control @error ('title') is-invalid @enderror" value="{{$post->title}}">
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="true">Image</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="new_image-tab" data-bs-toggle="tab" data-bs-target="#new_image-tab-pane" type="button" role="tab" aria-controls="new_image-tab-pane" aria-selected="false">New Image</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                                    <img src="{{$post->image}}" class="w-25 h-25 my-3" alt="">
                                    <input type="hidden" name="old_image" id="" value="{{$post->image}}">
                                </div>
                                <div class="tab-pane fade" id="new_image-tab-pane" role="tabpanel" aria-labelledby="new_image-tab" tabindex="0">...</div>
                            </div>
                            <input type="file" accept="image/*" name="image" id="image" class="form-control @error ('image') is-invalid @enderror" value="{{old('image')}}">
                            @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control @error ('description') is-invalid @enderror"> {{$post->description}}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select name="category_id" id="category" class="form-select @error ('category_id') is-invalid @enderror">
                                <option value="">Choose Category</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$post->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
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
                            <button class="btn btn-warning" type="submit">Update</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection