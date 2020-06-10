    @extends('layouts.app-basic')
    @section('content')
        @if($transaction->status == 'pending')
            @section('title')
              Pending Payment | BurseWave
            @endsection
            <div class="alert alert-danger">
              Infomation: <b>{{ $transaction->message }}</b>
            </div>
            <div class="row">
              <div style="margin:auto;" class="col-md-6">
                <form role="form" method="post" action="{{ route('validatepayment') }}">
                  <div class="form-group">
                      <label>One Time OTP</label>
                      <div class="input-group">
                          <input name="otp" type="number" class="form-control" placeholder="Input the OTP sent to you" />
                          <span class="input-group-addon"><span class="fa fa-credit-card"></span></span>
                      </div>
                  </div>
                  <input type="hidden" name="flw_reference" value="{{ $transaction->flw_reference }}">
                  <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">

                  {{ csrf_field() }}

                  <div class="form-group">
                      <button class="btn  btn-flat btn-warning btn-lg btn-block">Complete payment</button>
                  </div>
                </form>
              </div>
            </div>
        @endif
        @if($transaction->status == 'success')
            @section('title')
              Successful Payment | BurseWave.co
            @endsection
            <div class="alert alert-success">
                <b>Payment Completed successfully!</b><br>
                <p>Click <a href="/transaction/{{ $transaction->id }}">here</a> to view and print Reciept.</p>
            </div>
        @endif
    @endsection
