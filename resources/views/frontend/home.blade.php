@extends('frontend.layouts.app')

@section('content')
    <!-- banner -->
    <section class="header_search_area">
        <div class="container mx-auto">
          <div class="banner-text py-10">
            <h1 class="text-white font-semibold">
              Online-based platform to connect <br />
              blood searchers with donors
            </h1>
            <h3>
              Get Blood24 is a real-time free platform to help blood searchers
              connect voluntary <br />
              blood donors around Bangladesh.
            </h3>
          </div>
          <div class="banner-button mt-5">
            <button class="my-btn">Join as Blood Donor</button>
            <button class="my-btn-2 ms-2">Search Blood Donors</button>
          </div>
        </div>
      </section>

      <section class="info-get-blood">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-sm-12">
              <div class="info-get-blood-img">
                <img src="{{ asset('/') }}frontend/images/blood-sticker.png" alt="" />
              </div>
            </div>
            <div class="col-lg-6 col-sm-12">
              <div class="getblood-info-text">
                <h3>What is Get Blood24?</h3>
                <p>
                  Get Blood24 is an automated blood service that connects blood
                  searchers with voluntary donors in a moment through Online. Get
                  Blood24 is always a free service for all.
                </p>
                <h3>Why is Get blood24?</h3>
                <ul>
                  <li>100% Automated</li>
                  <li>Always free</li>
                  <li>Always free</li>
                  <li>24×7 service</li>
                  <li>All data is secured</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="blood-search-container">
        <form action="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-2 mt-2">
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="form-label">Blood Group
                        </label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Select </option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                          </select>
                    </div>
                    </div>
                    <div class="col-lg-3 col-md-3 mt-2">
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="form-label">District
                        </label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected> Select District

                            </option>
                            <option value="Bagerhat">Bagerhat</option>
                            <option value="Bandarban">Bandarban</option>
                            <option value="Barguna">Barguna</option>
                            <option value="Barisal">Barisal</option>
                            <option value="Bhola">Bhola</option>
                            <option value="Bogra">Bogra</option>
                            <option value="Brahmanbaria">Brahmanbaria</option>
                            <option value="Chandpur">Chandpur</option>
                            <option value="Chapainawabganj">Chapainawabganj</option>
                            <option value="Chittagong">Chittagong</option>
                            <option value="Chuadanga">Chuadanga</option>
                            <option value="Comilla">Comilla</option>
                            <option value="Cox's Bazar">Cox's Bazar</option>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Dinajpur">Dinajpur</option>
                            <option value="Faridpur">Faridpur</option>
                            <option value="Feni">Feni</option>
                            <option value="Gaibandha">Gaibandha</option>
                            <option value="Gazipur">Gazipur</option>
                            <option value="Gopalganj">Gopalganj</option>
                            <option value="Habiganj">Habiganj</option>
                            <option value="Jamalpur">Jamalpur</option>
                            <option value="Jessore">Jessore</option>
                            <option value="Jhalokati">Jhalokati</option>
                            <option value="Jhenaidah">Jhenaidah</option>
                            <option value="Joypurhat">Joypurhat</option>
                            <option value="Khagrachari">Khagrachari</option>
                            <option value="Khulna">Khulna</option>
                            <option value="Kishoreganj">Kishoreganj</option>
                            <option value="Kurigram">Kurigram</option>
                            <option value="Kushtia">Kushtia</option>
                            <option value="Lakshmipur">Lakshmipur</option>
                            <option value="Lalmonirhat">Lalmonirhat</option>
                            <option value="Madaripur">Madaripur</option>
                            <option value="Magura">Magura</option>
                            <option value="Manikganj">Manikganj</option>
                            <option value="Meherpur">Meherpur</option>
                            <option value="Moulvibazar">Moulvibazar</option>
                            <option value="Munshiganj">Munshiganj</option>
                            <option value="Mymensingh">Mymensingh</option>
                            <option value="Naogaon">Naogaon</option>
                            <option value="Narail">Narail</option>
                            <option value="Narayanganj">Narayanganj</option>
                            <option value="Narsingdi">Narsingdi</option>
                            <option value="Natore">Natore</option>
                            <option value="Netrokona">Netrokona</option>
                            <option value="Nilphamari">Nilphamari</option>
                            <option value="Noakhali">Noakhali</option>
                            <option value="Pabna">Pabna</option>
                            <option value="Panchagarh">Panchagarh</option>
                            <option value="Patuakhali">Patuakhali</option>
                            <option value="Pirojpur">Pirojpur</option>
                            <option value="Rajbari">Rajbari</option>
                            <option value="Rajshahi">Rajshahi</option>
                            <option value="Rangamati">Rangamati</option>
                            <option value="Rangpur">Rangpur</option>
                            <option value="Satkhira">Satkhira</option>
                            <option value="Shariatpur">Shariatpur</option>
                            <option value="Sherpur">Sherpur</option>
                            <option value="Sirajganj">Sirajganj</option>
                            <option value="Sunamganj">Sunamganj</option>
                            <option value="Sylhet">Sylhet</option>
                            <option value="Tangail">Tangail</option>
                            <option value="Thakurgaon">Thakurgaon</option>
                          </select>
                    </div>
                    </div>
                    <div class="col-lg-3 col-md-3 mt-2">
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="form-label">Date of Blood Donation
                        </label>
                        <input type="date" class="form-control date">
                    </div>
                    </div>
                    <div class="col-lg-3 col-md-3 mt-2">
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="form-label">Donor Type
                        </label>
                        <select class="form-select" aria-label="Default select example">
                            <option value="All">Select</option>
                            <option value="All">All</option>
                            <option value="Eligible">Eligible</option>
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

      <section class="our-network">
        <div class="container">
          <h3 class="section-heading text-center mb-4">We're a network of</h3>
          <div class="row mx-auto text-center">
            <div class="col-lg-4 col-sm-12">
              <div class="our-network-box">
                <i class="fa-solid fa-users"></i>
                <h3>5302 Donors</h3>
              </div>
            </div>
            <div class="col-lg-4 col-sm-12">
              <div class="our-network-box">
                <i class="fa-solid fa-location-dot"></i>
                <h3>64 Districts</h3>
              </div>
            </div>
            <div class="col-lg-4 col-sm-12">
              <div class="our-network-box">
                <i class="fa-solid fa-users"></i>
                <h3>8 Blood Groups</h3>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- FAQS -->
      <section class="faqs pb-5">
        <div class="container">
          <h3 class="section-heading text-center">FAQS</h3>
          <p class="text-muted text-center">know more about blood donation and know how you can help people.
          </p>
          <div class="row mt-5">
            <div class="col-lg-6 col-sm-12">
              <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingOne">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#flush-collapseOne"
                      aria-expanded="false"
                      aria-controls="flush-collapseOne"
                    >
                    What are preliminary psychological disorder ?
                    </button>
                  </h2>
                  <div
                    id="flush-collapseOne"
                    class="accordion-collapse collapse"
                    aria-labelledby="flush-headingOne"
                    data-bs-parent="#accordionFlushExample"
                  >
                    <div class="accordion-body">
                      By combining your knowledge and our care expertise, we can work together to maximise your family member’s health and wellbeing. Your involvement will not replace the quality care and support they receive from Eldercare staff.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingTwo">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#flush-collapseTwo"
                      aria-expanded="false"
                      aria-controls="flush-collapseTwo"
                    >
                    Are Get Blood24 services free?
                    </button>
                  </h2>
                  <div
                    id="flush-collapseTwo"
                    class="accordion-collapse collapse"
                    aria-labelledby="flush-headingTwo"
                    data-bs-parent="#accordionFlushExample"
                  >
                    <div class="accordion-body">
                      Yes, they are always free.

                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingThree">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#flush-collapseThree"
                      aria-expanded="false"
                      aria-controls="flush-collapseThree"
                    >
                    What are preliminary psychological disorder ?
                    </button>
                  </h2>
                  <div
                    id="flush-collapseThree"
                    class="accordion-collapse collapse"
                    aria-labelledby="flush-headingThree"
                    data-bs-parent="#accordionFlushExample"
                  >
                    <div class="accordion-body">
                      By combining your knowledge and our care expertise, we can work together to maximise your family member’s health and wellbeing. Your involvement will not replace the quality care and support they receive from Eldercare staff.
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-sm-12">
              <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingOne">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#flush-collapseOne"
                      aria-expanded="false"
                      aria-controls="flush-collapseOne"
                    >
                    What are preliminary psychological disorder ?
                    </button>
                  </h2>
                  <div
                    id="flush-collapseOne"
                    class="accordion-collapse collapse"
                    aria-labelledby="flush-headingOne"
                    data-bs-parent="#accordionFlushExample"
                  >
                    <div class="accordion-body">
                      By combining your knowledge and our care expertise, we can work together to maximise your family member’s health and wellbeing. Your involvement will not replace the quality care and support they receive from Eldercare staff.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingTwo">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#flush-collapseTwo"
                      aria-expanded="false"
                      aria-controls="flush-collapseTwo"
                    >
                    What are preliminary psychological disorder ?
                    </button>
                  </h2>
                  <div
                    id="flush-collapseTwo"
                    class="accordion-collapse collapse"
                    aria-labelledby="flush-headingTwo"
                    data-bs-parent="#accordionFlushExample"
                  >
                    <div class="accordion-body">
                      By combining your knowledge and our care expertise, we can work together to maximise your family member’s health and wellbeing. Your involvement will not replace the quality care and support they receive from Eldercare staff.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingThree">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#flush-collapseThree"
                      aria-expanded="false"
                      aria-controls="flush-collapseThree"
                    >
                    What are preliminary psychological disorder ?
                    </button>
                  </h2>
                  <div
                    id="flush-collapseThree"
                    class="accordion-collapse collapse"
                    aria-labelledby="flush-headingThree"
                    data-bs-parent="#accordionFlushExample"
                  >
                    <div class="accordion-body">
                      By combining your knowledge and our care expertise, we can work together to maximise your family member’s health and wellbeing. Your involvement will not replace the quality care and support they receive from Eldercare staff.
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </section>
@endsection
