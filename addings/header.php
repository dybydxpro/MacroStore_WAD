<?php ?>
<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand">Macro Super Center</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="home.php">Home</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" aria-current="page" href="search.php">Search</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" aria-current="page" href="cart.php">Cart</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" aria-current="page" href="sellerhub.php">Seller hub</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" aria-current="page" href="about.php">About</a>
          </li>
        </ul>
        <form class="d-flex">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item dropdown">
          <a class="nav-link" aria-current="page" href="logout.php"><?php if($system_userName==""){ echo "";} else {echo $system_userName;} ?></a>
          </li>
          <li class="nav-item">
          <a class="nav-link" aria-current="page" href="signup.php">Sign up</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" aria-current="page" href="login.php">Log in</a>
          </li>
          </ul>
        </form>
      </div>
    </div>
  </nav>
</header>