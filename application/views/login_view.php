<?php
	$user = array('name' => 'user', 'class'=>'validate');
	$password = array('name' => 'password', 'class'=>'validate');
	$submit = array('name' => 'submit', 'value' => 'Iniciar sesión', 'title' => 'Iniciar sesión', 'class'=>'btn waves-effect waves-light');
?>
  <div class="row">
   <?=form_open(base_url().'login/new_user') //class="col s12" ?>
      <div class="row">
       <h1>Login</h1>
            <?php echo validation_errors(); ?>
		<?php echo $this->session->flashdata('error') ? $this->session->flashdata('error') : '' ?>
        <div class="input-field col s6">
          <?=form_input($user)?>
          <label for="user">Usuario</label>
          <?=form_error('user')?>
        </div>

        <div class="input-field col s6">
          <?=form_password($password)?>
          <label for="last_name">Contraseña</label>
          <?=form_error('password')?>
        </div>
        <?=form_hidden('token',$token)?>
        <button class="btn waves-effect waves-light" type="submit" name="submit" value="submit">Submit
            <i class="material-icons">send</i>
        </button>
         <a href="<?php echo base_url().'login/registro' ?>" class="btn waves-effect waves-light">Registro</a>
      </div>
    <?=form_close()?>
    <?php
        if($this->session->flashdata('usuario_incorrecto')) { ?>
        <p><?=$this->session->flashdata('usuario_incorrecto')?></p>
        <?php } ?>
</div>
