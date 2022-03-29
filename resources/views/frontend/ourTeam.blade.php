@extends('frontend.layouts.app')

@section('content')
@php

$pageLink='our-team';$pageName='Our-Team'
@endphp
<main>
    @include('frontend.layouts.breadcum', [$pageLink, $pageName])


    <section id="team" class="team_member section-padding">
        <div class="container">
            <div class="section-title text-center">
                <h1>Meet our experts</h1>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when
                    looking at its layout.</p>
            </div>
            <div class="row text-center">
                @forelse ($teams as $admin)
                    <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"
                        data-wow-offset="0">
                        <div class="our-team">
                            <div class="team_img">
                                <img src="{{ asset($admin->image) }}" alt="team-image" style="height: 200px;width:100%">
                            </div>
                            <div class="team-content">
                                <h3 class="title">{{ $admin->name??' ' }}</h3>
                                <span class="post">{{ $admin->designation??' ' }}</span>
                            </div>
                        </div>
                    </div>
                @empty

                @endforelse


                <!--- END COL -->
            </div>
            <!--- END ROW -->
        </div>
        <!--- END CONTAINER -->
    </section>
</main>
@endsection
@push('css')
    <style>

.team_member {
    background: rgba(199,201,209,.09);
	padding-bottom: 50px;
	overflow: hidden;
}
.single_team_content{
padding:45px;
margin-top:60px;
}
.single_team_content h1 {
	font-size: 50px;
	font-weight: 600;
	line-height: 60px;
}
.single_team_content p{}
.our-team {
	margin-bottom: 30px;
	box-shadow: 0 10px 40px -10px rgba(0,64,128,.09);
}
.our-team .team_img{
    position: relative;
    overflow: hidden;
}
.our-team .team_img:after{
    content: "";
    width: 100%;
    height: 100%;
    background-color: rgba(255,255,255,0.2);
    position: absolute;
    bottom: -100%;
    left: 0;
    transition: all 0.3s ease 0s;
}
.our-team:hover .team_img:after{
    bottom: 0;
}
.our-team img{
    width: 100%;
    height: auto;
}
.our-team .social{
    padding: 0 0 18px 0;
    margin: 0;
    list-style: none;
    position: absolute;
    top: -100%;
    right: 10px;
    background: #ffaa17;
    border-radius: 0 0 20px 20px;
    z-index: 1;
    transition: all 0.3s ease 0s;
}
.our-team:hover .social{
    top: 0;
}
.our-team .social li a{
    display: block;
    padding: 15px;
    font-size: 15px;
    color: #232434;
}
.our-team:hover .social li a:hover{
    color: #fff;
}
.our-team .team-content{
    padding: 20px 0;
    background: #fff;
}
.our-team .title{
    font-size: 18px;
    font-weight: bold;
    color: #ffaa17;
    text-transform: capitalize;
    margin: 0 0 20px;
    position: relative;
}
.our-team .title:before{
    content: "";
    width: 25px;
    height: 1px;
    background: #ffaa17;
    position: absolute;
    bottom: -10px;
    right: 50%;
    margin-right: 9px;
    transition-duration: 0.25s;
}
.our-team .title:after{
    content: "";
    width: 25px;
    height: 1px;
    background: #ffaa17;
    position: absolute;
    bottom: -10px;
    left: 50%;
    margin-left: 9px;
    transition-duration: 0.25s;
}
.our-team:hover .title:before,
.our-team:hover .title:after{
    width: 50px;
}
.our-team .post{
    display: inline-block;
    font-size: 15px;
    text-transform: capitalize;
}
.our-team .post:before{
    content: "";
    display: block;
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: #ffaa17;
    margin: 0 auto;
    position: relative;
    top: -13px;
}
@media only screen and (max-width: 990px){
    .our-team{ margin-bottom: 30px; }
}
    </style>
@endpush
