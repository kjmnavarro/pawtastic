<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="refresh" content="{{ config('session.lifetime') * 60 }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"> 
</head>
<body>
    <div id="app">

        <div class="banner p-5" id="topPage">
            <div class="container">
                <nav id='mainNav' class="navbar navbar-light bg-transparent">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('images/logo.png') }}" class="logo">
                        <span>Pawstatic</span>
                    </a>

                    <ul class="nav justify-content-end">
                      <li class="nav-item">
                        <a class="nav-link active" href="#aboutus">About us</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#scheduleVisit">Schedule a visit</a>
                      </li>
                    </ul>
                </nav>

                <div class="row mt-5">
                    <div class="col-md-4 offset-md-8">
                        <h2 class="text-white font-weight-bold" id="bannerText">We care for <br> your fluffy little <br> love ones <br> while</h2>
                    </div>
                    <div class="col-md-3 offset-md-8 mt-5">
                        <a class="anc-banner" href="#scheduleVisit">
                            <button class="btn btn-pawLight btn-block">Schedule a visit</button>
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
            
        <div data-spy="scroll" data-target="#mainNav" data-offset="0">

            <div id="aboutus" class="container">
                <div class="row justify-content-center">

                    <div class="col-md-6 justify-content-center">
                        <h3 class="font-weight-bold" id="aboutText">Expert care for your <br> furry, feathery, or <br> scaley friend</h3>

                        <p class="mt-4 mb-4">We know how stressful it is to leave your pets at <br> home alone. We're a team of experienced <br> animal caregivers, well connected to local <br> veterinarians. Trust to us to love them like our <br> own, and to keep them safe and happy till <br> you're home.</p>

                        <div class="col-md-5 pl-0">
                            <a class="anc-banner" href="#scheduleVisit">
                                <button class="btn btn-pawDark btn-block">Schedule a visit</button>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-6">

                       <div class="image-gallery">
                           <img src="{{ asset('images/cat.jpg') }}" alt="cat">
                           <span class="image-name" style="top: 40%; left: 10%;">Muffin</span>
                           <img src="{{ asset('images/parrot.png') }}" alt="parrot">
                           <span class="image-name" style="top: 40%; right: 20%;">Fergie</span>
                       </div>

                       <div class="image-gallery">
                           <img src="{{ asset('images/dog1.png') }}" alt="dog">
                           <span class="image-name" style="bottom: 5%; left: 10%;">Natasha</span>
                           <img src="{{ asset('images/hamster.jpg') }}" alt="hamster">
                           <span class="image-name" style="bottom: 5%; right: 17%;">Melchor</span>
                       </div>

                    </div>

                </div>
            </div>

            <div id="scheduleVisit">
                <div class="row justify-content-center">
                    
                    <div class="col-md-5 bg-pawDark text-center text-white">
                        <a class="navbar-brand mb-5 mt-5" href="#topPage">
                            <img src="{{ asset('images/logo.png') }}" class="logo">
                            <span>Pawstatic</span>
                        </a>

                        <h1 class="mb-5 font-weight-bold">All services include:</h1>

                        <ul class="text-left" style="display: inline-block;">
                            <li class="pb-4">A photo update for you along</li>
                            <li class="pb-4">Notifications of sitter arrival</li>
                            <li class="pb-4">Treats for your pets, with your</li>
                        </ul>

                        <img id="puppy-footer" src="{{ asset('images/puppy.png') }}" alt="puppy">
                    </div>
                    
                    <div class="col-md-7 bg-pawPink p-5">
                        
                        <h1 class="mb-5 font-weight-bold text-center">We'll take your dog for a <br> walk. Just tell us when!</h1>

                        <div class="row justify-content-center">

                            <div class="col-md-4">
                                <label>Frequency</label>
                                <span class="text-danger">*</span>
                                <div class="form-control d-flex justify-content-around">
                                    <button class="check-all check-off" id="freq-recur" value="recurring" onclick="toggleFreq('#freq-recur','#freq-one')">Recurring</button>
                                    <button class="check-all check-off" id="freq-one" value="one time" onclick="toggleFreq('#freq-one','#freq-recur')">One Time</button>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label>Start date</label>
                                <span class="text-danger">*</span>
                                <input class="form-control" type="date" id="startdate" />
                            </div>

                            <div class="col-md-8 mt-4">
                                <label>Days <small style="color: #808080;">Select all that apply</small></label> <span class="text-danger">*</span>

                                <div class="form-control d-flex justify-content-around">
                                    <button class="check-all check-off" id="day-mon" value="monday" onclick="toggleDay('#day-mon')">Mon</button>
                                    <button class="check-all check-off" id="day-tue" value="tuesday" onclick="toggleDay('#day-tue')">Tue</button>
                                    <button class="check-all check-off" id="day-wed" value="wednesday" onclick="toggleDay('#day-wed')">Wed</button>
                                    <button class="check-all check-off" id="day-thur" value="thursday" onclick="toggleDay('#day-thur')">Thurs</button>
                                    <button class="check-all check-off" id="day-fri" value="friday" onclick="toggleDay('#day-fri')">Fri</button>
                                    <button class="check-all check-off" id="day-sat" value="saturday" onclick="toggleDay('#day-sat')">Sat</button>
                                    <button class="check-all check-off" id="day-sun" value="sunday" onclick="toggleDay('#day-sun')">Sun</button>
                                </div>

                            </div>

                            <div class="col-md-8 mt-4">
                                <label>Times <small style="color: #808080;">Select all that apply</small></label>
                                <span class="text-danger">*</span>

                                <div class="form-control d-flex justify-content-around">
                                    <button class="check-all check-off" id="morning" value="morning" onclick="toggleTimes('#morning')">Morning</button>
                                    <button class="check-all check-off" id="afternoon" value="afternoon" onclick="toggleTimes('#afternoon')">Aftenoon</button>
                                    <button class="check-all check-off" id="evening" value="evening" onclick="toggleTimes('#evening')">Evening</button>
                                </div>

                            </div>

                            <div class="col-md-8 mt-4">
                                <label>Notes for your sitter</label>

                                <textarea id="notes" class="form-control" rows="7" placeholder="Route preference, bench location, treats given etc."></textarea>

                            </div>

                            <div class="col-md-5 mt-4">
                                <button class="btn btn-pawDark btn-block" onclick="ajaxSchedule()">Schedule Service</button>
                            </div>


                        </div>


                    </div> {{-- col-md-7 --}}

                </div>
            </div> {{-- /scheduleVisit --}}
        </div> {{-- scroll --}}
    </div> {{-- /app --}}

    <div class="errorMessage">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Hey Furparents!</strong>
          <ul>
              <li class="alertMsg" style="list-style-type: none;"></li>
          </ul>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    </div>

    <div class="successMessage">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Hey Furparents!</strong>
          <ul>
              <li style="list-style-type: none;">Thank you for availing our schedule service!</li>
          </ul>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    </div>

</body>
</html>
