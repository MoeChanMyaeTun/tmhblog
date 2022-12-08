@extends('admin/layout')
@section('content')
    <div class=" py-5">

        <form action="" class="mt-3 w-25 d-flex align-items-start  my-2">
            <input id="title" type="text" class="form-control rounded-start" name="title" autocomplete="title"
                value="{{ old('title') }}">
            <button class="btn btn-light border border-secondary" style="margin-left:-16px"><i
                    class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        <table class="table table-striped text-center   mx-auto">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>

            @foreach ($data as $post)
                <tr>
                    <td>{{ request()->page ? (request()->page - 1) * 5 + $loop->iteration : $loop->iteration }}</td>
                    <td>
                       {{ optional($post->user)->name}}
                    </td>
                    <td>{{ $post->title }}</td>
                    <td>
                       {{ optional($post->category)->name }}
                    </td>
                    <td>
                        <div class="cart  align-items-center ">
                            <div class="d-flex  mb-2 mr-2">
                                <div class="ms-auto d-flex mx-auto justify-content-between">
                                    <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                                    <form class="del-form " action="{{ route('admin.post.delete', $post->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger ml-2 ">
                                            <i class="fa-solid fa-trash-can"></i> Del
                                        </button>
                                    </form>
                                </div>
                            </div>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $data->appends(request()->input())->links() }}
    </div>
@endsection
