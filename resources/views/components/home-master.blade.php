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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">  
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
    <div class="topnav">
        <a href="{{route('home')}}">Trang chủ</a>
        <a href="#">Về nhà trường</a>
        <a href="#">Giáo viên</a>
        <a href="#">Học sinh</a>
        <a href="#">Gửi phản hồi</a>
    </div>

    <!-- Manual Slideshow  -->
          <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{asset('homepage/images/element5-digital-OyCl7Y4y0Bk-unsplash.jpg')}}" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="{{asset('homepage/images/susan-yin-2JIvboGLeho-unsplash.jpg')}}" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="{{asset('homepage/images/neonbrand-zFSo6bnZJTw-unsplash.jpg')}}" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>    
    </div>
       

    <!-- Announcements-->
    <div class="contents clearfix">
      <div class="main-content">
          <h1 class="recent-post-title">Thông báo</h1>

            @yield('content')

          <a href="#" id="end-contents">Đọc thêm...</a>
      </div> 

      
      <!-- Sidebar: Contact and Clock -->
      <div class="sidebar">
          <h1>Liên hệ</h1>

          <div class="icons">
            <a href=""><img src="{{asset('homepage/images/2018_social_media_popular_app_logo_facebook-128.png')}}"></a>
            <a href=""><img src="{{asset('homepage/images/iconfinder_Facebook_Messenger_1298720.png')}}"></a>
            <a href=""><img src="{{asset('homepage/images/zalo-seeklogo.png')}}"></a>
          </div>
      </div>    


      <div class="clock">
        <h1>Đồng hồ</h1>        
        <canvas id="canvas" width="300px" height="300px"></canvas>
      </div> 
    </div>


    <!-- Avoid overfollowing once using float -->
      <div class=clearfix>

      </div>

    <!-- Footer -->  
    <footer>
      <h4>©2021 Bản quyền thuộc trường tiểu học EMS, Hà Nội </h4> 
    </footer>

    


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"> </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
<script src="{{asset('homepage/js/main.js')}}"></script>
<script src="{{asset('homepage/js/clock.js')}}"></script>


</body>
</html>