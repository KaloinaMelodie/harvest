<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('fonts\icomoon\style.css')}}">

    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <!-- Style -->
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">

    <title>Sidebar #1</title>
  </head>


  @include('backgroundLeaves')


  <body style="position: relative; width:100%;">



    <aside class="sidebar">
        <div class="toggle">
          <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
                <span></span>
              </a>
        </div>
        <div class="side-inner">

          <div class="profile">
            <img src="images/person_4.jpg" alt="Image" class="img-fluid">
            <h3 class="name">Craig David</h3>
            <span class="country">Web Designer</span>
          </div>


          <div class="nav-menu">
            <ul>

                {{-- <li class="accordion">
                <a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsible">
                  <span class="icon-home mr-3"></span>Feed
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne">
                  <div>
                    <ul>
                      <li><a href="#">News</a></li>
                      <li><a href="#">Sport</a></li>
                      <li><a href="#">Health</a></li>
                    </ul>
                  </div>
                </div>
              </li> --}}

              <li><a href="vip"><span class="icon-pie-chart mr-3"></span>Dashboard</a></li>

              <li class="accordion">
                <a href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="collapsible">
                  <span class="icon-search2 mr-3"></span>Explorer
                </a>

                <div id="collapseTwo" class="collapse" aria-labelledby="headingOne">
                  <div>
                    <ul>
                      <li><a href="#">Domaines</a></li>
                      <li><a href="/ListeVulgarisateur">Vulgarisateurs</a></li>
                      <li><a href="#">Agriculteurs</a></li>
                    </ul>
                  </div>
                </div>

              </li>

              <li><a href="#"><span class="icon-sign-out mr-3"></span>Sign out</a></li>
            </ul>
          </div>
        </div>

      </aside>
      <main>
        @yield('dashboard')
        @yield('liste')
      </main>

    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
  </body>
</html>
