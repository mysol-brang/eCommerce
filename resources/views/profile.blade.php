<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <title>MySol</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('dist/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/tooplate-main.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/owl.css')}}">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
        <img src="{{asset('dist/img/header-logo.png')}}" alt="logo" class='mx-auto d-block'>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
      
      </div>
    </nav>

    <!-- Page Content -->
   <div class="container">
    <div class="d-flex justify-content-center m-5">
        <form class="p-3" action="{{route('user.update',$user->id)}}" method="post">@csrf
            <div class="form-group">
              <label for="forname">Name</label>
              <input type="text" name="name" value="{{$user->name}}" class="form-control input-sm" id="forname" aria-describedby="emailHelp" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="foremail">Email address</label>
                <input type="email" name="email" value="{{$user->email}}" class="form-control" id="foremail" aria-describedby="emailHelp" placeholder="Enter email">
              </div>
            <div class="form-group">
              <label for="forpassword">New Password</label>
              <input type="password" name="password"  class="form-control" id="forpassword" placeholder="Password">
              <input type="hidden" name="passwordhidden" value="{{$user->password}}">
            </div>
            <div class="form-group">
                <label for="forphone">Phone Number</label>
                <input type="text" name="phone" value="{{$user->phone}}" class="form-control" id="forphone" aria-describedby="emailHelp" placeholder="Enter phone number">
            </div>
            <div class="form-group">
                <label for="foraddress">Address</label>
                <textarea name="address" class="form-control" id="foraddress" rows="3">{{$user->address}}</textarea>
              </div>
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
    </div>
   </div>

    




    
    <!-- Footer Starts Here -->
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="logo">
              <img src="{{asset('dist/img/header-logo.png')}}" alt="">
            </div>
          </div>
          <div class="col-md-12">
            <div class="footer-menu">
              <ul>
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="#">Help</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">How It Works ?</a></li>
                <li><a href="#">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-12">
            <div class="social-icons">
              <ul>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-rss"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer Ends Here -->


    <!-- Sub Footer Starts Here -->
    <div class="sub-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="copyright-text">
              <p>Copyright &copy; 2023 MySol Company Limited 
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Sub Footer Ends Here -->


    <!-- Bootstrap core JavaScript -->
    {{-- <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
    <script src="{{asset('js/app.js')}}"></script>

    <!-- Additional Scripts -->
    <script src="{{asset('dist/js/custom.js')}}"></script>
    <script src="{{asset('dist/js/owl.js')}}"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
