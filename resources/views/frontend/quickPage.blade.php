@extends('frontend.layouts.app')

@section('content')
@php

$pageLink='quick-page';
$pageName= $page->slug
@endphp
<main>
    @include('frontend.layouts.breadcum', [$pageLink, $pageName])
    <section class="about-desc">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    {!!  $page->short_desc??' ' !!}
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
