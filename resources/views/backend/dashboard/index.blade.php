@extends('backend.layouts.master')
@section('page-header')
    <i class="fa fa-send"></i> Dashboard
@endsection
@section('title', 'Dashboard')

@section('content')
    {{--  Heading  --}}
    <div class="page-header">
        <h1>
            @yield('page-header')
        </h1>
    </div>

    {{--  Content  --}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                DASHBOARD
            </div>
        </div>
    </div>
@endsection
