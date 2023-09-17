@php
use App\Models\User;
use App\Models\Product;
@endphp
<x-layout>
    <x-slot:more_css_links></x-slot>

    <h1 class="text-center">Product</h1>

    <hr>

    <div class="imagse">
        <img src={{asset("img/". ($product->images[0]->link ?? "products/none.jpg"))}}>
    </div>

    <hr>

    <h2>{{$product->name}}</h2>

    <p>{{$product->description}}</p>

    <div>
        <span>Trager: </span><span>{{$product->user->name}}</span>
    </div>

    <div>
        <span>Count In Store: </span>
        <span>{{$product->count}}</span>
    </div>

    <hr>

    <div>
        <form action={{route("add_in_cart", ['id'=>$product->id])}} method="post">
            @csrf
            <div>
                <label for="count">Count</label>
                <input type="number" name="count" id="count">
                @error('count')
                    <div class="text-sm text-bold text-danger">{{$message}}</div>
                @enderror
            </div>
            <div>
                <span><i class="fa fa-dollar"></i></span>
                <span>{{$product->price}}</span>
                <span> Once</span>
            </div>
            <button type="submit" class="btn btn-success">
                <i class="fa fa-cart-shopping"></i> 
                <span>Add To Cart</span>
            </button>
        </form>
    </div>

    <hr>
    
    Similar Products
</x-layout>