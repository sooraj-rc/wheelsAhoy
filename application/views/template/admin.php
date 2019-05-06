<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>WheelsAhoy Admin | Dashboard</title>
        <link rel="shortcut icon" href="<?php echo c('assets_url'); ?>img/wheels-ahoy-png-compressed-favicon-128x128.png" type="image/x-icon">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo c('css_path_url'); ?>admin/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo c('css_path_url'); ?>admin/dataTables.bootstrap.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Select2 -->
        <link rel="stylesheet" href="<?php echo c('css_path_url'); ?>admin/select2.min.css">
        <link rel="stylesheet" href="<?php echo c('css_path_url'); ?>admin/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo c('css_path_url'); ?>admin/skin-red.min.css">
        <link rel="stylesheet" href="<?php echo c('css_path_url'); ?>admin/morris.css">
        <link rel="stylesheet" href="<?php echo c('css_path_url'); ?>admin/jquery-jvectormap-1.2.2.css">
        <link rel="stylesheet" href="<?php echo c('css_path_url'); ?>admin/datepicker3.css">
        <link rel="stylesheet" href="<?php echo c('css_path_url'); ?>admin/daterangepicker.css">
        <link rel="stylesheet" href="<?php echo c('css_path_url'); ?>admin/bootstrap3-wysihtml5.min.css">       
        <link rel="stylesheet" href="<?php echo c('css_path_url'); ?>dropzone.css">       
        <!-- <script src="//cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script> -->
        <style type="text/css">
            .error{ font-size: 12px; color: #FF3636; font-weight: 400; }
            .skin-red .main-header .navbar{background-color: #f57f2a !important;}
            .skin-red .main-header .logo{background-color: #f57f2a !important;}
            .skin-red .main-header .navbar .sidebar-toggle:hover{background-color: #dc6f20 !important;}
            .skin-red .main-header .logo:hover{background-color: #f57f2a !important;}
            .skin-red .main-header li.user-header{background-color: #f57f2a !important;}
            .user-panel>.image>img{height: 50px !important; width: 50px !important;}
            .listbox img{display: block;margin-left: auto;margin-right: auto;}
        </style>
        <script>
            //function preventBack(){window.history.forward();}
            //setTimeout("preventBack()", 0);
            //window.onunload=function(){null};
        </script>
        <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=2l225mzji2ehq4bxk5v37quqbu2w4zegjzm0z41uhmyrxw5j"></script>        
        <script>
		tinymce.init({
          selector: '.textarea2',
          height: 500,
          menubar: false,
          plugins: [
            'advlist autolink lists link image charmap print preview anchor textcolor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
          ],
          toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
          content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tiny.cloud/css/codepen.min.css'
          ]
        });
		</script>
    </head>

    <body class="sidebar-mini skin-red">
        <div class="wrapper">
            <header class="main-header">
                <a href="<?php echo base_url(); ?>admin" class="logo">
                    <span class="logo-mini"><b>WA</b></span>
                    <span class="logo-lg"><b>WA</b> Admin</span>
                </a>
                <nav class="navbar navbar-static-top">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            

                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo c('assets_url'); ?>img/logo-1.png" class="user-image" alt="User Image">
                                    <span class="hidden-xs">WheelsAhoy Admin</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header">
                                        <img src="<?php echo c('assets_url'); ?>img/logo-1.png" class="img-circle" alt="User Image">

                                        <p>
                                            WA - Admin
                                            <small>wheelsahoy.com</small>
                                        </p>
                                    </li>
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php url('admin/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="main-sidebar">
                <section class="sidebar">
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo c('assets_url'); ?>img/logo-1.png" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p>WA Admin</p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form> -->

                    <ul class="sidebar-menu">
                        <li class="header">ADMIN NAVIGATION</li>

                        <li>
                            <a href="<?php echo admin_url(); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>

                        <li class="treeview">
                            <a href="<?php url('admin/c/story') ?>">
                                <i class="fa fa-cubes"></i>
                                <span>Manage Story</span>                                
                            </a>                            
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-cubes"></i>
                                <span>Manage Portfolio</span>                                
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo admin_url() . 'portfolio'; ?>"><i class="fa fa-list"></i> Manage Images</a>
                                </li>                                
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-cubes"></i>
                                <span>Manage Services</span>                                
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo admin_url() . 'services/add'; ?>"><i class="fa fa-plus"></i> Add Service</a>
                                </li>
                                <li><a href="<?php echo admin_url() . 'services'; ?>"><i class="fa fa-list"></i> List Services</a>
                                </li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-cubes"></i>
                                <span>Manage Market</span>                                
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo admin_url() . 'stocks/add'; ?>"><i class="fa fa-plus"></i> Add Market</a>
                                </li>
                                <li><a href="<?php echo admin_url() . 'stocks'; ?>"><i class="fa fa-list"></i> List Market</a>
                                </li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-cubes"></i>
                                <span>Manage Clients</span>                                
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo admin_url() . 'clients/add'; ?>"><i class="fa fa-plus"></i> Add Clients</a>
                                </li>
                                <li><a href="<?php echo admin_url() . 'clients'; ?>"><i class="fa fa-list"></i> List Clients</a>
                                </li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-cubes"></i>
                                <span>Manage Testimonials</span>                                
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo admin_url() . 'testimonials/add'; ?>"><i class="fa fa-plus"></i> Add Testimonials</a>
                                </li>
                                <li><a href="<?php echo admin_url() . 'testimonials'; ?>"><i class="fa fa-list"></i> List Testimonials</a>
                                </li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-cubes"></i>
                                <span>Manage Blogs</span>                                
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo admin_url() . 'blogs/add'; ?>"><i class="fa fa-plus"></i> Add Blog</a>
                                </li>
                                <li><a href="<?php echo admin_url() . 'blogs'; ?>"><i class="fa fa-list"></i> List Blogs</a>
                                </li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-cubes"></i>
                                <span>Manage Events</span>                                
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo admin_url() . 'events'; ?>"><i class="fa fa-list"></i> Manage Events</a>
                                </li>                                
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-cubes"></i>
                                <span>Manage Enquiries</span>                                
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo admin_url() . 'enquiries'; ?>"><i class="fa fa-list"></i> List Enquiries</a>
                                </li>                                
                            </ul>
                        </li>
                                                

                        <li class="divider" style="border: #304148 solid 1px;"></li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-cogs"></i>
                                <span>Admin Profile Settings</span>                               
                            </a>
                            <ul class="treeview-menu"> 
                                <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Profile</a>
                                </li> -->
                                <li><a href="<?php echo admin_url() . 'reset-pwd'; ?>"><i class="fa fa-lock"></i> Reset password</a>
                                </li>

                            </ul>
                        </li> 


                    </ul>
                </section>
            </aside>
            <?php
            //contents goes here
            echo $content;
            ?>
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 1.0
                </div>
                <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="<?php url('admin'); ?>">WheelsAhoy Admin</a>.</strong> All rights reserved.
            </footer>
        </div>
        <div data-href='<?php url('admin'); ?>/' id="admin_url"></div>
        <script src="<?php echo c('js_path_url'); ?>admin/jquery-2.2.3.min.js"></script>
        <script src="<?php echo c('js_path_url'); ?>admin/jquery.validate.js"></script> 
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>        
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <script src="<?php echo c('js_path_url'); ?>admin/bootstrap.min.js"></script>
        <script src="<?php echo c('js_path_url'); ?>admin/jquery.dataTables.min.js"></script>
        <script src="<?php echo c('js_path_url'); ?>admin/dataTables.bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="<?php echo c('js_path_url'); ?>admin/morris.min.js"></script>
        <script src="<?php echo c('js_path_url'); ?>admin/jquery.sparkline.min.js"></script>
        <script src="<?php echo c('js_path_url'); ?>admin/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="<?php echo c('js_path_url'); ?>admin/jquery-jvectormap-world-mill-en.js"></script>
        <script src="<?php echo c('js_path_url'); ?>admin/jquery.knob.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
        <script src="<?php echo c('js_path_url'); ?>admin/daterangepicker.js"></script>
        <script src="<?php echo c('js_path_url'); ?>admin/bootstrap-datepicker.js"></script>
        <script src="<?php echo c('js_path_url'); ?>admin/select2.full.min.js"></script>
        <script src="<?php echo c('js_path_url'); ?>admin/bootstrap3-wysihtml5.all.min.js"></script>
        <script src="<?php echo c('js_path_url'); ?>admin/jquery.slimscroll.min.js"></script>
        <script src="<?php echo c('js_path_url'); ?>admin/fastclick.js"></script>
        <script src="<?php echo c('js_path_url'); ?>admin/app.min.js"></script>
        <!-- dropzone -->
        <script src="<?php echo c('js_path_url'); ?>dropzone.js"></script>

        <?php if($dashboard_js == "yes") { ?>
        <script src="<?php echo c('js_path_url'); ?>admin/dashboard.js"></script>
        <?php } ?>
        <script src="<?php echo c('js_path_url'); ?>admin/demo.js"></script>  
        <script src="<?php echo c('js_path_url'); ?>admin/admin.js"></script>             
    </body>

</html>