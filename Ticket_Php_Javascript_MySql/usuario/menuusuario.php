        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu"><!--inicio de menu usuario -->
            <div class="menu_section">
                <ul class="nav side-menu">
                    <li class="<?php if(isset($active1)){echo $active1;}?>">
                        <a href="iniciousuario.php"><i class="fa fa-child"></i> Inicio Usuario</a>
                    </li>

                    <li class="<?php if(isset($active2)){echo $active2;}?>">
                        <a href="ticketsusuario.php"><i class="fa fa-ticket"></i> Tickets</a>
                    </li>

                </ul>
            </div>
        </div><!-- fin de menu usuario -->
    </div>
</div> 
     
    <div class="top_nav"><!-- top navigation -->
        <div class="nav_menu">
            <nav>
                <div class="nav toggle">
                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="">
                        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <img src="../images/profiles/logo.png" alt=""><?php echo $name;?>
                            
                        </a>
                        <!-- <ul class="dropdown-menu dropdown-usermenu pull-right"> -->
                            <li><a href="iniciousuario.php"><i class="fa fa-user"></i> Mi cuenta</a></li>
                            <li><a href="action/logout.php"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesión</a></li>
                        <!-- </ul> -->
                    </li>
                </ul>
            </nav>
        </div>
    </div><!-- /top navigation -->    