<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Bootstrap Admin </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('AdminCss/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{asset('AdminCss/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="{{asset('AdminCss/css/font.css')}}">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('AdminCss/css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('AdminCss/css/custom.css')}}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('AdminCss/img/favicon.ico')}}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    @include('sweetalert::alert')

    <header class="header">
      <nav class="navbar navbar-expand-lg">
        <div class="search-panel">
          <div class="search-inner d-flex align-items-center justify-content-center">
            <div class="close-btn">Close <i class="fa fa-close"></i></div>

            <form id="searchForm" action="#">
              <div class="form-group">
                <input type="search" name="search" placeholder="What are you searching for...">
                <button type="submit" class="submit">Search</button>
              </div>
            </form>
          </div>
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-between">
          <div class="navbar-header">
            <!-- Navbar Header--><a href="index.html" class="navbar-brand">
              <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Dark</strong><strong>Admin</strong></div>
              <div class="brand-text brand-sm"><strong class="text-primary">D</strong><strong>A</strong></div></a>
            <!-- Sidebar Toggle Btn-->
            <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
          </div>
          <div class="right-menu list-inline no-margin-bottom">
            <div class="list-inline-item"><a href="#" class="search-open nav-link"><i class="icon-magnifying-glass-browser"></i></a></div>
            <div class="list-inline-item dropdown"><a id="navbarDropdownMenuLink1" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link messages-toggle"><i class="icon-email"></i><span class="badge dashbg-1">5</span></a>
              <div aria-labelledby="navbarDropdownMenuLink1" class="dropdown-menu messages"><a href="#" class="dropdown-item message d-flex align-items-center">
                  <div class="profile"><img src="img/avatar-3.jpg" alt="..." class="img-fluid">
                    <div class="status online"></div>
                  </div>
                  <div class="content">   <strong class="d-block">Nadia Halsey</strong><span class="d-block">lorem ipsum dolor sit amit</span><small class="date d-block">9:30am</small></div></a><a href="#" class="dropdown-item message d-flex align-items-center">
                  <div class="profile"><img src="img/avatar-2.jpg" alt="..." class="img-fluid">
                    <div class="status away"></div>
                  </div>
                  <div class="content">   <strong class="d-block">Peter Ramsy</strong><span class="d-block">lorem ipsum dolor sit amit</span><small class="date d-block">7:40am</small></div></a><a href="#" class="dropdown-item message d-flex align-items-center">
                  <div class="profile"><img src="img/avatar-1.jpg" alt="..." class="img-fluid">
                    <div class="status busy"></div>
                  </div>
                  <div class="content">   <strong class="d-block">Sam Kaheil</strong><span class="d-block">lorem ipsum dolor sit amit</span><small class="date d-block">6:55am</small></div></a><a href="#" class="dropdown-item message d-flex align-items-center">
                  <div class="profile"><img src="img/avatar-5.jpg" alt="..." class="img-fluid">
                    <div class="status offline"></div>
                  </div>
                  <div class="content">   <strong class="d-block">Sara Wood</strong><span class="d-block">lorem ipsum dolor sit amit</span><small class="date d-block">10:30pm</small></div></a><a href="#" class="dropdown-item text-center message"> <strong>See All Messages <i class="fa fa-angle-right"></i></strong></a></div>
            </div>
            <!-- Tasks-->
            <div class="list-inline-item dropdown"><a id="navbarDropdownMenuLink2" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link tasks-toggle"><i class="icon-new-file"></i><span class="badge dashbg-3">9</span></a>
              <div aria-labelledby="navbarDropdownMenuLink2" class="dropdown-menu tasks-list"><a href="#" class="dropdown-item">
                  <div class="text d-flex justify-content-between"><strong>Task 1</strong><span>40% complete</span></div>
                  <div class="progress">
                    <div role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" class="progress-bar dashbg-1"></div>
                  </div></a><a href="#" class="dropdown-item">
                  <div class="text d-flex justify-content-between"><strong>Task 2</strong><span>20% complete</span></div>
                  <div class="progress">
                    <div role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" class="progress-bar dashbg-3"></div>
                  </div></a><a href="#" class="dropdown-item">
                  <div class="text d-flex justify-content-between"><strong>Task 3</strong><span>70% complete</span></div>
                  <div class="progress">
                    <div role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar dashbg-2"></div>
                  </div></a><a href="#" class="dropdown-item">
                  <div class="text d-flex justify-content-between"><strong>Task 4</strong><span>30% complete</span></div>
                  <div class="progress">
                    <div role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar dashbg-4"></div>
                  </div></a><a href="#" class="dropdown-item">
                  <div class="text d-flex justify-content-between"><strong>Task 5</strong><span>65% complete</span></div>
                  <div class="progress">
                    <div role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" class="progress-bar dashbg-1"></div>
                  </div></a><a href="#" class="dropdown-item text-center"> <strong>See All Tasks <i class="fa fa-angle-right"></i></strong></a>
              </div>
            </div>
            <!-- Tasks end-->
            <!-- Megamenu-->
            <div class="list-inline-item dropdown menu-large"><a href="#" data-toggle="dropdown" class="nav-link">Mega <i class="fa fa-ellipsis-v"></i></a>
              <div class="dropdown-menu megamenu">
                <div class="row">
                  <div class="col-lg-3 col-md-6"><strong class="text-uppercase">Elements Heading</strong>
                    <ul class="list-unstyled mb-3">
                      <li><a href="#">Lorem ipsum dolor</a></li>
                      <li><a href="#">Sed ut perspiciatis</a></li>
                      <li><a href="#">Voluptatum deleniti</a></li>
                      <li><a href="#">At vero eos</a></li>
                      <li><a href="#">Consectetur adipiscing</a></li>
                      <li><a href="#">Duis aute irure</a></li>
                      <li><a href="#">Necessitatibus saepe</a></li>
                      <li><a href="#">Maiores alias</a></li>
                    </ul>
                  </div>
                  <div class="col-lg-3 col-md-6"><strong class="text-uppercase">Elements Heading</strong>
                    <ul class="list-unstyled mb-3">
                      <li><a href="#">Lorem ipsum dolor</a></li>
                      <li><a href="#">Sed ut perspiciatis</a></li>
                      <li><a href="#">Voluptatum deleniti</a></li>
                      <li><a href="#">At vero eos</a></li>
                      <li><a href="#">Consectetur adipiscing</a></li>
                      <li><a href="#">Duis aute irure</a></li>
                      <li><a href="#">Necessitatibus saepe</a></li>
                      <li><a href="#">Maiores alias</a></li>
                    </ul>
                  </div>
                  <div class="col-lg-3 col-md-6"><strong class="text-uppercase">Elements Heading</strong>
                    <ul class="list-unstyled mb-3">
                      <li><a href="#">Lorem ipsum dolor</a></li>
                      <li><a href="#">Sed ut perspiciatis</a></li>
                      <li><a href="#">Voluptatum deleniti</a></li>
                      <li><a href="#">At vero eos</a></li>
                      <li><a href="#">Consectetur adipiscing</a></li>
                      <li><a href="#">Duis aute irure</a></li>
                      <li><a href="#">Necessitatibus saepe</a></li>
                      <li><a href="#">Maiores alias</a></li>
                    </ul>
                  </div>
                  <div class="col-lg-3 col-md-6"><strong class="text-uppercase">Elements Heading</strong>
                    <ul class="list-unstyled mb-3">
                      <li><a href="#">Lorem ipsum dolor</a></li>
                      <li><a href="#">Sed ut perspiciatis</a></li>
                      <li><a href="#">Voluptatum deleniti</a></li>
                      <li><a href="#">At vero eos</a></li>
                      <li><a href="#">Consectetur adipiscing</a></li>
                      <li><a href="#">Duis aute irure</a></li>
                      <li><a href="#">Necessitatibus saepe</a></li>
                      <li><a href="#">Maiores alias</a></li>
                    </ul>
                  </div>
                </div>
                <div class="row megamenu-buttons text-center">
                  <div class="col-lg-2 col-md-4"><a href="#" class="d-block megamenu-button-link dashbg-1"><i class="fa fa-clock-o"></i><strong>Demo 1</strong></a></div>
                  <div class="col-lg-2 col-md-4"><a href="#" class="d-block megamenu-button-link dashbg-2"><i class="fa fa-clock-o"></i><strong>Demo 2</strong></a></div>
                  <div class="col-lg-2 col-md-4"><a href="#" class="d-block megamenu-button-link dashbg-3"><i class="fa fa-clock-o"></i><strong>Demo 3</strong></a></div>
                  <div class="col-lg-2 col-md-4"><a href="#" class="d-block megamenu-button-link dashbg-4"><i class="fa fa-clock-o"></i><strong>Demo 4</strong></a></div>
                  <div class="col-lg-2 col-md-4"><a href="#" class="d-block megamenu-button-link bg-danger"><i class="fa fa-clock-o"></i><strong>Demo 5</strong></a></div>
                  <div class="col-lg-2 col-md-4"><a href="#" class="d-block megamenu-button-link bg-info"><i class="fa fa-clock-o"></i><strong>Demo 6</strong></a></div>
                </div>
              </div>
            </div>
            <!-- Megamenu end     -->
            <!-- Languages dropdown    -->
            <div class="list-inline-item dropdown"><a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle"><img src="img/flags/16/GB.png" alt="English"><span class="d-none d-sm-inline-block">English</span></a>
              <div aria-labelledby="languages" class="dropdown-menu"><a rel="nofollow" href="#" class="dropdown-item"> <img src="img/flags/16/DE.png" alt="English" class="mr-2"><span>German</span></a><a rel="nofollow" href="#" class="dropdown-item"> <img src="img/flags/16/FR.png" alt="English" class="mr-2"><span>French  </span></a></div>
            </div>
            <!-- Log out               -->
            <div class="list-inline-item logout">

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" id="logout"  class="nav-link btn btn-sm btn-primary">Logout <i class="icon-logout"></i></button>
                </form>
            </div>
          </div>
        </div>
      </nav>
    </header>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">Mark Stephen</h1>
            <p>Web Designer</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li class="active"><a href="{{ route('admin.home') }}"> <i class="icon-home"></i>Home </a></li>

                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Category </a>
                    <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                      <li><a href=" {{ route('admin.categoryPage') }} ">Add Category</a></li>
                      <li><a href="{{ route('admin.categoryList') }}">Category List</a></li>
                      
                    </ul>
                  </li>
                  <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Product </a>
                    <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                      <li><a href="{{ route('admin.productPage') }}">Add Product</a></li>
                      <li><a href="{{ route('admin.productList') }}">Product List</a></li>
                      
                    </ul>
                  </li>
                {{-- <li><a href="charts.html"> <i class="fa fa-bar-chart"></i>Charts </a></li> --}}
                <li><a href="{{ route('admin.order') }}"> <i class="icon-padnote"></i>Orders  </a></li>

                <li class="active"><a href="{{ route('userlistPage') }}"> <i class="fa-solid fa-users"></i></i>User List </a></li>

                <li class="active"><a href="{{ route('pyamentPage') }}"> <i class="fa-solid fa-dollar-sign"></i></i>Payment Methods </a></li>
        </ul>
        {{-- <ul class="list-unstyled">
          <li> <a href="#"> <i class="icon-settings"></i>Demo </a></li>
          <li> <a href="#"> <i class="icon-writing-whiteboard"></i>Demo </a></li>
          <li> <a href="#"> <i class="icon-chart"></i>Demo </a></li>
        </ul> --}}
      </nav>
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Dashboard</h2>

          </div>
        </div>
            @yield('content')



        <footer class="footer">
          <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
              <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
               <p class="no-margin-bottom">2018 &copy; Your company. Download From <a target="_blank" href="https://templateshub.net">Templates Hub</a>.</p>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('AdminCss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('AdminCss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('AdminCss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('AdminCss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('AdminCss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('AdminCss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('AdminCss/js/charts-home.js')}}"></script>
    <script src="{{asset('AdminCss/js/front.js')}}"></script>
  </body>
</html>
