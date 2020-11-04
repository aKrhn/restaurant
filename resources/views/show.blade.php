@extends('layouts.app')

@section('content')


<div class="container">
  <div class="card">
    <div class="row">
      <aside class="col-sm-5 border-right">
        <section class="gallery-wrap">
        <div class="img-big-wrap">
          <div>
            <a href="#">
              <img src="{{ Storage::url($product -> image) }}" width="400" height="500">
            </a>
          </div>
        </div>
        </section>
      </aside>
      <aside class="col-sm-7">
        <section class="card-body p-5">
          <h3 class="title mb-3">
            {{ $product -> name }}
          </h3>
          <p class="price-detail-wrap">
            <span class="price h3 text-danger">
              <span class="currency">
                {{ $product -> price }}TL
              </span>
            </span>
          </p>
        <h3>
        </h3>
        <p>
          {{ $product -> description }}
        </p>
        <h3>
          Additional information
        </h3>
        <p>
          {{ $product -> additional_info }}
        </p>
      <hr>
      <a href="{{ route('add.card', [$product -> id]) }}" class="btn btn-lg btn-outline-primary text-uppercase">
        Add to cart
      </a>
    </section>
  </aside>

  </div>

</div>
<hr><hr><hr>
@if(count($productFromSameCategories) <= 1)
  <h3>You also may like this</h3>
  <div class="jumbotron">
  <div class="row">
        @foreach ($productFromSameCategories as $product)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img src="{{ Storage::url($product -> image) }}" height="400">
            <div class="card-body">
              <p>{{ $product -> name }}</p>
              <p class="card-text">{{ $product -> description }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="{{ route('product.view', [$product -> id]) }}">
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                      View
                    </button>
                  </a>
                  <button type="button" class="btn btn-sm btn-outline-primary">
                    Add to Cart
                  </button>
                </div>
               <small class="text-muted">{{ $product -> price }} TL</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
@endif
</div>

</div>

@endsection
