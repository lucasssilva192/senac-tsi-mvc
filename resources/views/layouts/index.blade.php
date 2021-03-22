<html>
    <head>  
        <title>@yield('title')</title>  
    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

        <style>
            .menu{
                background-color:#ccffcc;
            }

            .rodape{
                background-color: #696969;
            }

            .content{
                height: 80%;
                padding-top: 5%;
                padding-bottom: 9%;
            }
            .content h1{
                text-align: center;
            }
        </style>
    </head>
    <body>

@section('sidebar')       
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark primary-color menu fixed-top text-dark">
  <!-- Navbar brand -->
  <a class="navbar-brand  text-dark" href="#">ICON FICARÁ AQUI</a>
  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="basicExampleNav">
    <!-- Links -->
    <ul class="navbar-nav mr-auto  text-dark">
      <li class="nav-item active  text-dark">
        <a class="nav-link  text-dark" href="#">BOTÃO 1 <span class="sr-only">(current)</span> </a>
      </li>
      <li class="nav-item active active  text-dark">
        <a class="nav-link  text-dark" href="#">BOTÃO 2</a>
      </li>
      <li class="nav-item active  text-dark">
        <a class="nav-link  text-dark" href="#">BOTÃO 3</a>
      </li>
    </ul>
    <!-- Links -->
      <div class="md-form my-0">
        <input type="button" class="btn btn-primary" href="#"> Login </input>
      </div>
  </div>
  <!-- Collapsible content -->
</nav>
<!--/.Navbar-->

@show
<main class="container mt-4 content">
<h1>  @yield('h1') </h1>
    <div>
        @yield('content')
    </div>
</main>

@section('footer')
<!-- Footer -->
<section class="fixed-bottom rodape">
  <!-- Footer -->
  <footer class="text-center text-white rodape">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: CTA -->
      <section class="">
        <p class="d-flex justify-content-center align-items-center">
          <span class="me-3">BlaBlaBla</span>
        </p>
      </section>
      <!-- Section: CTA -->
    </div>
    <!-- Grid container -->
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2020 Copyright:
      <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
</section>
<!-- Footer -->

    </body>
</html>