<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Education Management System</title>
   
    <link rel="stylesheet" href="{{asset('homepage/style.css')}}"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    
</head>
<body>
    <!-- Logo and Login Button -->
    <header>
        <img src="{{asset('homepage/images/modern-school-logo-design-template-1d88683e857f70116bf3ba828be9a84e_screen.jpg')}}" width="100" height="100"/>
        
        @if(Auth::check())
        <form class="btn1" action="{{route('admin.index')}}"><button type="submit" class="btn btn-light" id="btn1">Quản trị viên</button></form>
        @else
        <form class="btn1" action="/login"><button type="submit" class="btn btn-light" id="btn1">Đăng nhập</button></form>
        @endif
    </header>

    <!-- Avoid overfollowing once using float -->
    <div class="clearfix">

    </div>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                  <a class="nav-link" href="#">Trang chủ <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">Về trường học</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">Giáo viên </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">Học sinh </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">Gửi phản hồi </a>
              </li>  
          </ul>        
      </div>
</nav>

    <!-- Manual Slideshow  -->
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{asset('homepage/images/element5-digital-OyCl7Y4y0Bk-unsplash.jpg')}}" alt="First slide">
            <div class="carousel-caption d-none d-md-block" style="color:black;">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
        </div>

        <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('homepage/images/susan-yin-2JIvboGLeho-unsplash.jpg')}}" alt="Second slide">
            <div class="carousel-caption d-none d-md-block" style="color:black;">
              <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p>
            </div>
        </div>

        <div class="carousel-item">
          <img class="d-block w-100" src="{{asset('homepage/images/neonbrand-zFSo6bnZJTw-unsplash.jpg')}}" alt="Third slide">
            <div class="carousel-caption d-none d-md-block" style="color:black;">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
            </div>        
        </div>         
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
      </a>      
  </div>       

  <div class="contents">
    <div class="container-fluid">
        <div class="row">
            <!-- Announcements-->
            
              <div class="col-md-8">
                <div class="posts">
                    <h2>Thông báo</h2>
                    <div class="box-posts">
                      @yield('content')

                    </div>
                </div>
              </div>     

            <div class="col-md-4">
              <div class="social-media">
                <h2>Liên hệ</h2>
                  <div class="icons">
                    <a href=""><img src="{{asset('homepage/images/2018_social_media_popular_app_logo_facebook-128.png')}}"></a>
                    <a href=""><img src="{{asset('homepage/images/iconfinder_Facebook_Messenger_1298720.png')}}"></a>
                    <a href=""><img src="{{asset('homepage/images/zalo-seeklogo.png')}}"></a>
                  </div> 
              </div>

              <div class="clock">
                <h2>Đồng hồ</h2>        
                <canvas id="canvas" width="300px" height="300px"></canvas>
            </div> 
            </div>
        </div>
      </div>
  </div>
      
      <!-- Sidebar: Contact and Clock -->
      




    

    <!-- Footer -->  
    <footer>
      <h4>©2021 Bản quyền thuộc trường tiểu học EMS, Hà Nội </h4> 
    </footer>

    


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="{{asset('homepage/js/main.js')}}"></script>
<script src="{{asset('homepage/js/clock.js')}}"></script>


</body>
</html>

