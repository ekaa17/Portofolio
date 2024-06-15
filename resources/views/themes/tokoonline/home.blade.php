@extends('themes.tokoonline.layouts.app')
@include('themes.tokoonline.shared.slider')
@section('content')
 <!-- Popular -->
 <section class="popular">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-6">
          <h1>Popular</h1>
        </div>
        <div class="col-6 text-end">
          <a href="#" class="btn-first">View All</a>
        </div>
      </div>
      <div class="row mt-5">
        @foreach ($products as $item)
        <div class="col-lg-3 col-6">
          <div class="card card-product card-body p-lg-4 p3">
            <a href="product.html"><img src="{{$item->gambar_product}}" alt="" class="img-fluid"></a>
            <h3 class="product-name mt-3">{{$item->nama_product}}</h3>
            <div class="rating">
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
            </div>
            <div class="detail d-flex justify-content-between align-items-center mt-4">
              <p class="price">{{$item->harga_product}}</p>
              <a href="product.html" class="btn-cart"><i class="bx bx-cart-alt"></i></a>
            </div>
          </div>
        </div>
        @endforeach        
      </div>
  </section>

@endsection
