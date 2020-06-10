@extends("layouts.dashboard-main")

@section("content")
    <admin-dashboard :stat="{{ json_encode($stat) }}" :products="{{ json_encode($products)}}"></admin-dashboard>
@endsection
