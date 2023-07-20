<nav class="navbar header-navbar pcoded-header">
<div class="navbar-wrapper">
<div class="navbar-logo">
<a class="mobile-menu" id="mobile-collapse" href="#!">
<i class="ti-menu"></i>
</a>
<div class="mobile-search">
<div class="header-search">
<div class="main-search morphsearch-search">
<div class="input-group">
<span class="input-group-addon search-close"><i class="ti-close"></i></span>
<input type="text" class="form-control" placeholder="Enter Keyword">
<span class="input-group-addon search-btn"><i class="ti-search"></i></span>
</div>
</div>
</div>
</div>
<a href="index.html">
<!-- <img class="img-fluid" src="../files/assets/images/logo.png" alt="Theme-Logo" /> -->
<?php //echo $this->Html->image('images/logo.png',array('alt'=>'Theme-Logo')); ?>
PaySuccess App
</a>
<a class="mobile-options">
<i class="ti-more"></i>
</a>
</div>
<div class="navbar-container container-fluid">
<ul class="nav-left">
<li>
<div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
</li>
<li class="header-search">
<!-- <div class="main-search morphsearch-search">
<div class="input-group">
<span class="input-group-addon search-close"><i class="ti-close"></i></span>
<input type="text" class="form-control">
<span class="input-group-addon search-btn"><i class="ti-search"></i></span>
</div>
</div> -->
</li>
<li>
<a href="#!" onClick="javascript:toggleFullScreen()">
<i class="ti-fullscreen"></i>
</a>
</li>
</ul>

<?php if(isset($sess_data)){ ?>
<ul class="nav-right">


<li class="user-profile header-notification">
<a href="#!">
<!-- <img src="../files/assets/images/avatar-4.jpg" class="img-radius" alt="User-Profile-Image"> -->
<?php echo $this->Html->image('https://img.icons8.com/officel/16/000000/user.png',array('alt'=>'ser-Profile-Image','class'=>'img-radius')); ?>
<span><?php echo $sess_data['name']; ?></span>
<i class="ti-angle-down"></i>
</a>
<ul class="show-notification profile-notification">
<li>
<a href="#!">
<i class="ti-user"></i> <?php echo $list_usergroups[$sess_data['usergroup_id']]; ?>
</a>
</li>

<li>
<?php echo $this->Html->link('<i class="ti-layout-sidebar-left"></i> Logout ',array('controller'=>'users','action'=>'logout'),array('escape'=>false)); ?>
</li>
</ul>
</li>
</ul>
<?php } ?>
</div>
</div>
</nav>