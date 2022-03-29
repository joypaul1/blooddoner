@extends('frontend.layouts.app')

@section('content')
@php

$pageLink='donner-search';$pageName='Search Donors'
@endphp
<main>
    @include('frontend.layouts.breadcum', [$pageLink, $pageName])
    <section class="blood-search-container">
        <form>
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-2 mt-2">
                        <div class="form-group">
                            <label for="exampleFormControlInput1" class="form-label">Blood Group
                            </label>
                            <select class="form-select" name="blood_id" aria-label="Default select example" required>
                                <option value="{{ null }}">Select </option>
                                @forelse ($bloodGroups as $bloodGroup)
                                <option value="{{  $bloodGroup->id??' '}}" {{ request()->blood_id == $bloodGroup->id?'Selected': '' }}>{{ $bloodGroup->name??' ' }} </option>
                                @empty

                                @endforelse

                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 mt-2">
                        <div class="form-group">
                            <label for="exampleFormControlInput1" class="form-label">District
                            </label>
                            <select class="form-select" name="postcode_id" aria-label="Default select example">
                                @forelse ($postCodes as $postCode)
                                <option value="{{ $postCode->id }}" {{ request()->postcode_id == $postCode->id?'Selected': '' }}> {{$postCode->name?? ' '}}</option>
                                @empty

                                @endforelse

                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 mt-2">
                        <div class="form-group">
                            <label for="exampleFormControlInput1" class="form-label">Date of Blood Donation
                            </label>
                            <input type="date" name="donate_date" class="form-control date"
                                @if (request()->donate_date)
                                value={{ date("Y-m-d", strtotime(request()->donate_date)) }}
                                @endif
                            >
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 mt-2">
                        <div class="form-group">
                            <label for="exampleFormControlInput1" class="form-label">Donor Type
                            </label>
                            <select class="form-select" aria-label="Default select example" name="type">
                                <option value="All" {{ request()->type == 'All'?'Selected': ''  }}>All</option>
                                <option value="Eligible" {{ request()->type == 'Eligible'?'Selected': ''  }}>Eligible</option>
                            </select>
                        </div>

                    </div>
                    <div class="col-lg-1 col-md-1 mt-2">
                        <div class="">
                            <button type="submit" class="search_btn">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    @if( request()->blood_id)
        <section class="search_result">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="search_result_header">Total Donor found {{ count($users) }}.</h5>
                    </div>
                    @forelse ($users as $user)
                    <div class="col-lg-4">
                        <a href="{{ url('profile', $user->id) }}">
                            <div class="card shadow-lg mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4 col-4">
                                            <img src="{{ asset($user->image??'-') }}" class="img-fluid h-100 rounded-start" alt="donor">

                                    </div>
                                    <div class="col-md-8 col-8">
                                        <div class="card-body">
                                            <ul>
                                                <li> <span class="name">Name</span> {{ $user->name??' ' }}</li>
                                                <li> <span class="name">Group</span>  {{ optional($user->blood)->name??' ' }} </li>
                                                <li> <span class="name">Postal Code</span> {{ optional($user->postcode)->name??'-' }} </li>
                                                <li> <span class="name">Last Donation</span>{{ date("d-m-Y", strtotime($user->donatedate??'-')) }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>


                    @empty

                    @endforelse




                </div>
            </div>
        </section>
    @endif
</main>
@endsection
