<div class="modal fade" id="cardModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
          @if(session('card'))
              <div class="alert alert-danger">
                  {{ session('card')->message }}
              </div>
              @section('after_scripts')
                  <script type="text/javascript">
                    $(function() {
                        $('#cardModal').modal();
                    });
                  </script>
              @endsection
          @endif
                            <!--<div class="row">
                                <h3 class="text-center">Payment Details</h3>
                                <img class="img-responsive cc-img" src="http://www.prepbootstrap.com/Content/images/shared/misc/creditcardicons.png">
                            </div>-->
        <form role="form" method="post" action="/processpayment">
          <div class="form-group">
              <label>CARD NUMBER</label>
              <div class="input-group">
                  <input autocomplete="off" name="card_number" value="{{ session('card') ? session('card')->card_number : ''}}" type="tel" class="form-control" placeholder="Valid Card Number" required/>
                  <span class="input-group-addon"><span class="fa fa-credit-card"></span></span>
              </div>
          </div>
          <div class="row">
              <div class="col-xs-7 col-md-7">
                  <div class="form-group">
                      <label><span class="visible-xs-inline">EXP</span> DATE</label>
                      <div class="row">
                          <div class="col-md-6">
                              <input autocomplete="off" name="month" value="{{ session('card') ? session('card')->month : ''}}" type="tel" class="form-control" placeholder="Month" required/>
                          </div>

                          <div class="col-md-6">
                              <input autocomplete="off" name="year" value="{{ session('card') ? session('card')->year : ''}}" type="tel" class="form-control" placeholder="Year" required/>
                          </div>
                      </div>

                  </div>
              </div>
              <div class="col-xs-5 col-md-5 pull-right">
                  <div class="form-group">
                      <label>CV CODE</label>
                      <input autocomplete="off" value="{{ session('card') ? session('card')->cvv : ''}}" name="cvv" type="tel" class="form-control" placeholder="CVC" required/>
                  </div>
              </div>
          </div>
          <div class="form-group">
              <label>CARD OWNER</label>
              <input autocomplete="off" value="{{ session('card') ? session('card')->card_name : ''}}" name="card_name" type="text" class="form-control" placeholder="Card Owner Names" required/>
          </div>

          <div class="form-group">
              <label>PIN</label>
              <input autocomplete="off" value="{{ session('card') ? session('card')->pin : ''}}" name="pin" type="number" class="form-control" placeholder="Card Owner Names" required/>
          </div>
          <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
          {{ csrf_field() }}


          <div class="form-group">
                  <button class="btn  btn-flat btn-warning btn-lg btn-block">Process payment</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
