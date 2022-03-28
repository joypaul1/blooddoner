@extends('frontend.layouts.app')

@section('content')
@php

$pageLink='about-us';$pageName='About us'
@endphp
<main>
    @include('frontend.layouts.breadcum', [$pageLink, $pageName])
    <section class="about-desc">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    {!!  $aboutus->description??' ' !!}
                </div>
            </div>
        </div>
    </section>

</main>
@endsection
