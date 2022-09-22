

@extends('adminlte::page')

@section('title', 'Authors')
@section('plugins.Select2', true)

@section('content_header')
    <h1>{{ $operation }} Book</h1>
@stop

@section('content')
    {{ Form::model($book, ['action' => '\App\Http\Controllers\BooksController@store']) }}

    <div class="row">
        <x-adminlte-input name="title" label="Title"
                          fgroup-class="col-md-6" value="{{$book->title}}"/>
    </div>
    <div class="row">
        {{-- With multiple slots, and plugin config parameter --}}
        @php
            $config = [
                "placeholder" => "Select one or more authors...",
                "allowClear" => true,
            ];
        @endphp
        <x-adminlte-select2 name="authors" igroup-size="lg" label="Author(s)" multiple>
            @foreach($authorsList as $author)
            <option>{{$author->first_name . ' ' . $author->surname}}</option>
            @endforeach
        </x-adminlte-select2>
    </div>
        {{ Form::hidden('id') }}
    <x-adminlte-button class="btn-flat" type="submit" label="Save" theme="success" icon="fas fa-lg fa-save"/>

    {{ Form::close() }}

@stop


@section('js')
    @vite('resources/js/app.js')

@stop
