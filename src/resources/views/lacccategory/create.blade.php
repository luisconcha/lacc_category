@extends('layouts.app')

@section('content')

    <div class="container">
        <h3>Create Categorie</h3>

        {!! Form::open(['method'=>'post', 'route'=>['admin.categories.store']]) !!}


        @include('lacccategory::_form')

        <div class="form-group">
            {!! Form::submit('Create category', ['class'=>'btn btn-primary']) !!}
        </div>


        {!! Form::close() !!}
    </div>
@endsection