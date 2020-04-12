<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Projet PHP</title>
<link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
</head>
<body>
    <div class="top-bar">
        <div class="top-bar-left">
          <ul class="menu">
            <li class="menu-text">Blog</li>
            <li><a href="/">Home</a></li>
            <li><a href="/contact">Contact</a></li>
            <li><a href="/articles">Articles</a></li>
            <li><a href="/rediger">Nouvel Article</a></li>
          </ul>
        </div>


        <div class="flex-center position-ref full-height">
          <div class="top-bar-right">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="/articles">Feel free to go over our articles list</a>
                        </li> -->
                        @if( auth()->check() )
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold" href="#">Hi {{ auth()->user()->name }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/logout">Log Out</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="/login">Log In</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/register">Register</a>
                            </li>
                        @endif
                    </ul>
              </div>
            </div>
          </div>
    </div>

<div class="callout large primary">
<div class="row column text-center">
<h1>Blog de Fatima et Pauline !!!</h1>
<h2 class="subheader">Such a Simple Blog Layout</h2>
</div>
</div>

<div class="row medium-8 large-7 columns">


</div>
@yield('content')
</div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script>
      $(document).foundation();
    </script>
</body>
</html>