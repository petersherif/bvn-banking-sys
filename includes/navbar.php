<nav class="navbar navbar-default navbar-fixed-top navbar-custom">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#topnav"
                    aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <p class="hello-msg color-text visible-xs"><span
                        class="color-text-weak">Hello,</span> <?php echo $_SESSION['user_name']; ?></p>
        </div>

        <div class="collapse navbar-collapse" id="topnav">
            <ul class="nav navbar-nav navbar-right">
                <li><a class="hidden-xs"><span class="color-text"><span
                                    class="color-text-weak">Hello,</span> <?php echo $_SESSION['user_name']; ?></span></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false"><i class="fa fa-user"></i><span
                                class="visible-xs-inline pl3">Profile</span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">One</a></li>
                        <li><a href="#">Two</a></li>
                        <li><a href="#">Three</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="home.php?logout">Logout</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false"><i class="fa fa-bell"></i><span
                                class="visible-xs-inline pl3">Notifications</span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">One</a></li>
                        <li><a href="#">Two</a></li>
                        <li><a href="#">Three</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="home.php?logout">Logout</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false"><i class="fa fa-gear"></i><span
                                class="visible-xs-inline pl3">Settings</span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">One</a></li>
                        <li><a href="#">Two</a></li>
                        <li><a href="#">Three</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="home.php?logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>