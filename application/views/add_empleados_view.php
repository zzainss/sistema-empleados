<?php
	$user = array('name' => 'user', 'class'=>'validate');

?>
  <?=form_open(base_url().'login/new_user') ?>
  <?=form_input($user)?>
  <?=form_label($user)?>
  <?=form_error('user')?>
<?=form_close()?>
