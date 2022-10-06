<style type="text/css">
   body{
    margin-top: 20px;
   }
   span.error {
      color: red;
    }
</style>

<section class="login">
  <div class="container text-center">

    <div class="row">
      <div class="col-md-offset-4 col-md-4">
    <!--<img id="logo" width="200" src="<?php // echo $img_header; ?>" alt=""/>-->

    
          <?php
          $attributes = array(
              "id" => "login_form",
              "name" => "login_form",
              "method" => "post",
          );

          echo $this->session->flashdata('msg');

          echo form_open("validate", $attributes);
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

          echo form_input($txt_usuario);?>
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

          echo form_input($txt_pasword);?>
                <span class="error"><?php echo form_error('password'); ?></span>

              </div>
              <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
          <?php form_close();?>

      </div>
    </div>
</div>
</div>

</div>
</section>