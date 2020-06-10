@extends("layouts.main")

@section("content")
    @include("partials.breadcrumb", ['pageName' => "Registration"])
    @include("components.registration-form")
@endsection
