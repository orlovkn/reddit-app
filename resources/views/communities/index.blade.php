@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('My communities') }}</div>
                @if (session('message'))
                    <div class="alert alert-info mb-2">{{ session('message') }}</div>
                @endif
                <div class="card-body">
                    <a href="{{route('communities.create')}}" class="btn btn-dark mb-3">New community</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($communities as $community)
                                <tr>
                                    <td>
                                        <a href="{{ route('communities.show', $community) }}">{{ $community->name }}</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('communities.edit', $community) }}" class="btn btn-primary">edit</a>
                                        <form action="{{ route('communities.destroy', $community) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('are you sure?')"
                                            >Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
