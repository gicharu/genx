@extends('adminlte::page')

@section('title', 'Books')
@section('plugins.Datatables', true)

@section('content_header')
    <h1>Books</h1>
@stop

@section('content')
    {{ $dataTable->table() }}

@stop

@section('css')

@stop

@section('js')
    @vite('resources/js/app.js')

    {{ $dataTable->scripts() }}

@stop
