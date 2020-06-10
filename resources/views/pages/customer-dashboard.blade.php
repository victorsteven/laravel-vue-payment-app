@extends("layouts.dashboard-main")

@section("content")
    {{--@include("partials.welcome")--}}
    @include('partials.breadcrumb', ['pageName' => 'Dashboard'])
    {{--@include("partials.find-slug-dashboard")--}}
    {{--@include("partials.dashboard-stats")--}}
    {{--@include("partials.features")--}}


    <section class="hami-price-plan-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Transaction Details</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    @if (count($transactions) > 0)
                      <customer-dashboard :transactions="{{ $transactions }}"></customer-dashboard>
                    @else
                        <div class="row">
                            <h2>No Transaction yet!</h2>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
