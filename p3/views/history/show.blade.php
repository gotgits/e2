@extends('templates/master')

@section('title')
    {{ $product['name'] }}
@endsection

@section('content')

    @if ($app->errorsExist())
        <div class='alert alert-danger'>Please correct the errors below</div>
    @endif

    <div id='round-show'>
        <dl>
            <dt>{{ $round['name'] }}</dt>

            <dd class='round-details'>
                {{ $round['details'] }}
            </dd>
        </dl>
    </div>

    <form method='POST' id='product-review' action='/products/save-review'>
        <h3>Player{{ $round['name'] }}</h3>
        <input type='hidden' name='competitor' value='{{ $round['competitor'] }}'>
        <div class='form-group'>
            <label for='name'>Player Name</label>
            <input type='text' class='form-control' name='name' id='name' value='{{ $app->old('name') }}'>
        </div>

        <div class='form-group'>
            <label for='turn'>Turn</label>
            <textarea name='review' id='review' class='form-control'>{{ $app->old('review') }}</textarea>
            (Min: 200 characters / Max: 300 characters)
        </div>

        <button type='submit' class='btn btn-primary'>Submit Review</button>
    </form>

    @if ($app->errorsExist())
        <ul class='error alert alert-danger'>
            @foreach ($app->errors() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <a href='/history'>&larr; Return to game history</a>
@endsection
