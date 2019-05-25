<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Kelola Pengurus
      <small>Edit Pengurus</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('pengurus');?>"><i class="fa fa-retweet"></i> Kelola Pengurus</a></li>
      <!--<li class="active">Here</li>-->
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div class="col-md-12">
      <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Pengurus</h3>

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
                echo form_open('pengurus/editData/'.$pengurus->id,$name);
            ?>

              <div class="form-group">
                <label for="nim" class="col-sm-3 control-label">NIM</label>
                <div class="col-sm-9">
                  <input type="text" name="nim" value="<?php echo $pengurus->nim;?>" class="form-control" placeholder="NIM">
                  <?php echo form_error('nim');?>
                </div>
              </div>

              <div class="form-group">
                <label for="nama" class="col-sm-3 control-label">Nama</label>
                <div class="col-sm-9">
                  <input type="text" name="nama" value="<?php echo $pengurus->nama;?>" class="form-control" placeholder="Nama Lengkap">
                  <?php echo form_error('nama');?>
                </div>
              </div>

              <div class="form-group">
                <label for="prodi" class="col-sm-3 control-label">Prodi</label>
                <div class="col-sm-9">
                  <select name="prodi" class="form-control">
                    <option value="" style="display: none;">-- Pilih Prodi --</option>
                    <option value="D4 Teknik Informatika" <?php echo $pengurus->prodi=='D4 Teknik Informatika' ? 'selected':'';?>>D4 Teknik Informatika</option>
                    <option value="D3 Kebidanan" <?php echo $pengurus->prodi=='D3 Kebidanan' ? 'selected':'';?>>D3 Kebidanan</option>
                    <option value="D3 Farmasi" <?php echo $pengurus->prodi=='D3 Farmasi' ? 'selected':'';?>>D3 Farmasi</option>
                    <option value="D3 Akuntansi" <?php echo $pengurus->prodi=='D3 Akuntansi' ? 'selected':'';?>>D3 Akuntansi</option>
                    <option value="D3 Komputer" <?php echo $pengurus->prodi=='D3 Komputer' ? 'selected':'';?>>D3 Komputer</option>
                    <option value="D3 Teknik Mesin" <?php echo $pengurus->prodi=='D3 Teknik Mesin' ? 'selected':'';?>>D3 Teknik Mesin</option>
                    <option value="D3 Teknik Elektro" <?php echo $pengurus->prodi=='D3 Teknik Elektro' ? 'selected':'';?>>D3 Teknik Elektro</option>
                  </select>
                  <?php echo form_error('prodi');?>
                </div>
              </div>

              <div class="form-group">
                <label for="kelas" class="col-sm-3 control-label">Kelas</label>
                <div class="col-sm-9">
                  <input type="text" name="kelas" value="<?php echo $pengurus->kelas;?>" class="form-control" placeholder="Kelas">
                  <?php echo form_error('kelas');?>
                </div>
              </div>

              <div class="form-group">
                <label for="jenis_kelamin" class="col-sm-3 control-label">Jenis Kelamin</label>
                <div class="col-sm-9">
                  <select name="jenis_kelamin" class="form-control">
                    <option value="" style="display: none;">-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-Laki" <?php echo $pengurus->jenis_kelamin == 'Laki-Laki' ? 'selected':'';?>>Laki-Laki</option>
                    <option value="Perempuan" <?php echo $pengurus->jenis_kelamin == 'Perempuan' ? 'selected':'';?>>Perempuan</option>
                  </select>
                  <?php echo form_error('jenis_kelamin');?>
                </div>
              </div>

              <div class="form-group">
                <label for="no_hp" class="col-sm-3 control-label">No HP</label>
                <div class="col-sm-9">
                  <input type="text" name="no_hp" value="<?php echo $pengurus->no_hp;?>" class="form-control" placeholder="Nomor HP">
                  <?php echo form_error('no_hp');?>
                </div>
              </div>

              <div class="form-group">
                <label for="tahun" class="col-sm-3 control-label">Tahun</label>
                <div class="col-sm-9">
                  <select name="tahun" class="form-control">
                    <option value="" style="display: none;">-- Pilih Tahun --</option>
                    <?php 
                      for($i=2007;$i<=2050;$i++){ ?>
                      <option value="<?php echo $i;?>" <?php echo $i==$pengurus->tahun ? 'selected':'';?>><?php echo $i;?></option>
                    <?php  } ?>
                  </select>
                  <?php echo form_error('tahun');?>
                </div>
              </div>

              <div class="form-group">
                <label for="jabatan" class="col-sm-3 control-label">Jabatan</label>
                <div class="col-sm-9">
                  <input type="text" name="jabatan" value="<?php echo $pengurus->jabatan;?>" class="form-control" placeholder="Jabatan">
                  <?php echo form_error('jabatan');?>
                </div>
              </div>

              <div class="form-group">
                <label for="tempat_lahir" class="col-sm-3 control-label">TTL</label>
                <div class="col-sm-4">
                  <input type="text" name="tempat_lahir" value="<?php echo $pengurus->tempat_lahir;?>" class="form-control" placeholder="Tempat Lahir">
                  <?php echo form_error('tempat_lahir');?>
                </div>

                <div class="col-sm-5">
                  <?php $tgl = date('m/d/Y',strtotime($pengurus->tanggal_lahir));?>
                  <input type="text" name="tanggal_lahir" value="<?php echo $tgl;?>" class="form-control" placeholder="bulan/tanggal/tahun">
                  <span style="display: block;">bulan/tanggal/tahun | contoh : 12/01/2000</span>
                  <?php echo form_error('tanggal_lahir');?>
                </div>
              </div>

              <div class="form-group">
                <label for="alamat" class="col-sm-3 control-label">Alamat</label>
                <div class="col-sm-9">
                  <textarea name="alamat" placeholder="Alamat" class="form-control"><?php echo $pengurus->alamat;?></textarea>
                  <?php echo form_error('alamat');?>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-4">
                  <a href="<?php echo base_url('pengurus')?>" class="btn btn-info"><i class="fa fa-arrow-left"></i> Back</a>
                  <button type="submit" name="submit" value="submit" class="btn btn-success"> Update</button>
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