@extends('frontend.layouts.app')

@section('content')
@php
$pageLink='profile';$pageName='Profile'
@endphp
<main>
    @include('frontend.layouts.breadcum', [$pageLink, $pageName])
    <section class="donor-profile-container">
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <div class="row">
                <div class="col-lg-6">
                  <div class="donor-pic">
                    <img src="{{ asset($user->image??'assets/images/avatars/user.jpg') }}" class="donor_img img-fluid" alt="donor">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="donor-info">
                    <ul>
                      <li><span>Name : {{ $user->name??' ' }}</span></li>
                      <li><span>BLood Group :  {{ optional($user->blood)->name??' ' }}</span></li>

                      <li><span>Division :  {{  optional($user->division)->name??' ' }}</span></li>
                      <li><span>City :  {{  optional($user->city)->name??' ' }}</span></li>
                      <li><span>Post Code :  {{  optional($user->postcode)->name??' '}}</span></li>
                      <li><span>Last Donation : {{ date('m-d-y', strtotime($user->donatedate))}}</span></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 d-flex align-items-center justify-content-center">
              <div class="two_btn">
                <a href="#"  onclick="call('+$user->number+');return false;"  class="send_msg">Call </a>
                <a href="#" class="send_msg" data-bs-toggle="modal" data-bs-target="#exampleModal">Send message</a>
              </div>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header border-0">
                      <h2 class="modal-title" id="exampleModalLabel">
                        Contact Donor
                      </h2>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="{{ url('send-email') }}" method="Post">
                        @csrf
                        <div class="mb-3">
                          <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Name">
                        </div>
                        <div class="mb-3">
                          <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Email">
                        </div>
                        <div class="mb-3">
                          <input type="text" class="form-control"  name="mobile" id="exampleInputPassword1" placeholder="Phone Number">
                        </div>
                        <div class="mb-3">
                          <textarea class="form-control" name="sms" placeholder="Your Message" cols="20" rows="5"></textarea>
                        </div>
                        <button type="submit" class="search_btn">
                          Send Message
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</main>
<script>
    function call(number) {
        // var number = document.querySelector("input[name=tel]").value;
        window.open('tel:' + number);
    }
</script>
@endsection
