<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <img src="public/img/Logo.png" width="50" height="50" class="d-inline-block align-top" alt="">
    <a class="navbar-brand" href="">M.E.P</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="home">Home<span class="sr-only"></span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="projects" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Projekte
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Verfallend</a>
            <a class="dropdown-item" href="#">Another Project</a>
            <a class="dropdown-item" href="#">More Projects?</a>
            <a class="dropdown-item" href="#">There aren't any</a>
            <a class="dropdown-item" href="#">Still reading, eh?</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="aboutus">Über uns<span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="social">Social<span class="sr-only"></span></a>
        </li>
      </ul>

      <?php echo loggedin(); ?>

    </div>
  </nav>
</header>