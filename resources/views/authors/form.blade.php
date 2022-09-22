

@extends('adminlte::page')

@section('title', 'Authors')

@section('content_header')
    <h1>{{ $operation }} Authors</h1>
@stop

@section('content')
    {{ Form::model($author, ['action' => '\App\Http\Controllers\AuthorsController@store']) }}

    <div class="row">
        <x-adminlte-input name="first_name" label="First Name"
                          fgroup-class="col-md-6" value="{{$author->first_name}}"/>
    </div>
    <div class="row">
        <x-adminlte-input name="surname" label="Surname"
                          fgroup-class="col-md-6" value="{{$author->surname}}"/>
    </div>
        {{ Form::hidden('id') }}
    <x-adminlte-button class="btn-flat" type="submit" label="Save" theme="success" icon="fas fa-lg fa-save"/>

    {{ Form::close() }}

@stop


@section('js')
    @vite('resources/js/app.js')

@stop
