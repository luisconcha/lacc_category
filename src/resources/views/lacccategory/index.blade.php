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
                <th>Action</th>
            </tr>
            @foreach($listCategories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->slug}}</td>
                    <td>{{$category->active}}</td>
                    <td>
                        <a href="{{route('admin.categories.edit',['id'=>$category->id])}}">Edit</a> |
                        <a href="{{route('admin.categories.destroy',['id'=>$category->id])}}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection