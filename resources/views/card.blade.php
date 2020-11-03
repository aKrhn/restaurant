@extends('layouts.app')

@section('content')

<div class="container">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product</th>
      <th scope="col">Image</th>
      <th scope="col">Price</th>
      <th scope="col">Qty</th>
    </tr>
  </thead>
  <tbody>

@php $i = 1;
@endphp

    @foreach ($card -> items as $product)

    <tr>
      <th scope="row">{{ $i++ }}</th>
      <td><img src="{{ Storage::url($product['image']) }}" width="100"></td>
      <td>{{ $product['name'] }}</td>
      <td>{{ $product['price'] }}</td>
      <td>
        <input type="text" name="{{ $product['quantity'] }}">
        <button class="btn btn-secondary btn-sm">
          <i class="fas fa-sync">
          </i>
          Update
        </button>
      </td>
      <td><button class="btn btn-danger">Remove</button></td>
    </tr>
    @endforeach

  </tbody>
</table>
<hr>
<div class="card-footer">
    <button class="btn btn-warning">Continue Shopping</button>
    <span style="margin-left:300px;">Total Price:{{ $card -> totalPrice}} TL</span>
    <button class="btn btn-info float-right">Checkout</button>
</div>
</div>
@endsection
