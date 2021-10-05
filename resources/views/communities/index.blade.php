@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('My communities') }}</div>

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
