<section class="hami-blog-details-area section-padding-80-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="post-content">
                    <h2 class="post-title">Login to Payuu</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center" style="margin-top: -60px;">
            <div class="col-12 col-lg-6">
                <div class="hami-contact-form mt-80 mb-30">
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-lg-12">
                                <input type="email" name="email" class="form-control mb-30 {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Your Email" required autofocus value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span style="margin-top: -1.5rem; margin-bottom: 1rem;" class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-12 col-lg-12">
                                <input type="password" name="password" class="form-control mb-30 {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span style="margin-top: -1.5rem; margin-bottom: 1rem;" class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn hami-btn btn-3 mt-15">Login</button>
                            </div><br/>

                            <div class="col-12 text-center">
                                <p>Don't have an account? Start Registration <a href="{{ route('register') }}">Here</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
