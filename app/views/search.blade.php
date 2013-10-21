@extends("layout")
@section('header')
@overwrite
@section("content")
{{ Form::open(array('url' => 'submitSearch')) }}


    <!-- username field -->
    <p>{{ Form::text('bootDetails') }}</p>

    <!-- submit button -->
    <p>{{ Form::submit('Search') }}</p>

{{ Form::close() }}