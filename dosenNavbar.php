<?php
  if (isset($_POST["logout"])) {
    session_destroy();
  }
?>

<nav>
    <form action="" method="post">
      <div class="nav-wrapper indigo darken-4" style="padding-left: 10px">
        <a href="#" class="brand-logo">Dosen</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="dosenHome.php">Home</a></li>
          <li><a name="logout" href="index.php">Logout</a></li>
        </ul>
      </div>
    </form>
    
</nav>

