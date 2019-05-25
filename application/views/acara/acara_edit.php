<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Kelola Acara
      <small>Edit Acara</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('acara');?>"><i class="fa fa-hourglass-half"></i> Kelola Acara</a></li>
      <!--<li class="active">Here</li>-->
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div class="col-md-12">
      <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Acara</h3>

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
                    'name'=>'editData',
                    'class'=>'form-horizontal'
                    );  
                echo form_open('acara/editData/'.$acara->id,$name);
            ?>

              <div class="form-group">
                <label for="nama" class="col-sm-3 control-label">Nama Acara</label>
                <div class="col-sm-9">
                  <input type="text" name="nama" value="<?php echo $acara->nama_acara;?>" class="form-control" placeholder="Nama Acara">
                  <?php echo form_error('nama');?>
                </div>
              </div>

              <div class="form-group">
                <label for="kategori" class="col-sm-3 control-label">Kategori</label>
                <div class="col-sm-6">
                  <select name="kategori" class="form-control">
                    <option value="1" <?php echo $acara->kategori == 1 ? 'selected':''?>>Umum</option>
                    <option value="2" <?php echo $acara->kategori == 2 ? 'selected':''?>>Mahasiswa</option>
                    <option value="3" <?php echo $acara->kategori == 3 ? 'selected':''?>>Umum & Mahasiswa</option>
                  </select>
                  <?php echo form_error('kategori');?>
                </div>
              </div>

              <div class="form-group">
                <label for="date" class="col-sm-3 control-label">Date</label>
                <div class="col-sm-9">
                  <?php $tgl = date('d-m-Y',strtotime($acara->tanggal));?>
                  <input type="text" name="date" value="<?php echo $tgl;?>" class="form-control" placeholder="dd-mm-yyyy">
                  <?php echo form_error('date');?>
                  <p style="color:#000;">Note : tgl-bln-thn</p>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-4">
                  <a href="<?php echo base_url('acara')?>" class="btn btn-info"><i class="fa fa-arrow-left"></i> Back</a>
                  <button type="submit" name="submit" value="submit" class="btn btn-success"><i class="fa fa-pencil"></i> Update</button>
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