@extends("layouts.main")

@section("content")
    @include("partials.breadcrumb", ['pageName' => "Not Found"])

    <section class="hami-error-area text-center section-padding-100-0 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <img src="/skulpay/img/bg-img/404.png" alt="">
                    <h2>Opps! This page Could Not Be Found!</h2>
                    <p>Sorry but the page you are looking for does not exist, have been removed or the name changed.</p>
                    <a href="/" class="btn hami-btn mt-30">Go To Homepage</a>
                </div>
            </div>
        </div>
    </section>
@endsection
