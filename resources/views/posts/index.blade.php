@extends('layouts.master')
@section('header','Post Dashboard')
@section('breadcrumb','Post')
@section('content')

        <div>
            <div>
                @include('flash_message')
            </div>

            <div>
                <a class="btn btn-primary" href="{{ route('post.create') }}">Create Post</a>
            </div>
        </div><br><br>

        <div class="box">
        <div class="box-body">
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created</th>
                </tr>
                </thead>
                <tbody>
                @forelse($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->category_name }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                    <textarea cols="40" rows="8" readonly>
                        {{ $post->description }}
                    </textarea>
                        </td>
                        <td>
                            @if($post->image)
                                <img src="{{ asset('storage/'.$post->image) }}" width="50px" height="50px">
                            @endif
                        </td>
                        <td>
                            @if($post->status == true)
                                <span class="label label-success">Active</span>
                            @elseif($post->status == false)
                                <span class="label label-danger">Inactive</span>
                            @endif
                        </td>
                        <td>{{ $post->created_at }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('post.delete', $post->id) }}" class="btn btn-danger">Delete</a>
                            </div>
                        </td>
                    </tr>
                @empty
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
