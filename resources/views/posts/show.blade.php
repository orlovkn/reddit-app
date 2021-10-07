@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $post->title }}</div>

                <div class="card-body">
                    @if ($post->url != '')
                        <p><a href="{{ $post->url }}" target="_blank">{{ $post->url }}</a></p>
                    @endif
                    {{ $post->text  }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
