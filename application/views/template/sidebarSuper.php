<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url('assets/img/user.png');?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $user->first_name;?></p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU</li>
      
      <?php 
        switch($menu){
          case 1: ?>
            <li class="active"><a href="<?php echo base_url('superAdmin')?>"><i class="fa fa-home"></i> <span>HOME</span></a></li>
            <li><a href="<?php echo base_url('member')?>"><i class="fa fa-users"></i> <span>KELOLA MEMBER</span></a></li>
            <li><a href="<?php echo base_url('group')?>"><i class="fa fa-group"></i> <span>KELOLA GROUP</span></a></li>
            <?php if($user->id==1){ ?>
              <li><a href="<?php echo base_url('kelolaDatabase')?>"><i class="fa fa-database"></i> <span>KELOLA DATABASE</span></a></li>
            <?php } ?>
            <li><a href="<?php echo base_url('setting')?>"><i class="fa fa-cogs"></i> <span>SETTING</span></a></li>
        <?php break;
          case 2: ?>
            <li><a href="<?php echo base_url('superAdmin')?>"><i class="fa fa-home"></i> <span>HOME</span></a></li>
            <li class="active"><a href="<?php echo base_url('member')?>"><i class="fa fa-users"></i> <span>KELOLA MEMBER</span></a></li>
            <li><a href="<?php echo base_url('group')?>"><i class="fa fa-group"></i> <span>KELOLA GROUP</span></a></li>
            <?php if($user->id==1){ ?>
              <li><a href="<?php echo base_url('kelolaDatabase')?>"><i class="fa fa-database"></i> <span>KELOLA DATABASE</span></a></li>
            <?php } ?>
            <li><a href="<?php echo base_url('setting')?>"><i class="fa fa-cogs"></i> <span>SETTING</span></a></li>
        <?php break;
          case 3: ?>
            <li><a href="<?php echo base_url('superAdmin')?>"><i class="fa fa-home"></i> <span>HOME</span></a></li>
            <li><a href="<?php echo base_url('member')?>"><i class="fa fa-users"></i> <span>KELOLA MEMBER</span></a></li>
            <li class="active"><a href="<?php echo base_url('group')?>"><i class="fa fa-group"></i> <span>KELOLA GROUP</span></a></li>
            <?php if($user->id==1){ ?>
              <li><a href="<?php echo base_url('kelolaDatabase')?>"><i class="fa fa-database"></i> <span>KELOLA DATABASE</span></a></li>
            <?php } ?>
            <li><a href="<?php echo base_url('setting')?>"><i class="fa fa-cogs"></i> <span>SETTING</span></a></li>
        <?php break;
          case 4: ?>
            <li><a href="<?php echo base_url('superAdmin')?>"><i class="fa fa-home"></i> <span>HOME</span></a></li>
            <li><a href="<?php echo base_url('member')?>"><i class="fa fa-users"></i> <span>KELOLA MEMBER</span></a></li>
            <li><a href="<?php echo base_url('group')?>"><i class="fa fa-group"></i><span>KELOLA GROUP</span></a></li>
            <?php if($user->id==1){ ?>
              <li><a href="<?php echo base_url('kelolaDatabase')?>"><i class="fa fa-database"></i> <span>KELOLA DATABASE</span></a></li>
            <?php } ?>
            <li class="active"><a href="<?php echo base_url('setting')?>"><i class="fa fa-cogs"></i> <span>SETTING</span></a></li>
        <?php break;
          case 5: ?>
            <li><a href="<?php echo base_url('superAdmin')?>"><i class="fa fa-home"></i> <span>HOME</span></a></li>
            <li><a href="<?php echo base_url('member')?>"><i class="fa fa-users"></i> <span>KELOLA MEMBER</span></a></li>
            <li><a href="<?php echo base_url('group')?>"><i class="fa fa-group"></i><span>KELOLA GROUP</span></a></li>
            <?php if($user->id==1){ ?>
              <li class="active"><a href="<?php echo base_url('kelolaDatabase')?>"><i class="fa fa-database"></i> <span>KELOLA DATABASE</span></a></li>
            <?php } ?>
            <li><a href="<?php echo base_url('setting')?>"><i class="fa fa-cogs"></i> <span>SETTING</span></a></li>
        <?php break;
        }
      ?>
      
      <li><a href="<?php echo base_url('auth/logout');?>"><i class="fa fa-sign-out"></i> <span>KELUAR</span></a></li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>