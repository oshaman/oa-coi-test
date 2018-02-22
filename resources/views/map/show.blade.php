@extends('layouts.app')

@section('nav')
    @include('statistic.nav')
@endsection

@section('content')
    <h1>Map</h1>
    {!! Form::open(['url'=>route('maps'), 'method'=>'post', 'class'=>'form-horizontal', 'files'=>true]) !!}
    {!! Form::label('File') !!}
    {!! Form::file('file') !!}
    {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection

