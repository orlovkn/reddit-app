@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $community->name }}</div>

                <div class="card-body">
                    <a href="{{ route('communities.posts.create', $community) }}" class="btn btn-primary mb-3">Create new post</a>
                </div>

                <div class="card-body">
                    @forelse($posts as $post)
                        <h3><a href="{{route('communities.posts.show', [$community, $post])}}">{{$post->title}}</a></h3>
                        <p>{{ \Illuminate\Support\Str::words($post->text, 10)}}</p>
                        <hr>
                    @empty
                        No posts
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
