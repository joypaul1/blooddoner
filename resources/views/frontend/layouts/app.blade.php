<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/e6a5841b3b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />
    {{-- <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" /> --}}
    <!-- Custom css style -->
    <link rel="stylesheet" href="{{ asset('/')}}frontend/css/style_1.css" />
    <link rel="stylesheet" href="{{ asset('/')}}frontend/css/login.css" />

    <title>home</title>
</head>
@stack('css')

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light my-nav">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('/') }}frontend/images/logo.png" class="" width="187px" height="64px" alt="Flowbite Logo" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/about-us">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/donor-search">Search Donors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/become-Donor">Become Donors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/blood-request">Add Blood Request</a>
                        </li>
                        <li class="nav-item dropdown">
                        @guest
                            <a class="nav-link active" href="/user-login">login</a>
                        @else
                            {{-- <a class="nav-link active" href="/">{{ auth()->user()->name }}</a> --}}
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                              </ul>

                        @endguest
                        </li>


                        <li class="nav-item">
                            <a class="active" href="#">
                                <img src="{{ asset('/') }}frontend/images/search-icon.png" alt="" />
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    @yield('content')

    <section class="blood-search-container">
        <form action="">
            <div class="container">
                {{-- <div class="row">
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
                </div> --}}
            </div>
        </form>
    </section>

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <img src="{{ asset('/') }}frontend/images/logo.png" alt="">
                    <p class="text-white my-2">{!!  $info->short_desc !!}</p>
                </div>
                <div class="col-lg-4">
                    <h5 class="text-white">Links</h5>
                    <ul>
                        <li class="text-white"><a href="/">Home</a></li>
                        <li class="text-white"><a href="about-us">About</a></li>
                        <li class="text-white"><a href="/donor-search">Search Donors</a></li>
                        <li class="text-white"><a href="/become-Donor">Become Donors</a></li>
                        <li class="text-white"><a href="/login">login</a></li>
                    </ul>
                </div>
                {{-- @dd($quickPage); --}}
                <div class="col-lg-4">
                    <h5 class="text-white">Further Information</h5>
                    <ul>
                        <li class="text-white"><a href="/our-team">Our Team</a></li>
                        @forelse ($quickPage as $page)
                        <li class="text-white"><a href="{{url('/quick-page', $page->slug)  }}">{{ $page->name??' '}}</a></li>

                        @empty

                        @endforelse
                    </ul>
                </div>
                <div class="col-lg-3">
                </div>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    @stack('js')
</body>

</html>
