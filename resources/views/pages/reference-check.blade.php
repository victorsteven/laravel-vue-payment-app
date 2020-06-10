@extends("layouts.dashboard-main")

@section("content")
    {{--@include("partials.welcome")--}}
    @include('partials.breadcrumb', ['pageName' => 'Reference Check'])
    {{--@include("partials.find-slug-dashboard")--}}
    {{--@include("partials.dashboard-stats")--}}
    {{--@include("partials.features")--}}
    @include("partials.findref")

@endsection
