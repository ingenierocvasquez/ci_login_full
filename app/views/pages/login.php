<section class="login">
      <div class="container">

            <div class="row">
              <div class="col-md-6" id="img_login">
                <img src="<?php echo base_url().'assets/images/login_image.png'?>" class="img-responsive" alt="" />
              </div>
              <div class="col-md-4" id="frm_login">
                    <div id="login_form">
                      <h3>Login</h3>
                      <hr>
                      <?php
                      $attributes = array(
                        "id" => "login_form",
                        "name" => "login_form",
                        "method" => "post",
                      );

                      echo $this->session->flashdata('msg');

                      echo form_open("login", $attributes);
                      ?>
                      <div class="form-group">
                        <label>Usuario: <span class="campo_obli">*</span></label>
                        <?php

                        $txt_usuario = array(
                          'name' => 'usuario',
                          'id' => 'usuario',
                          'size' => "40",
                          'value' => set_value("usuario"),
                          'type' => "text",
                          'placeholder' => "Usuario",
                          'class' => 'form-control',
                          //'required'      => ''
                        );

                        echo form_input($txt_usuario); ?>
                        <span class="error"><?php echo form_error('usuario'); ?></span>
                      </div>

                      <div class="form-group">
                        <label>Contraseña: <span class="campo_obli">*</span></label>
                        <?php
                        $txt_pasword = array(
                          'name' => 'password',
                          'id' => 'password',
                          'size' => "40",
                          'value' => set_value("password"),
                          'type' => "password",
                          'placeholder' => "Contraseña",
                          'class' => 'form-control',
                          //'required'         => ''
                        );

                        echo form_input($txt_pasword); ?>
                        <span class="error"><?php echo form_error('password'); ?></span>

                      </div>
                      <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                      <?php form_close(); ?>
                      <hr>
                      <ul id="login_option">
                      <li><span><a href="#">¿Ha olvidado su contraseña?</a></span></li>
                      <li><span><a href="#">¡Registrate!</a></span></li>
                      <ul>
                    </div>
              </div>
            </div>
      </div>
</section>