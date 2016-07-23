<div class="form-group">
    {!! Form::label('Parent', 'Parent:') !!}
    {!! Form::select('parent_id',$listCategories, null,['class'=>'form-control'] ) !!}
</div>

<div class="form-group">
    {!! Form::label('Name', 'Name:') !!}
    {!! Form::text('name', null, ['placeholder'=>'Informe a Name','class'=>'form-control', 'id'=>'name']) !!}
</div>

<div class="form-group">
    {!! Form::label('Active', 'Active:') !!}
    {!! Form::checkbox('active') !!}
</div>