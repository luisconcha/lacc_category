@extends('layouts.app')

@section('content')

    <div class="container">
        <h3>Categories</h3>

        <a href="{{route('admin.categories.create')}}">Create Category</a>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Status</th>
            </tr>
            @foreach($listCategories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->slug}}</td>
                    <td>{{$category->active}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection