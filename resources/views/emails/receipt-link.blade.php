@component('mail::layout')
{{-- Header --}}
@slot('header')
    @component('mail::header', ['url' => config('app.url')])
        Payuu
    @endcomponent
@endslot
Hi,
{{ $transaction->data->name }}, Your Receipt Link is <a href="{{ route('processpayment', $transaction->id) }}">Here</a>

You can access the receipt anytime you like, make sure you mark this email as important so you can access the link to the receipt anytime.

You can also click the button below to access your receipt.

Regards,<br>
Payuu Team!

@component('mail::button', ['url' => route('processpayment', $transaction->id)])
    View Your Receipt
@endcomponent

{{-- Footer --}}
@slot('footer')
    @component('mail::footer')
        <!-- footer here -->
    @endcomponent
@endslot
@endcomponent
