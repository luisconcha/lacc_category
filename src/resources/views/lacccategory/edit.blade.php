@extends('layouts.app')

@section('content')

    <div class="container">
        <h3>Edit Category: {{$category->name}}</h3>

        {!! Form::model($category, ['route'=>['admin.categories.update','id'=>$category->id], 'method'=>'put']) !!}

        @include('lacccategory::_form')

        <div class="form-group">
            {!! Form::submit('Edit category', ['class'=>'btn btn-primary']) !!}
            <a href="{{route('admin.categories.index')}}" class="btn btn-warning">Return</a>
        </div>

        {!! Form::close() !!}
    </div>
@endsection