<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Sistem Formasi" />
  <meta name="keywords" content="Formasi, Mahasiswa, Islam, PHB"/>
  <meta name="author" content="Fredy Nur Apriyanto"/>
  <title>Add Data Peserta</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shortcut icon" href="<?php echo base_url('assets/img/logo-formasi100.png'); ?>" type="image/x-icon">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css');?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/iCheck/square/blue.css');?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <style>
    .login-box{
      width:600px;
    }
    .login-page{
      background:#02a85a;
    }
    .login-box-body, .register-box-body{
      box-shadow: 5px 5px 10px 1px rgba(0, 0, 0, 0.5);
    }
    .form-group p{
      color:#ff0000;
    }

    @media only screen and (max-width: 768px) {
      /* For mobile phones: */
      .login-box{
        width:300px;
      }
    }
  </style>
</head>
<body class="hold-transition login-page" style="height:0%;">
<div class="login-box" style="margin-top:10%;">
  <!-- /.login-logo -->
  <div class="login-box-body">
    <div class="login-logo">
      <img src="<?php echo base_url('assets/img/logo-formasi.png');?>" alt="Logo Formasi" style="width:150px;display: inline-block;margin: auto;">
      <h2><a href="<?php echo base_url('auth');?>">Forum Mahasiswa Islam</a></h2>
      
    </div>
    <p class="login-box-msg">Silahkan Isi Data Peserta Kajian Fiqih Wanita</p>
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
        echo form_open('front/addDataPeserta/',$name);
    ?>

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

      <!--<div class="form-group">
        <label for="jenis_kelamin" class="col-sm-3 control-label">Jenis Kelamin</label>
        <div class="col-sm-9">
          <select name="jenis_kelamin" class="form-control">
            <option value="" style="display: none;">-- Pilih Jenis Kelamin --</option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</otpion>
          </select>
          <?php //echo form_error('jenis_kelamin');?>
        </div>
      </div>-->

      <div class="form-group">
        <label for="no_hp" class="col-sm-3 control-label">No HP</label>
        <div class="col-sm-9">
          <input type="text" name="no_hp" value="<?php echo set_value('no_hp');?>" class="form-control" placeholder="Nomor HP">
          <?php echo form_error('no_hp');?>
        </div>
      </div>

      <div class="form-group">
        <label for="acara" class="col-sm-3 control-label">Acara</label>
        <div class="col-sm-9">
          <select name="acara" class="form-control">
            <option value="" style="display: none;">-- Pilih Acara --</option>
            <?php foreach($acara as $a) { ?>
              <option value="<?php echo $a->id;?>" <?php echo $a->nama_acara=='Kajian Fiqih Wanita' ? 'selected':'disabled';?>><?php echo $a->nama_acara;?></option>
            <?php  } ?>
          </select>
          <?php echo form_error('acara');?>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-4">
          <button type="submit" name="submit" value="submit" class="btn btn-success"><i class="fa fa-plus"></i> Daftar</button>
        </div>
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
  <p class="text-center" style="color:#f1f1f1;margin-top:20px;">Copyright &copy; 2018 Developed by Fredd</p>
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/jquery/jquery.min.js');?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js');?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/iCheck/icheck.min.js');?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
