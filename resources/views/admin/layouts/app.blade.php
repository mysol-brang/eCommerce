<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Product Admin</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{asset('/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">

      <span class="brand-text font-weight-light">{{Auth::user()->name}}</span>
    </a>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          @can('isSuperAdmin')
            <li class="nav-item">
              <a href="{{route('superadmin.index')}}" class="nav-link">
                <i class="fas fa-user-circle"></i>
                <p>
                  User List
                </p>
              </a>
            </li>
            <li class="nav-item">
              <form action="{{ route('logout') }}" method="post">@csrf
                  <button type="submit" class="btn btn-danger w-100">
                      <i class="fas fa-sign-out-alt"></i>
                      Logout
                  </button>
                      
              </form>
            </li>
          @else
          <li class="nav-item">
            <a href="{{route('admin.userlist')}}" class="nav-link">
              <i class="fas fa-user-circle"></i>
              <p>
                User List
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fas fa-list"></i>
              <p>
                Order
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fas fa-pizza-slice ms-5"></i>
              <p>
                Category
              </p>
            </a>
          </li>

         <li class="nav-item">
            <a href="{{route('admin.productlist')}}" class="nav-link">
            <i class="fas fa-users"></i>
              <p>
                Product
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fas fa-book"></i>
              <p>
                Trend Post
              </p>
            </a>
          </li>

          <li class="nav-item">
            <form action="{{ route('logout') }}" method="post">@csrf
                <button type="submit" class="btn btn-danger w-100">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </button>
                    
            </form>
          </li>
          @endcan
        </ul>
      </nav>
    </div>
  </aside>

  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row mt-4">
          @yield('content')
        </div>
      </div>
    </section>
  </div>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<script src="{{asset('/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('/dist/js/demo.js')}}"></script>
</body>
</html>
