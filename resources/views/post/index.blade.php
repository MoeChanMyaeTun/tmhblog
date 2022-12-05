@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    @foreach ($data as $post)
                        <div class="col-md-6 my-3">
                            <div class="card">
                                @if ($post->image)
                                    <img src="{{ asset($post->image) }}" alt="" style="width:100%; height:200px">
                                @endif
                                <div class="px-2 my-1">
                                    <h2> {{ $post->title }} </h2>
                                    <p>{{ $post->description }}</p>
                                    <a href="#" class="btn btn-primary w-25">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- {!! $data->onEachSide(1)->links( ) !!} --}}
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-md-12">
                    <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">
                        <div class="input-group">
                          <input type="search" placeholder="What're you searching for?" aria-describedby="button-addon1" class="form-control border-0 bg-light">
                          <div class="input-group-append">
                            <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </div>
                </div>
                <div class="col-md-12 my-3">
                    <?php $count = 0; ?>
                    @foreach ($data as $post)
                        <?php if ($count == 5) {
                            break;
                        } ?>
                        <div class="row my-3">
                            <div class="col-md-3">
                                @if ($post->image)
                                    <img src="{{ asset($post->image) }}" alt="" style="width:100%; height:100px">
                                @endif
                            </div>
                            <div class="col-md-9">
                                <div class="px-2 my-1">
                                    <h2> {{ $post->title }} </h2>
                                    <p>{{ $post->description }}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <?php $count++; ?>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
