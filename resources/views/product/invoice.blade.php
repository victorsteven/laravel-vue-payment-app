    @extends('layouts.main')
    @section('content')
        @include("partials.breadcrumb", ['pageName' => "Transaction"])
      <div style="margin-top: 3em" class="invoice-box">
          <table cellpadding="0" cellspacing="0">
              <tr class="top">
                  <td colspan="2">
                      <table>
                          <tr>
                              <td class="title">
                                  <span>Payuu<br/>
                              </td>

                              <td>
                                  Reference #: {{ $transaction->refrence_code }}<br>
                                  Created: {{ $transaction->created_at }}<br>
                                  Status: {!! $transaction->status == 'success' ? '<b style="color:green">Paid</b>' : '<b style="color:red">'.ucfirst($transaction->status).'</b>' !!}<br>

                              </td>
                          </tr>
                      </table>
                  </td>
              </tr>

              <tr class="information">
                  <td colspan="2">
                      <table>
                          <tr>
                              <td>
                              </td>
                              <td>
                                  {{ $transaction->data->name }}.<br>
                                  {{ $transaction->data->email }}
                              </td>
                          </tr>
                      </table>
                  </td>
              </tr>

              <tr class="heading">
                  <td>
                      Payment Method
                  </td>

                  <td>

                  </td>
              </tr>

              <tr class="details">
                  <td>
                      Card
                  </td>

                  <td>

                  </td>
              </tr>

              <tr class="heading">
                  <td>
                      Item
                  </td>

                  <td>
                      Price
                  </td>
              </tr>

              <tr class="item">
                  <td>
                    {{ $transaction->product->title }}
                  </td>

                  <td>
                      &#8358; {{ number_format($transaction->product->price, 2) }}
                  </td>
              </tr>
              <tr class="total">
                  <td></td>

                  <td>
                     Total {{ $transaction->status == 'success' ? 'Payed' : '' }}: &#8358; {{ $total = number_format($transaction->product->price, 2) }}
                  </td>
              </tr>

              <tr class="totdl">
                  <td></td>

                  <td>
                      @if($transaction->status !== 'success')
                          <div class="justify-content-lg-between">
                              <form class="" action="{{ route('pay') }}" method="post">
                                  {{ csrf_field() }}
                                  <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
                                  <button  class="btn hami-btn btn-3 mt-15btn-success" type="submit" name="pay_now">Pay &#8358;{{ $total }} now. </button>
                              </form>
                              <button class="btn hami-btn btn-3 mt-15" onclick="window.print()">Print Invoice</button>
                          </div>
                          @else
                          <button class="btn hami-btn btn-3 mt-15" onclick="window.print()">Print Receipt</button>
                      @endif
                  </td>
              </tr>
          </table>
      </div>

    @endsection

    @section('title')
        View Transaction | Payuu
    @endsection

    @push('after_styles')
      <link rel="stylesheet" href="/css/invoice.css">
    @endpush
