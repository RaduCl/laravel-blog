<!-- NAV -->
<header id="masthead" class="site-header" role="banner">
    <nav class="navbar navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="row">
                <div class="site-navigation-inner col-sm-12">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">

                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".bs-navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button><!-- End of toggle button -->
                        <div id="logo">
                            <a class="navbar-brand" href="/"><img src="/img/logo_GITS.png" alt="Ghost In the Shell logo"></a>
                            <a href="/users/{{ Auth::user()->id}}" style="position: absolute; left: 72px; bottom: 0">Welcome {{ ucfirst(strtolower(Auth::user()->fname)) }}</a>
                        </div><!-- End of Logo -->
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse bs-navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="hidden"><a href="#page-top"></a></li>
                            <li class="active"><a href="/">Home</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">Categories<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#portfolio">IT</a></li>
                                    <li><a href="#portfolio">Gaming</a></li>
                                    <li><a href="#portfolio">Social</a></li>
                                </ul>
                            </li>
                            <!-- <li><a href="#portfolio">Portfolio</a></li>
                            <li><a href="#about">About</a></li> -->
                            <li><a href="/users/{{ Auth::user()->id}}">Admin</a></li>
                            <li><a href="/auth/logout"><i class="fa fa-sign-out"></i></i> Log out</a></li>
                        </ul><!-- nav right -->
                    </div><!-- navbar-collapse -->

                </div><!-- End col-sm-12 -->
            </div><!-- End row -->
        </div><!-- Endcontainer-fluid -->
    </nav><!-- End NAV -->
</header><!-- End Header -->