<!doctype html>
<html lang='en'>
@extends('templates/master')

@section('title')
404 Page Not Found
@endsection

@section('content')
    <div>
    <h2 class="center">404 Page Not Found</h2>
        <p class="center">
        <a href='{{ $app->config('app.url') }}'>&larr; Home</a>
        </p>
    </div>
    <ul>
    <li>

@endsection