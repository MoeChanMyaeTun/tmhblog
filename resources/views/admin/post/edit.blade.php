@extends('admin/layout')
@section('content')
    <div class="mv">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card ">
                        <div class="card-header">
                            <h2>Post Create</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.post.update', $data->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('Put')
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="" class="d-block text-center pt-1">Title</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="title" id="" class="form-control " required
                                            value="{{ old('title', $data->title) }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="" class="d-block text-center pt-1">Category</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select class="form-select form-control" id="pre-selected-options"
                                            name="name" aria-label="Choose Category Name" multiple>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="" class="d-block text-center pt-1">Description</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="description" id="" class="form-control"
                                            required value="{{ old('description', $data->description) }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="" class="d-block text-center pt-1">Image</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="file" name="image" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-9 d-flex justify-content-between ">
                                        <input type="reset" value="Clear" class="btn btn-secondary">
                                        <input type="submit" class="btn btn-primary" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
