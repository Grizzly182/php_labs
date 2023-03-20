@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="container-fluid">
            <div style="background-color: antiquewhite; border: 3px solid; border-radius:10px; border-color:tan"
                class="container-fluid align-items-center justify-content-between row mt-2 mb-7">
                <div>
                    <h1 class="text-info">{{ $user->name }}</h1>
                    <h6>
                        <h6 class="text-secondary">On the platform since: </h6>
                        <p class="lead">{{ $user->created_at->format('m/Y') }}</p>
                    </h6>
                </div>
                @if ($user->id === auth()->id())
                    <a href="#" class="btn btn-lg btn-secondary" role="button">Edit</a>
                @endif
            </div>
            <div class="col-lg-12 mt-2 mb-2">
                <h1>My accounts on sale:</h1>
            </div>
        </div>
        <div class="row" style="justify-content: space-evenly">
            @foreach ($products as $product)
                @include('partials.product-card')
            @endforeach
        </div>
    </div>
@endsection
