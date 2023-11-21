<html>

<head>
    @vite(['resources/sass/app.scss','resources/js/app.js'])
    <title>@yield('title')</title>
    @yield('header')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

* {
    margin: 0;
    padding: 0;
}

header {
    background-color: #b9d1f6;
    color: #fff;
    padding: 10px;
    text-align: center;
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 50px;
}

.menu-toggle{
    cursor: pointer;
}

.navbar {
    display: flex;
}

.nav-list {
    list-style: none;
    display: flex;
}

.nav-item {
    margin: 0;
    cursor: pointer;
}

.button{
    cursor: pointer;
}


body {
overflow-x: hidden;
font-family: 'Poppins', sans-serif;
letter-spacing: 1px;
}

/* Toggle Styles */

#wrapper {
    padding-left: 0;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#wrapper.toggled {
    padding-left: 250px;
}

#sidebar-wrapper {
    z-index: 1000;
    position: fixed;
    left: 250px;
    width: 0;
    height: 100%;
    margin-left: -250px;
    overflow-y: auto;
    background: #b9d1f6;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#wrapper.toggled #sidebar-wrapper {
    width: 250px;
}

#page-content-wrapper {
    width: 100%;
    position: absolute;
}

#wrapper.toggled #page-content-wrapper {
    position: absolute;
    margin-right: -250px;
}

/* Sidebar Styles */

.sidebar-nav {
    position: absolute;
    top: 0;
    width: 250px;
    margin: 0;
    padding: 0;
    list-style: none;
}

.sidebar-nav li {
    text-indent: 20px;
    line-height: 40px;
}

.sidebar-nav li a {
    display: block;
    text-decoration: none;
    color: #fff;
}

.sidebar-nav li a:hover {
    text-decoration: none;
    color: #fff;
    background: rgba(255,255,255,0.2);
}

.nav-item {
    align-items: center;
    margin: 10px 0;
}

.nav-link {
    text-decoration: none;
    color: #ffffff;
    display: flex;
    align-items: center;
}

svg {
    fill: #ffffff;
    margin-right: 10px;
}


.sidebar-nav li a:active,
.sidebar-nav li a:focus {
    text-decoration: none;
}

.sidebar-nav > .sidebar-brand {
    height: 65px;
    font-size: 18px;
    line-height: 60px;
}

.sidebar-nav > .sidebar-brand a {
    color: #FFFFFF;
}

.sidebar-nav > .sidebar-brand a:hover {
    background: none;
}

@media(min-width:768px) {
    #wrapper {
        padding-left: 250px;
    }

    #wrapper.toggled {
        padding-left: 0;
    }

    #sidebar-wrapper {
        width: 250px;
    }

    #wrapper.toggled #sidebar-wrapper {
        width: 0;
    }

    #page-content-wrapper {
        position: relative;
    }

    #wrapper.toggled #page-content-wrapper {
        position: relative;
        margin-right: 0;
    }

    .logout{
        color: red;
    }
}

    </style>

</head>

<body>
    <div id="wrapper" class="toggled">
  <!-- Sidebar -->
  <div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <br/>
        <li class="sidebar-brand">
            <a href="{{ url('dashboard/pasien') }}" class="h2">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M142.4 21.9c5.6 16.8-3.5 34.9-20.2 40.5L96 71.1V192c0 53 43 96 96 96s96-43 96-96V71.1l-26.1-8.7c-16.8-5.6-25.8-23.7-20.2-40.5s23.7-25.8 40.5-20.2l26.1 8.7C334.4 19.1 352 43.5 352 71.1V192c0 77.2-54.6 141.6-127.3 156.7C231 404.6 278.4 448 336 448c61.9 0 112-50.1 112-112V265.3c-28.3-12.3-48-40.5-48-73.3c0-44.2 35.8-80 80-80s80 35.8 80 80c0 32.8-19.7 61-48 73.3V336c0 97.2-78.8 176-176 176c-92.9 0-168.9-71.9-175.5-163.1C87.2 334.2 32 269.6 32 192V71.1c0-27.5 17.6-52 43.8-60.7l26.1-8.7c16.8-5.6 34.9 3.5 40.5 20.2zM480 224a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg>MEDICARE
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ url('dashboard/pasien') }}"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M192 48c0-26.5 21.5-48 48-48H400c26.5 0 48 21.5 48 48V512H368V432c0-26.5-21.5-48-48-48s-48 21.5-48 48v80H192V48zM48 96H160V512H48c-26.5 0-48-21.5-48-48V320H80c8.8 0 16-7.2 16-16s-7.2-16-16-16H0V224H80c8.8 0 16-7.2 16-16s-7.2-16-16-16H0V144c0-26.5 21.5-48 48-48zm544 0c26.5 0 48 21.5 48 48v48H560c-8.8 0-16 7.2-16 16s7.2 16 16 16h80v64H560c-8.8 0-16 7.2-16 16s7.2 16 16 16h80V464c0 26.5-21.5 48-48 48H480V96H592zM312 64c-8.8 0-16 7.2-16 16v24H272c-8.8 0-16 7.2-16 16v16c0 8.8 7.2 16 16 16h24v24c0 8.8 7.2 16 16 16h16c8.8 0 16-7.2 16-16V152h24c8.8 0 16-7.2 16-16V120c0-8.8-7.2-16-16-16H344V80c0-8.8-7.2-16-16-16H312z"/></svg> Dashboard</a>
        </li>
        
        
    </ul>
</div>

<div id="page-content-wrapper">
    <header>
        <div class="menu-toggle" class="btn button" id="menu-toggle">
            ☰ Menu
        </div>
        <nav class="navbar me-auto mb-2 mb-md-0">
            <ul class="nav-list">
                <li class="nav-item d-flex">
                    <a class="logout btn me-0" style="color:white;" href="{{ url('/auth/logout') }}">Logout</a>
                </li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <br/>
        {{-- @include('layout.flash-message') --}}
        @yield('content')
       <br/>
    </div>
 </div>
</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
</body>
<footer>
    @yield('footer')
</footer>
<html>