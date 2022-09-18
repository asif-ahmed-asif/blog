@extends('layouts.master')
@section('header','Create Post')
@section('breadcrumb','Create')
@section('content')

    <div>
        @include('flash_message')
    </div>

    <div>
        <a class="btn btn-primary pull-right" href="{{ route('post.index') }}">Back</a>
    </div>

    <div class="box-body">
        <form role="form" action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="post">Category</label>
                    <select class="form-control" name="category_id">
                        <option value="" selected>Select Category</option>
                        @forelse(cache()->get('categories') as $category)
                           <option value="{{ $category->id }}">{{ $category->category_name }}</option>

                        @empty

                        @endforelse
                    </select>
                </div>

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter Post Title">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" cols="40" rows="10" name="description" id="description" placeholder="Enter Post Description">

                    </textarea>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image">
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" id="status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
