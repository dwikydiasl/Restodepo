  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>R</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>Restodepo</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">



          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php echo $_SESSION[$this->config->item('sess_prefix')."NamaSession"];?></a>
            <ul class="dropdown-menu">
              
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="<?php echo base_url();?>backend/login/changePassword"><i class="fa fa-key text-aqua"></i>Ganti Password</a>
                  </li>
                  <li><!-- start notification -->
                    <a href="<?php echo base_url();?>backend/login/dologout"><i class="fa fa-sign-out text-aqua"></i>Logout</a>
                  </li>

                  <!-- end notification -->
                </ul>
              </li>
              
            </ul>
          </li>



        </ul>
      </div>
    </nav>
  </header>