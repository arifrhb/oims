<span class="text-center">
<h1><?=config_item('code_sys') ?> </h1> 

<h3>OF <br/></h3> <h3><?=config_item('code_org') ?> </h3>

<h4 class="center-block">Welcome <?= $this->session->userdata('usr_name')?> </h4>
</span>

<?php //echo $_SESSION['flash_data'];  ?>
<?php //echo '<span class="text-center">'. (!empty($_SESSION['login_msg']) ? $_SESSION['login_msg'] :'') . '</span>';

?>
