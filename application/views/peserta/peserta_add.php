<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Kelola Peserta
      <small>Add Peserta</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('peserta');?>"><i class="fa fa-users"></i> Kelola Peserta</a></li>
      <!--<li class="active">Here</li>-->
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div class="col-md-12">
      <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Add Peserta</h3>

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
                echo form_open('peserta/addData/',$name);
            ?>

              <div class="form-group">
                <label for="acara" class="col-sm-3 control-label">Acara</label>
                <div class="col-sm-9">
                  <select name="acara" class="form-control">
                    <option value="" style="display: none;">-- Pilih Acara --</option>
                    <?php 
                      if($acara!=null){
                        foreach($acara as $a){ ?>
                          <option value="<?php echo $a->id;?>"><?php echo $a->nama_acara;?></option>
                    <?php }
                      }
                    ?>
                  </select>
                  <?php echo form_error('prodi');?>
                </div>
              </div>

              <div class="form-group">
                <label for="nim" class="col-sm-3 control-label">NIM</label>
                <div class="col-sm-9">
                  <input type="text" name="nim" value="<?php echo set_value('nim');?>" class="form-control" placeholder="NIM">
                  <?php echo form_error('nim');?>
                </div>
              </div>

              <div class="form-group">
                <label for="nama" class="col-sm-3 control-label">Nama</label>
                <div class="col-sm-9">
                  <input type="text" name="nama" value="<?php echo set_value('nama');?>" class="form-control" placeholder="Nama Lengkap">
                  <?php echo form_error('nama');?>
                </div>
              </div>

              <div class="form-group">
                <label for="prodi" class="col-sm-3 control-label">Prodi</label>
                <div class="col-sm-9">
                  <select name="prodi" class="form-control">
                    <option value="" style="display: none;">-- Pilih Prodi --</option>
                    <option value="D4 Teknik Informatika">D4 Teknik Informatika</option>
                    <option value="D3 Kebidanan">D3 Kebidanan</otpion>
                    <option value="D3 Farmasi">D3 Farmasi</option>
                    <option value="D3 Akuntansi">D3 Akuntansi</option>
                    <option value="D3 Komputer">D3 Komputer</option>
                    <option value="D3 Teknik Mesin">D3 Teknik Mesin</option>
                    <option value="D3 Teknik Elektro">D3 Teknik Elektro</option>
                  </select>
                  <?php echo form_error('prodi');?>
                </div>
              </div>

              <div class="form-group">
                <label for="kelas" class="col-sm-3 control-label">Kelas</label>
                <div class="col-sm-9">
                  <input type="text" name="kelas" value="<?php echo set_value('kelas');?>" class="form-control" placeholder="Kelas">
                  <?php echo form_error('kelas');?>
                </div>
              </div>

              <div class="form-group">
                <label for="jenis_kelamin" class="col-sm-3 control-label">Jenis Kelamin</label>
                <div class="col-sm-9">
                  <select name="jenis_kelamin" class="form-control">
                    <option value="" style="display: none;">-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</otpion>
                  </select>
                  <?php echo form_error('jenis_kelamin');?>
                </div>
              </div>

              <div class="form-group">
                <label for="no_hp" class="col-sm-3 control-label">No HP</label>
                <div class="col-sm-9">
                  <input type="text" name="no_hp" value="<?php echo set_value('no_hp');?>" class="form-control" placeholder="Nomor HP">
                  <?php echo form_error('no_hp');?>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-4">
                  <a href="<?php echo base_url('peserta')?>" class="btn btn-info"><i class="fa fa-arrow-left"></i> Back</a>
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