@extends('layouts.app')

@section('content')
    <div class="mv">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card ">
                        <div class="card-header">
                            <h2>Category Create</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="" class="d-block text-center pt-1">Name</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="name" id="" class="form-control " required>
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
