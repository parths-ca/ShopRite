<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="nav-wrap">
        <div class="mobile-only-brand pull-left">
            <div class="nav-header pull-left">
                <div class="logo-wrap">
                    <a href="index.php">
                        <img class="brand-img mr-10" style="height:55px" src="my-theme/img/shoprite_logo.png" alt="brand"/>
                        <span class="brand-text"><img style="height:55px" src="my-theme/img/shoprite_logo.png" alt="brand"/></span>
                    </a>
                </div>
            </div>	
            <a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="ti-align-left"></i></a>
            <a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
            <a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="ti-more"></i></a>
        </div>
        <div id="mobile_only_nav" class="mobile-only-nav pull-right">
            <ul class="nav navbar-right top-nav pull-right">
                
                <li class="dropdown auth-drp">
                    <a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="my-theme/img/user1.png" alt="user_auth" class="user-auth-img img-circle"/>WelCome, <?php echo $_SESSION["Admin_name"] ?></a>
                    <ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                        <li>
                            <a href="change-password.php"><i class="zmdi zmdi-settings"></i><span>Change Password</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>	
    </div>
</nav>