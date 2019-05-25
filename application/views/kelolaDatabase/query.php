<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Kelola Database
      <small>Kelola Database</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('kelolaDatabase');?>"><i class="fa fa-database"></i> Kelola Database</a></li>
      <!--<li class="active">Here</li>-->
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div class="col-md-12">
      <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">SQL</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <?php if($this->session->flashdata('info-success')){ ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('info-success'); ?>
                </div>
            <?php } ?>

            <?php if($this->session->flashdata('info-fail')){ ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('info-fail'); ?>
                </div>
            <?php } ?>

            <?php
                $name = array(
                    'name'=>'addData',
                    'class'=>'form-horizontal'
                    );  
                echo form_open('kelolaDatabase/sql/',$name);
            ?>

              <div class="form-group">
                <label for="sql" class="col-sm-3 control-label">SQL</label>
                <div class="col-sm-9">
                  <textarea name="sql" class="form-control" placeholder="Masukan Query" style="height:200px;"><?php echo set_value('sql');?></textarea>
                  <?php echo form_error('query');?>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-4">
                  <button type="submit" name="submit" value="submit" class="btn btn-success"></i> Go</button>
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