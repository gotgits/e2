@extends('templates/master')

@section('title')
    Add A New Product
@endsection
@section('head')
    <link href='../css/new.css' rel='stylesheet'>
@endsection

@section('content')

    @if ($newSaved)
        <div class='alert alert-success'>Thank you, new product added!</div>
    @endif

    @if ($app->errorsExist())
        <div class='alert alert-danger'>Please correct the errors below</div>
    @endif

    <form method='POST' id='save-new' action='/products/save-new'>
        <h2>Add A New Product</h2>
        <p>Enter all the details to create a new product, then submit when complete</p>
        <div class='form-group new'>
            <label for='name'>New Product Name</label>
            <input type='text' class='form-control' name='name' id='name' placeholder='*required'
                value='{{ $app->old('name') }}''>
                                            </div>
                                            <div class=' form-group new'>
            <label for='sku'>Sku</label>
            <input type='text' class='form-control' name='sku' id='sku'
                placeholder='*required – format lowercase with hyphens' value='{{ $app->old('sku') }}'>
        </div>
        <div class=' form-group new'>
            <label class='new' for='description'>Description</label>
            <textarea class='form-control' rows="2" cols="40" name='description' id='description'
                placeholder='*required – maximum 600 characters'>{{ $app->old('description') }}</textarea>
        </div>
        <div class=' form-group new'>
            <label class='new' for='price'>Price</label>
            <input type='text' class='form-control' name='price' id='price' placeholder=' $ *required – numeric input'
                value='{{ $app->old('price') }}'>
        </div>
        <div class='form-group new'>
            <label class='new' for='available'>Availability</label>
            <input type='text' class='form-control' name='available' id='available'
                placeholder='*required – digits only input' value='{{ $app->old('availability') }}'>
        </div>
        <div class='form-group new'>
            <label class='new' for='weight'>Weight</label>
            <input type='text' class='form-control' name='weight' id='weight' placeholder='*required – numeric input'
                value='{{ $app->old('weight') }}'>
        </div>
        <div class='form-group new'>
            <label class='new' for='price'>Perishible </label>
            <input type='radio' name='perishable' value='1'>{{ $app->old('perishable') }} Yes
            <input type='radio' name='perishable' value='0'>{{ $app->old('perishable') }} No
        </div>
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
