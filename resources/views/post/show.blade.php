@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        Post Detail
                    </div>
                    <div class="card-body">
                        <div class="row my-2">
                            <div class="col-md-4">
                                @if ($data->image)
                                    <img src="{{ asset($data->image) }}" alt="" style="width:80%; height:100px">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <div class="col-md-12">
                                    <h3>{{ $data->title }}</h3>
                                    <p>{{ $data->description }}</p>
                                </div>
                                @if (auth()->check() && auth()->id() == $data->user->id)
                                    <div class="col-md-12 mx-auto d-flex justify-content-between">
                                        <a href="{{ route('post.edit', $data->id) }}" class="btn btn-success">Edit</a>
                                        <form action="{{ route('post.delete', $data->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
