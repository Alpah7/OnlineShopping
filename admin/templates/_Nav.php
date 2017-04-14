<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#button-collapse" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><i class="fa fa-shopping-bag"></i> Betta Shop</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="button-collapse">
      <ul class="nav navbar-nav">
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="navbar-text hidden-xs"><i class="fa fa-user"></i> Hi, <?= $_SESSION['firstname'] ?></li>
        <li <?php if ($admin->alert_notif() > 0): ?> class="bg-danger" <?php else: ?> class="" <?php endif ?> >
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-bell-o"></i> Notifications <span class="sr-only">(current)</span>
            <sup class="badge"><?= $admin->alert_notif() ?></sup>
          </a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#"><i class="fa fa-trash"></i> Clear Notifications</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cogs"></i> Options <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"><i class="fa fa-cogs"></i> General Settings</a></li>
            <li><a href="#"><i class="fa fa-fort-awesome"></i> Sosial Media</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?= __SHOP__ ?>admin/logout.php"><i class="fa fa-minus-circle"></i> Sign Out</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>