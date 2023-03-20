<div class="card m-2" style="width: 20rem;">
    <div class="card-body d-flex flex-column justify-content-between">
        <div class=" d-flex justify-content-between">
            <h5 class="card-title">{{ $product->name }}</h5>
            <h6 class="lead mt-2 text-decoration-underline" style="font-size: 14px; margin: 0">
                <a style="color: grey;" href="{{ route('home.profile', $product->user) }}"> {{ $product->user->name }}
                </a>
            </h6>
        </div>
        <h4 class="card-subtitle">{{ $product->price }} ₽</h4>
        <p class="card-text">{{ $product->description }}</p>
        <a href="#" class="btn btn-success btn-block">Buy</a>
        <a href="#" class="btn btn-info btn-block">Learn more...</a>
        <h6 class="lead mt-2" style="font-size: 14px">
            <mark>{{ $product->created_at->format('d.m.Y H:i') }}</mark>
        </h6>

    </div>
</div>
