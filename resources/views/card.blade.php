@extends('layouts.app')

@section('content')

 <div class="container">
    @if($errors->any())

   @foreach($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>
   @endforeach

   @endif
   <table class="table">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Product</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Remove</th>
    </tr>
  </thead>
  <tbody>

    @if($card)
  @php $i=1 @endphp

@foreach($card -> items as $product)
    <tr>
      <th scope="row">{{$i++}}</th>

      <td><img src="{{ Storage::url($product['image']) }}" width="100"></td>
      <td>{{ $product['name'] }}</td>
      <td>{{ $product['price'] }} TL</td>
      <td>
    <form action="{{route('card.update', $product['id'])}}" method="POST">
        @csrf
        <input type="text" name="quantity" value="{{ $product['quantity'] }}">
        <button class="btn btn-secondary btn-sm">
          <i class="fas fa-sync">
          </i>
          Update
        </button>
      </form>
    </td>
      <td>
        <form action="{{route('card.destroy', $product['id'])}}" method="POST">
            @csrf
            <button class="btn btn-danger">Remove</button>
        </form>
      </td>
    </tr>
   @endforeach
  </tbody>
</table>
<hr>
<div class="card-footer">
  <a href="{{url('/')}}"><button class="btn btn-primary">Continue shopping</button></a>
  <span style="margin-left: 300px;">Total Price:{{ $card -> getTotalPrice() }} TL</span>
  <a href="{{ route('card.checkout', $card -> getTotalPrice()) }}">
      <button class="btn btn-info float-right">
        Checkout
      </button>
  </a>
</div>
@else
<td>No items in card</td>
@endif

 </div>
 @endsection
