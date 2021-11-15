<!doctype html>
<html lang='en'>
@extends('templates/master')

@section('title')
404 Page Not Found
@endsection

@section('content')
<a href='{{ $app->config('app.url') }}'><h2>404 Page Not Found</h2>
</a>

@endsection

