<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><b>App-Login</b></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Inicio</a></li>
            <li><a href="#">Consultas</a></li>
            <li><a href="#">Contáctenos</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">

                     <li class="dropdown" style="float:right">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">
                                    <img width="20px" class="img-circle" src="https://ak.picdn.net/contributors/283336203/avatars/thumb.jpg" alt="VASQUEZ TRUCCO, CESAR FERNANDO">
                                    <span class="username-movil">VASQUEZ TRUCCO, CESAR FERNANDO</span>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li class="user-header">
                                        <div class="text-center">
                                            <a href="">
                                                <img width="64px"  class="img-circle" src="https://ak.picdn.net/contributors/283336203/avatars/thumb.jpg" alt="VASQUEZ TRUCCO, CESAR FERNANDO">
                                                <p class="name">VASQUEZ TRUCCO, CESAR FERNANDO</p>
                                            </a>
                                            <p><em class="fa fa-envelope-o" aria-hidden="true"></em> ingenierocvasquez@gmail.com</p>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                            <!--<li class="user-body">
                                            <a title="Bandeja de entrada" href="https://pvdiecasd.com/main/messages/inbox.php">
                                                <em class="fa fa-envelope" aria-hidden="true"></em> Bandeja de entrada
                                            </a>
                                        </li>-->
                                    
                                    
                                        <!--<li class="user-body">
                                            <a title="Mis certificados" href="https://pvdiecasd.com/main/gradebook/my_certificates.php">
                                                <em class="fa fa-graduation-cap" aria-hidden="true"></em> Mis certificados
                                            </a>
                                        </li>-->
                                    
                                    <li class="user-body">
                                        <a id="logout_button" title="Salir" href="<?php echo base_url() . 'logout'?>">
                                            <em class="fa fa-sign-out"></em> Salir
                                        </a>
                                    </li>
                                </ul>
                            </li>       
                </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>