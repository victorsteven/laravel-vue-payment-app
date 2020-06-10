@extends('layouts.main')

@section('content')
    @include('partials.breadcrumb', ['pageName' => 'Product Details'])

    <product-details :product="{{ $product }}"></product-details>

@endsection
