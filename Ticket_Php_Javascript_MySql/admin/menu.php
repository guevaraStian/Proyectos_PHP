        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu"><!-- sidebar menu -->
            <div class="menu_section">
                <ul class="nav side-menu">
                    <li class="<?php if(isset($active1)){echo $active1;}?>">
                        <a href="inicioadmin.php"><i class="fa fa-dashboard"></i> Inicio Admin</a>
                    </li>

                    <li class="<?php if(isset($active2)){echo $active2;}?>">
                        <a href="tickets.php"><i class="fa fa-ticket"></i> Tickets</a>
                    </li>

                    <li class="<?php if(isset($active3)){echo $active3;}?>">
                        <a href="agenciaarea.php"><i class="glyphicon glyphicon-home"></i> Agencia - Area</a>
                    </li>

                    <!-- <li class="<?php //if(isset($active4)){echo $active4;}?>">
                        <a href="trabajador.php"><i class="fa fa-align-left"></i> Trabajadores</a>
                    </li> -->
                    <li class="<?php if(isset($active6)){echo $active6;}?>">
                        <a href="users.php"><i class="fa fa-users"></i> Usuarios</a>
                    </li>
                    <li class="<?php if(isset($active12)){echo $active12;}?>">
                        <a href="titulos.php"><i class="fa fa-plus-square-o"></i> Titulo de ticket</a>
                    </li>
                    <li class="<?php if(isset($active5)){echo $active5;}?>">
                        <a href="reports.php"><i class="fa fa-list-alt"></i> Reportes</a>
                    </li>
                    <li class="<?php if(isset($active11)){echo $active11;}?>">
                        <a href="traza.php"><i class="fa fa-calendar-check-o"></i> Trazabilidad</a>
                    </li>

                    <li class="<?php if(isset($active8)){echo $active8;}?>">
                        <a href="graficas.php"><i class="fa fa-area-chart"></i> Graficas e Informes</a>
                    </li>
                    <li class="<?php if(isset($active9)){echo $active9;}?>">
                        <a href="../usuario/iniciousuario.php"><i class="fa fa-child"></i> Interface usuario</a>
                    </li>
                    <li class="<?php if(isset($active10)){echo $active10;}?>">
                        <a href="../trabajador/iniciotrabajador.php"><i class="fa fa-child"></i> Interface trabajador</a>
                    </li>

                </ul>
            </div>
        </div><!-- /sidebar menu -->
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
                            <img src="../images/profiles/<?php echo $profile_pic;?>" alt=""><?php echo $name;?>
                            <span class=" fa fa-angle-down"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-usermenu pull-right">
                            <li><a href="inicioadmin.php"><i class="fa fa-user"></i> Mi cuenta</a></li>
                            <li><a href="action/logout.php"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div><!-- /top navigation -->    