@extends('templates/master')

@section('title')
    x/y/z
@endsection

@section('content')
    <h2>views/x/y/z</h2>

    <p>
        x/y/z.blade.php
    </p>
@endsection

{{-- must add this to routes.php to work '/x/y/z' => ['AppController', 'z'] --}}
