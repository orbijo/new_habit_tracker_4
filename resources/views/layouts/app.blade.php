<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'New Habit Tracker') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/be4950f832.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/floatingbtn.css') }}" rel="stylesheet">
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/main.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/daygrid/main.min.css">
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://momentjs.com/downloads/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/main.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/daygrid/main.min.js"></script>
    
    @if(isset($habit))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var ratings = {!! json_encode($habit->ratings->toArray()) !!}
            var events = []
            ratings.forEach(element => {
                var newEvent = {
                    title : element.rating,
                    start : element.created_at,
                    icon: element.rating
                }
                events.push(newEvent)
            });
            events.forEach(element => {
                if(element.icon == 'smile'){
                    element.backgroundColor = '#5cb85c'
                }
                else if(element.icon == 'meh'){
                    element.backgroundColor = '#f0ad4e'
                }
                else {
                    element.backgroundColor = '#d9534f'
                }
            })
            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: [ 'dayGrid' ],
                events: events,
                eventRender: function (info) {
                    let icon = info.event.extendedProps.icon;
                    let title = $(info.el).first('.fc-title-wrap');
                    if (icon !== undefined) {
                        title.prepend("<i class='far fa-"+ icon + " fa-lg'></i>");
                    }
                    if(icon == 'smile'){
                        this.eventBackgroundColor = '#5cb85c'
                    }
                    $(info.el).addClass('text-center pt-2 pb-1')
                },
                displayEventTime: false,
                eventTextColor: '#ffffff',
                eventBorderColor: "#ffffff"
            });

            calendar.render();
        });
        </script>
    @endif
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name.' '.Auth::user()->last_name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    {{-- <div class="px-3 text-center">
                                        {{Auth::user()->first_name.' '.Auth::user()->last_name}}
                                    </div>

                                    <div class="dropdown-divider"></div> --}}
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        

    </div>
</body>
</html>
