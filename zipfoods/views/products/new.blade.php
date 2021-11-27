@extends('templates/master')

@section('title')
    Add A New Product
@endsection
@section('head')
    <link href='../css/new.css' rel='stylesheet'>
@endsection

@section('content')
    {{-- add the variable for reviewSaved from the ProductsController with an alert message and class from Bootstrap css --}}
    {{-- @if ($newProduct)
        <div class='alert alert-success'>Thank you, your new product was submitted!</div>
    @endif

    @if ($app->errorsExist())
        <div class='alert alert-danger'>Please correct the errors below</div>
    @endif --}}

    <form method='POST' id='new-product' action='/products/new'>
        <h3>Add A New Product</h3>
        <p>Enter all the details to create a new product, then submit when complete</p>
        <div class='form-group new'>
            <label class='new' for='name'>New Product Name</label>
            <input type='text' class='form-control' name='name' id='name' placeholder='*required'>{{ $app->old('name') }}
            <label class='new' for='sku'>Sku</label>
            <input type='text' class='form-control' name='sku' id='sku'
                placeholder='*required, format lowercase with hyphens'>{{ $app->old('sku') }}
            <label class='new' for='description'>Description</label>
            <input type='textarea' class='form-control' name='description' id='description'>{{ $app->old('description') }}
            <label class='new' for='price'>Price</label>
            <input type='text' class='form-control' name='price' id='price' placeholder='$'>{{ $app->old('price') }}
            <label class='new' for='price'>Availability</label>
            <input type='text' class='form-control' name='availability' id='availability'>{{ $app->old('availability') }}
            <label class='new' for='price'>Weight</label>
            <input type='text' class='form-control' name='weight' id='weight'>{{ $app->old('weight') }}
            <label class='new' for='price'>Perishible</label>
            <input type='text' class='form-control' name='perishable' id='perishable'>{{ $app->old('perishable') }}
        </div>
        <button type='submit' class='btn btn-primary'>Submit New Product</button>
    </form>

    @if ($app->errorsExist())
        <ul class='error alert alert-danger'>
            @foreach ($app->errors() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <a href='/products'>Go to all products &rarr;</a>
@endsection
