

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="./"><span>Track</span>.IT</a>
      <ul class="user-menu">
        <li class="dropdown pull-right"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked <?php echo $userActive['sex'];?>-user">
          <use xlink:href="#stroked-<?php echo $userActive['sex'];?>-user"></use>
          </svg> <?php echo $userActive['firstname'].' '.$userActive['lastname'];?></a>          
        </li>
      </ul>
    </div>
  </div>
  <!-- /.container-fluid --> 
</nav>

