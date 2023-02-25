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
                <div class="card m-2" style="width: 20rem;">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class=" d-flex justify-content-between">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <h6 class="lead mt-2" style="font-size: 14px">
                                <h6>{{ $product->created_by }}</h6>
                            </h6>
                        </div>
                        <h4 class="card-subtitle">{{ $product->price }}₽</h4>
                        <p class="card-text">{{ $product->description }}</p>
                        <a href="#" class="btn btn-success btn-block">Buy</a>
                        <a href="#" class="btn btn-info btn-block">Learn more...</a>
                        <h6 class="lead mt-2" style="font-size: 14px">
                            <mark>{{ $product->created_at->format('d.m.Y H:i') }}</mark>
                        </h6>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
