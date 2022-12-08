@extends('admin.layout')

@section('content')
    <div class="container py-4">
        <a href="{{ route('admin.category.create') }}" class="btn btn-primary"> create</a>
        <table class="table table-striped text-center   mx-auto mt-4">
            <thead class="table-dark">
                <tr >
                    <th>No</th>
                    <th>Name</th>
                </tr>
            </thead>

            @foreach ($data as $category)
                <tr>
                    <td>{{ request()->page? (request()->page - 1) * 5 + $loop->iteration : $loop->iteration }}</td>
                    <td>
                        {{ $category->name }}
                    </td>
                </tr>
                @endforeach
        </table>
    </div>

@endsection
