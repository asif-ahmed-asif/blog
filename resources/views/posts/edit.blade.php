@extends('layouts.master')
@section('header','Edit Post')
@section('breadcrumb','Edit')
@section('content')

    <div>
        <a class="btn btn-primary pull-right" href="{{ route('post.index') }}">Back</a>
    </div>

    <div class="box-body">
        <form role="form" action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="post">Category</label>
                    <select class="form-control  @error('category_id') is-invalid @enderror" name="category_id">
                        <option value="" selected>Select Category</option>
                        @forelse($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : ''}}>{{ $category->category_name }}</option>

                        @empty

                        @endforelse
                    </select>
                    @error('category_id')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $post->title }}" id="title" placeholder="Enter Post Title">
                    @error('title')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control  @error('description') is-invalid @enderror" cols="40" rows="10" name="description" id="description">
                        {{ $post->description }}
                    </textarea>
                    @error('description')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <img src="{{ asset('storage/'.$post->image) }}" width="100px" height="100px">
                </div>
                <div class="form-group">

                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="@error('image') is-invalid @enderror">
                    @error('image')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control @error('status') is-invalid @enderror" id="status">
                        <option value="1" {{ $post->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $post->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
