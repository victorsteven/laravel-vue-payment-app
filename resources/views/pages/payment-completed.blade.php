@extends('layouts.main')

@section('content')
    @include('partials.breadcrumb', ['pageName' => 'Transaction'])

    <payment-completed :product="{{ $product }}"></payment-completed>
    
@endsection
