@extends("layouts.main")

@section("content")

    <section class="hami-price-plan-area section-padding-100-0">
      <div class="container">
        <div class="row justify-content-center">
            @if($products->count() > 0)
                {{-- @forelse($products as $key => $product)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="single-price-plan mb-100">
                            <div class="price-plan-title">
                                <h4>{{ $product->title }}</h4>
                            </div>

                            <div class="price-plan-value">
                                <h2><span>&#8358;</span>{{ number_format($product->price, 2) }}</h2>
                                <p>Identifier: {{ $product->slug }}</p>
                            </div>

                            <a href="{{ route('start.payment', $product->slug) }}" target="_blank" class="btn hami-btn w-100 mb-30">View</a>
                            <a href="{{ route('edit.item', $product->id) }}" target="_blank" class="btn hami-btn w-100 mb-30">Edit</a>

                            <div class="price-plan-desc text-center">
                                <p><span>{{ str_limit($product->description, 100) }}</span></p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 col-md-6 col-lg-4">
                        <h2>You've not added an product!</h2>
                        <a href="/" target="_blank" class="btn hami-btn w-100 mb-30"> <span class="fa fa-plus"></span> Add product</a>
                    </div>
                @endforelse --}}

            <products :products="{{ json_encode($products) }}"></products>

            {{-- @else
                <div class="col-12 col-md-6 col-lg-4">
                    <h2>You've not added an product!</h2>
                    <a href="/" target="_blank" class="btn hami-btn w-100 mb-30"> <span class="fa fa-plus"></span> Add product</a>
                </div> --}}
            @endif
        </div>
      </div>
  </section>
  
@endsection
