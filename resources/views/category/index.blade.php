@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                @foreach ($posts as $post )
                    <div class="col-md-6 my-3 ">
                        <div class="card">
                            @if ($post->image)
                                <img src="{{ asset($post->image) }}" alt="" style="width:100%; height:200px">
                            @endif
                            <div class="px-4 py-3 bg-light">
                                <h2> {{ $post->title }} </h2>
                                <div class="d-flex justify-content-between">
                                    <p class="text-secondary fs-6 text"><i
                                            class="fas fa-calendar"></i>&nbsp;{{ $post->created_at }}</p>
                                    <p class="text-secondary fs-6 text"><i class="fa-solid fa-user"></i>&nbsp; {{ optional($post->user)->name}}</p>
                                </div>
                                <p class="text-secondary fs-6 text"><i class="fa-solid fa-folder-open"></i>&nbsp; {{ optional($post->category)->name}}</p>
                                <p class="align-justify">{{ Str::limit($post->description, 100) }}...</p>
                                <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary px-3 my-4">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $posts->appends(request()->input())->links() }}
            </div>
        </div>
        <div class="col-md-4">
            <form action="" class="mt-3 d-flex align-items-start ">
                <input id="title" type="text" class="form-control rounded-start" name="title"
                    autocomplete="title">
                <button class="btn btn-light border border-secondary" style="margin-left:-16px"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <div class="col-md-12 my-3">
                <h2>LATEST POST</h2>
                @foreach ($latest as $post)
                    <a href="{{ route('post.show', $post->id) }}" class="link-dark text-decoration-none">
                        <div class="row my-3 pb-3 border-bottom border-secondary ">
                            <div class="col-md-3">
                                @if ($post->image)
                                    <img src="{{ asset($post->image) }}" alt=""  style="width:100%; height:100px">
                                @endif
                            </div>
                            <div class="col-md-9">
                                <div class="px-2 my-1">
                                    <h4> {{ $post->title }} </h4>
                                    <p>{{ Str::limit($post->description, 50) }}</p>
                                </div>
                            </div>
                        </div>
                @endforeach
                </a>
            </div>
            <div class="col-md-12 my-3">
                <h2 class="my-4">CATEGORIES</h2>
                @foreach ($categories as $category)
                    <a href="{{ route('category.show',$category->id) }}"  class="link-secondary text-decoration-none">
                        @if ($category->post->count() > 0)
                            <div class="row mb-1 px-2">
                                <div class="col-md-6">
                                    {{ $category->name }}</div>
                                <div class="col-md-6  text-end"> {{ $category->post->count() }}</div>
                            </div>
                            <hr class="my-1">
                        @endif
                    </a>
                @endforeach
                </a>
            </div>
        </div>
    </div>
</div>
<footer class="bg-dark  py-1 mt-2">
    <p class="text-white text-center my-0"> Copyright 2022</p>
  </footer>



@endsection
