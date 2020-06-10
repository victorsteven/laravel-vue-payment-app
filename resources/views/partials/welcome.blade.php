<section class="welcome-area">
    <div class="welcome-pattern">
        <img src="/skulpay/img/core-img/welcome-pattern.png" alt="">
    </div>

    <div class="welcome-slides owl-carousel">
        <div class="single-welcome-slide">
            <div class="welcome-content h-100">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12 col-md-9 col-lg-7">
                            <div class="welcome-text mb-50">
                                <h2 data-animation="fadeInLeftBig" data-delay="200ms" data-duration="1s">All in-one-Payment</h2>
                                <p data-animation="fadeInLeftBig" data-delay="600ms" data-duration="1s">Enter Transaction Reference to see your invoice.</p>
                                <a href="{{ route('register') }}" class="btn hami-btn btn-2" data-animation="fadeInLeftBig" data-delay="800ms" data-duration="1s">Get Started Now!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="welcome-thumbnail">
                <img src="/skulpay/img/bg-img/1.png" alt="">
            </div>
        </div>

        <div class="row justify-content-center">
          @if($products->count() > 0)
              @forelse($products as $key => $product)
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
                      <h2>You've not added an Item!</h2>
                      <a href="/" target="_blank" class="btn hami-btn w-100 mb-30"> <span class="fa fa-plus"></span> Add Item</a>
                  </div>
              @endforelse
          @endif
      </div>

        {{-- <div class="single-welcome-slide">
            <div class="welcome-content h-100">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12 col-md-9 col-lg-7">
                            <div class="welcome-text mb-50">
                                <h2 data-animation="fadeInUpBig" data-delay="200ms" data-duration="1s">Easy Platform for Merchants and Vendors</h2>
                                <p data-animation="fadeInUpBig" data-delay="600ms" data-duration="1s">Track Your Payments easily</p>
                                <a href="{{ route('register') }}" class="btn hami-btn btn-2" data-animation="fadeInUpBig" data-delay="800ms" data-duration="1s">Get Started Now!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</section>
