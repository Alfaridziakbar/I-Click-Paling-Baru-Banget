<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"/> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"
      rel="stylesheet"
    />
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- <link rel="stylesheet" href="../style/style.css" /> -->
    <style>
        .navbar {
        background-color: #0073b7;
        border-bottom: 1px solid ;
      }
      .navbar-brand {
        font-weight: 500;
      }
      .nav-link .bi-cart {
        font-size: 24px;
        margin-right: 15px;
      }

      .nav-link .bi-heart {
        font-size: 24px;
        margin-right: 15px;
      }
      .navbar-brand {
        margin-left:12px;
        color: #0073b7;
        font-weight: bold;
        font-size: 24px;
        }

        #navbarContent {
            justify-content: end;
        }   

        .nav-link {
            color: #333 !important;
        }
    </style>
</head>
<body>
<nav
      class="navbar navbar-expand-lg navbar-light bg-white border-bottom fixed-top"
    >
      <div class="container">
        <a class="navbar-brand" href="#">I-Click</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarContent"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
          <div class="d-flex align-items-center ms-auto">

            <a href="wishlist.html" class="nav-link me-3 wishlist-link">
              <i class="bi bi-heart"></i>
            </a>
            <a href="cart-page.html" class="nav-link me-3 cart-link">
              <i class="bi bi-cart"></i>
              <span id="cart-count" class="badge bg-danger" style="position: absolute; top: -1px; right: 10px;">0</span>
            </a>
            <div id="loginStateContainer">
            </div>
          </div>
        </div>
      </div>
    </nav>
</body>
</html>
