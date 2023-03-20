@extends('layouts.layout')

@section('content')
    @auth
        <div class="row">
            <div class="col-lg-12 mt-2 mb-2">
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('products.create') }}">Create New Product</a>
                </div>
            </div>
        </div>
    @endauth
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-2 mb-2">
                <h1>Latest added accounts</h1>
            </div>
        </div>
        <div class="row" style="justify-content: space-evenly">
            @foreach ($products as $product)
                @include('partials.view-product-card')
            @endforeach
        </div>
    </div>
@endsection
