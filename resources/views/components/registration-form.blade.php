<section class="hami-blog-details-area section-padding-80-0" id="register">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="post-content">
                    <h3 class="post-title">Register</h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center" style="margin-top: -60px;">
            <div class="col-12 col-lg-6">
                <div class="hami-contact-form mt-80 mb-30">
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="row">
                          <div class="col-12 col-lg-12">
                              <input type="text" name="name" class="form-control mb-30 {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Enter Name" required value="{{ old('name') }}">

                              @if ($errors->has('name'))
                                  <span style="margin-top: -1.5rem; margin-bottom: 1rem;" class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                              @endif
                          </div>
                            <div class="col-12 col-lg-12">
                                <input type="email" name="email" class="form-control mb-30 {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Your Email" required value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span style="margin-top: -1.5rem; margin-bottom: 1rem;" class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-12 col-lg-12">
                                <input type="text" name="phone" class="form-control mb-30 {{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="Valid Phone Number" required value="{{ old('phone') }}">

                                @if ($errors->has('phone'))
                                    <span style="margin-top: -1.5rem; margin-bottom: 1rem;" class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
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

                            <div class="col-12 col-lg-12">
                                <input type="password" name="password_confirmation" class="form-control mb-30" placeholder="Password Again" required>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn hami-btn btn-3 mt-15">Create Account</button>
                            </div>

                            <div class="col-12 text-center">
                                <p>Already have an account? Login <a href="{{ route('login') }}">Here</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
