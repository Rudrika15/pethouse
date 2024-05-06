<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Maids</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    .navbar-nav .nav-link {
        margin: 0 15px;
        position: relative;
        color: #fff;
    }

    .navbar-nav .nav-link::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 2px;
        background-color: #007bff;
        transition: width 0.3s ease;
    }

    .navbar-nav .nav-link:hover::after {
        width: 100%;
    }

    .navbar.fixed-top {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
        background-color: #3498db;
        box-shadow: 0 1px 8px 0 rgba(57, 67, 77, 0.7);
    }

    body.navbar-fixed {
        margin-top: 56px; /* Adjust as needed */
    }

    .navbar-nav {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
    }

    @media (max-width: 768px) {
        .navbar-nav .nav-link {
            margin: 0 5px;
        }

        #login {
            justify-content: center;
        }
    }

    /* Reduce padding and size of login and register buttons */
    .btn-login,
    .btn-register {
        padding: 0.25rem 0.5rem;
        font-size: 0.8rem;
    }
  </style>
</head>
<body>

<div class="shadow p-1 mb-5 bg-white rounded ">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top " style="background-color:rgb(57, 67, 77)">

        <!-- Navbar Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav d-flex justify-content-start">
                <a class="nav-item nav-link text-white" href="#">LOGO</a>
                <a class="nav-item nav-link text-white" href="#">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link text-white" href="">Products</a>

            </div>

            <div class="d-flex justify-content-end" id="login">
                @if (Route::has('login'))
                    @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ url('/dashboard') }}" class="btn btn-outline-light me-2 btn-login">Dashboard</a>
                        <button type="submit" class="btn btn-outline-light btn-login">Logout</button>
                    </form>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-outline-light me-2 btn-login mr-2" style="width: 115px">Log in</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-outline-light btn-register mr-2" style="width: 115px">Register</a>
                    @endif
                    @endauth
                @endif
            </div>

        </div>
    </nav>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
