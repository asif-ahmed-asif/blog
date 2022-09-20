@extends('frontend.layouts.master')
@section('content')
    @forelse($posts as $post)
        <article class="col-12 col-md-6 tm-post">
            <hr class="tm-hr-primary">
            <a href=" {{ route('post.detail', $post->id) }}" class="effect-lily tm-post-link tm-pt-60">
                <div class="tm-post-link-inner">
                    <img style="height: 300px; width: 500px;" src="{{ asset('storage/'.$post->image) }}" alt="Image" class="img-fluid" >
                </div>
                <span class="position-absolute tm-new-badge">New</span>
                <h2 class="tm-pt-30 tm-color-primary tm-post-title">{{ $post->title }}</h2>
            </a>
            <p class="tm-pt-30">
                {{ Str::limit($post->description, 250) }}<a href=" {{ route('post.detail', $post->id) }}"> Read more </a>
            </p>
            <div class="d-flex justify-content-between tm-pt-45">
                <span class="tm-color-primary">{{ $post->category_name }}</span>
                <span class="tm-color-primary">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans()  }}</span>
            </div>
            <hr>
            <div class="d-flex justify-content-between">
                <span>36 comments</span>
                <span>by Admin Nat</span>
            </div>
        </article>

    @empty

    @endforelse


@endsection
