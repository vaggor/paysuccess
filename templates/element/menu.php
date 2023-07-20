<?php
//$data1 = $this->Session->read();
//$user = $data1['Auth']['User'];
//print_r( $user['use_group'] );
?>
<nav class="pcoded-navbar">
<div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
<div class="pcoded-inner-navbar main-menu">
<div class="pcoded-navigation-label">Navigation</div>

<?php if(isset($sess_data)){ ?>
	<ul class="pcoded-item pcoded-left-item">
	<li class="<?php if($this->request->getParam('controller') == 'Transactions' and in_array($this->request->getParam('action'), array('index'))){echo 'active';}else{echo '';} ?>">
	<?php echo $this->Html->link('<span class="pcoded-micon"><i class="ti-new-window"></i></span><span class="pcoded-mtext">Transactions </span><span class="pcoded-mcaret"></span> ',array('controller'=>'transactions','action'=>'index'),array('escape'=>false)); ?>
	</li>

	<?php if($sess_data['usergroup_id'] == 1){ ?>
	<li class="<?php if($this->request->getParam('controller') == 'Users' and in_array($this->request->getParam('action'), array('newUser'))){echo 'active';}else{echo '';} ?>">
	<?php echo $this->Html->link('<span class="pcoded-micon"><i class="ti-new-window"></i></span><span class="pcoded-mtext">Add User </span><span class="pcoded-mcaret"></span> ',array('controller'=>'users','action'=>'newUser'),array('escape'=>false)); ?>
	</li>

	<li class="<?php if($this->request->getParam('controller') == 'Users' and in_array($this->request->getParam('action'), array('index'))){echo 'active';}else{echo '';} ?>">
	<?php echo $this->Html->link('<span class="pcoded-micon"><i class="ti-user"></i></span><span class="pcoded-mtext">Users </span><span class="pcoded-mcaret"></span> ',array('controller'=>'users','action'=>'index'),array('escape'=>false)); ?>
	</li>
	<?php } ?>

	</ul>
<?php } ?>
</div>
</nav>