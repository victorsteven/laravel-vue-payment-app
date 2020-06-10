@extends("layouts.main")

@section("content")
    @include("partials.breadcrumb", ['pageName' => "Login"])
    @include("components.login-form")
@endsection
