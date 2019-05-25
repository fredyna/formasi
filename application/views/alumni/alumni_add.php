<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Kelola Alumni
      <small>Add Alumni</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('pengurus');?>"><i class="fa fa-retweet"></i> Kelola Alumni</a></li>
      <!--<li class="active">Here</li>-->
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div class="col-md-12">
      <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Add Alumni</h3>

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
                echo form_open('alumni/addData/',$name);
            ?>

              <input type="hidden" name="status" value="1" class="form-control">

              <div class="form-group">
                <label for="nama" class="col-sm-3 control-label">Nama</label>
                <div class="col-sm-6">
                  <input type="text" name="nama" value="<?php echo set_value('nama');?>" class="form-control" placeholder="Nama Lengkap">
                  <?php echo form_error('nama');?>
                </div>
              </div>

              <div class="form-group">
                <label for="jenis_kelamin" class="col-sm-3 control-label">Jenis Kelamin</label>
                <div class="col-sm-6">
                  <select name="jenis_kelamin" class="form-control">
                    <option value="" style="display: none;">-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                  <?php echo form_error('jenis_kelamin');?>
                </div>
              </div>

              <div class="form-group">
                <label for="no_hp" class="col-sm-3 control-label">No HP</label>
                <div class="col-sm-6">
                  <input type="text" name="no_hp" value="<?php echo set_value('no_hp');?>" class="form-control" placeholder="Nomor HP">
                  <?php echo form_error('no_hp');?>
                </div>
              </div>

              <div class="form-group">
                <label for="pekerjaan" class="col-sm-3 control-label">Pekerjaan</label>
                <div class="col-sm-6">
                  <input type="text" name="pekerjaan" value="<?php echo set_value('pekerjaan');?>" class="form-control" placeholder="Pekerjaan">
                  <?php echo form_error('pekerjaan');?>
                </div>
              </div>

              <div class="form-group">
                <label for="tahun" class="col-sm-3 control-label">Tahun Menjabat</label>
                <div class="col-sm-6">
                  <select name="tahun" class="form-control">
                    <option value="" style="display: none;">-- Pilih Tahun --</option>
                    <?php 
                      $thn = date('Y');
                      for($i=2007;$i<=2050;$i++){ ?>
                      <option value="<?php echo $i;?>" <?php echo $i==$thn ? 'selected':'';?>><?php echo $i;?></option>
                    <?php  } ?>
                  </select>
                  <?php echo form_error('tahun');?>
                </div>
              </div>

              <div class="form-group">
                <label for="alamat" class="col-sm-3 control-label">Alamat</label>
                <div class="col-sm-6">
                  <textarea name="alamat" placeholder="Alamat" class="form-control"><?php echo set_value('alamat');?></textarea>
                  <?php echo form_error('alamat');?>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-4">
                  <a href="<?php echo base_url('alumni')?>" class="btn btn-info"><i class="fa fa-arrow-left"></i> Back</a>
                  <button type="submit" name="submit" value="submit" class="btn btn-success"><i class="fa fa-plus"></i> Add</button>
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