<!DOCTYPE html>
<html>
    <head>
        <base href="<?php echo base_url(); ?>">
        <meta charset="UTF-8">
        <title>Registro de Actividades en Comunidad - "Prepa Sí"</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="resources/bootstrap-3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="resources/ionicons-1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="resources/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <link href="resources/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

        <script src="resources/js/jquery-2.1.1.min.js"></script>
        <script src="resources/bootstrap-3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="resources/bootstrap-3.2.0/js/button.js" type="text/javascript"></script>


        <!-- AdminLTE App -->
        <script src="resources/js/AdminLTE/app.js" type="text/javascript"></script>

        <script src="resources/js/Chart.min.js" type="text/javascript"></script>

        <script src="resources/Highcharts-4.0.4/highcharts.js" type="text/javascript"></script>

        <script src="resources/Highcharts-4.0.4/highcharts-more.js" type="text/javascript"></script>


        <script src="resources/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="resources/js/plugins/datatables/dataTables.responsive.js" type="text/javascript"></script>
        <script src="resources/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>


        <script type="text/javascript" src="resources/fancybox/jquery.fancybox.js?v=2.1.5"></script>
        <link rel="stylesheet" type="text/css" href="resources/fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />

        <script src="resources/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <link href="resources/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />

        <script src="resources/js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="resources/js/plugins/datepicker/locales/bootstrap-datepicker.es.js" type="text/javascript"></script>

        <script src="resources/scripts/bootbox.min.js" type="text/javascript"></script>


        <link href="resources/css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        
        <script type="text/javascript" src="resources/scripts/jquery.validate.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="resources/images/favicon.ico">
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="<?php echo base_url(); ?>index.php/administrador/index" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <img src="resources/images/logo_interno.png" style="padding-top:7px; vertical-align:sub;"/>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <!-- <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>  -->
                    <img src="resources/images/barritas.png" />
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">

                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#606060;">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $this->session->userdata('nombre'); ?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <p>
                                        <?php echo $this->session->userdata('nombre_completo'); ?>
                                        <small><?php echo $this->session->userdata('perfil'); ?></small>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="<?php echo base_url(); ?>index.php/main/salir" class="btn btn-default btn-flat">Salir</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left info">
                            Bienvenido


                        </div>
                    </div>
                    <!-- search form --
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Buscar..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">

                        <li class="treeview active" <?php if ($this->uri->segment(2) === 'nuevoUsuario' or $this->uri->segment(2) === 'listadoUsuarios' ) echo "class='active'"; ?>>
                            <a href="<?php echo base_url(); ?>index.php/administrador/usuarios">
                                <i class="fa fa-users"></i>
                                <span style="font-weight:bold;">Usuarios</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li <?php if ($this->uri->segment(2) === 'listadoUsuarios') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>index.php/administrador/listadoUsuarios"><i class="fa fa-angle-double-right"></i> Listado Usuarios</a></li>
                                <li <?php if ($this->uri->segment(2) === 'nuevoUsuario') echo "class='active'"; ?>><a href="<?php echo base_url(); ?>index.php/administrador/nuevoUsuario"><i class="fa fa-angle-double-right"></i> Nuevo usuario</a></li>                                
                            </ul>
                        </li> 

                    </ul>
                </section>
                <!-- /.sidebar -->
                
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <?php echo $content; ?><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

    </body>
</html>