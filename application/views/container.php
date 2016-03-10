<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title><?php echo $titulo ?></title>
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('/') ?>css/materialize.min.css"  media="screen,projection"/>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url('/') ?>js/materialize.min.js"></script>
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <script>
        $(".dropdown-button").dropdown();
    </script>
    <style>
    body {
        display: flex;
        margin: 0 auto;
        min-height: 100vh;
        flex-direction: column;
        max-width: 1080px;
      }
    main {
        flex: 1 0 auto;
    }
    .right{
        margin-right: 50px;
    }
        .brand-logo{
           margin-left: 50px
        }
    a{
        color:#000;
        text-decorati
    }
    </style>
	</head>

	<body>

<nav>
  <div class="nav-wrapper blue-grey lighten-2">
    <a href="<?=base_url('/') ?>" class="brand-logo">NearSource</a>
    <ul class="right hide-on-med-and-down">
      <li><a href="<?=base_url('/') ?>">inicio</a></li>
			<?php if($this->session->userdata('is_logued_in') == TRUE){ ?>
      <li><a href="<?=base_url('/empleados') ?>">Empleados</a></li>
      <li><a class="dropdown-button" href="#!" data-activates="usuario"><?php echo $this->session->userdata('full_name'); ?></a></li>
			<li><?=anchor(base_url().'login/logout_ci', 'Cerrar sesión')?></li>
			<?php } ?>
		</ul>
  </div>
</nav>

		<section>
		<div class="maximo">
        <?php
        $this->load->view($page);
        ?>
       </div>
        </section>

        <footer class="page-footer blue-grey lighten-2">
          <div class="footer-copyright"><div class="text-lighten-5 right ">
            © 2015  | Powered by <a href="http://zains.com.ve" class="text-lighten-5">Francisco Chirinos</a>
            </div>
          </div>
        </footer>
	</body>
</html>
