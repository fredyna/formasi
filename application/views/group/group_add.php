<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Kelola Group
      <small>Create Group</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('group');?>"><i class="fa fa-group"></i> Kelola Group</a></li>
      <!--<li class="active">Here</li>-->
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div class="col-md-12">
      <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Create Group</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
             <?php if($this->session->flashdata('info')){ ?>
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('info'); ?>
                </div>
            <?php } ?>

            <?php
                $name = array(
                    'name'=>'addData',
                    'class'=>'form-horizontal'
                    );  
                echo form_open('group/addGroup/',$name);
            ?>
              <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Name</label>
                <div class="col-sm-9">
                  <input type="text" name="group_name" value="<?php echo set_value('group_name');?>" class="form-control" placeholder="Group Name">
                  <?php echo form_error('group_name');?>
                </div>
              </div>

              <div class="form-group">
                <label for="description" class="col-sm-3 control-label">Description</label>
                <div class="col-sm-9">
                  <input type="text" name="group_desc" value="<?php echo set_value('group_desc');?>" class="form-control" placeholder="Group Description">
                  <?php echo form_error('group_desc');?>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-4">
                  <a href="<?php echo base_url('group')?>" class="btn btn-info"><i class="fa fa-arrow-left"></i> Back</a>
                  <button type="submit" name="submit" value="submit" class="btn btn-success"><i class="fa fa-plus"></i> Create</button>
                </div>
              </div>
            </form>

          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.col -->
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->