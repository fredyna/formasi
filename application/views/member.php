<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Siswa
      <small>Daftar Siswa</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('admin/member');?>"><i class="fa fa-users"></i> Siswa</a></li>
      <li class="active">Daftar Siswa</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div class="col-md-12">
      <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Data Siswa</h3>

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

            <a href="<?php echo base_url('admin/addMember');?>" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Data</a> 
            <br /><br />

            <div class="table-responsive">
            <?php if($member!=null){?>
              <table width="100%" class="table table-striped table-bordered table-hover" id="table">
            <?php } else { ?>
              <table width="100%" class="table table-striped table-bordered table-hover">
            <?php } ?>
              
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Kelas</th>
                          <th>Jenis Kelamin</th>
                          <th>Alamat</th>
                          <th>Aksi</th>
                      </tr>
                       
                  </thead>
                  <tbody>
                  <?php 
                  $no = 1;
                  if($member!=null){
                    foreach($member as $m){                  
                  ?>
                  <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $m->nama; ?></td>
                      <td><?php echo $m->kelas; ?></td>
                      <td><?php echo $m->jenis_kelamin; ?></td>
                      <td><?php echo $m->alamat; ?></td>
                      <td style="text-align: center;">
                          <a class='btn btn-info btn-xs' href="<?php echo base_url('admin/editMember/'.$m->nis); ?>" class=""><i class="glyphicon glyphicon-edit"></i> </a>
                          <a class='btn btn-danger btn-xs' href="#" onclick="functionDelete('<?php echo base_url('admin/memberDelete/'.$m->nis); ?>')" class=""><i class="glyphicon glyphicon-trash"></i> </a>
            
                      </td>
                  </tr>
                  <?php } 
                    } else { ?>
                    <tr>
                      <td class="text-center" colspan="6"><i>Tidak Ada Data</i></td>
                    </tr>
                  <?php } ?>
                  </tbody>
              </table>
            </div>             
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.col -->
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

