<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Besar Kas
      <small>Besar Kas</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('kas');?>"><i class="fa fa-money"></i> Besar Kas</a></li>
      <!--<li class="active">Here</li>-->
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div class="col-md-12">
      <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Data Besar Kas</h3>

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
            
            <a href="<?php echo base_url('kas/addData');?>" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add Data</a> 
            <br /><br />

            <div class="table-responsive">
            <?php 
              if($kas!=null){ ?>
                <table id="table" class="table table-striped table-bordered table-hover" style="width: 50%;">
            <?php } else{ ?>
                <table class="table table-striped table-bordered table-hover" style="width: 50%;">
            <?php } ?>
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Besar Kas</th>
                          <th>Tahun Pengurus</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $no = 1;
                  if($kas!=null){
                    foreach($kas as $k){                  
                  ?>
                  <tr>
                      <td><?php echo $no++; ?></td>
                      <td class="text-right" style="padding-right:20px;"><?php echo 'Rp '.$k->besar.' ,-'; ?></td>
                      <td class="text-center"><?php echo $k->tahun_pengurus; ?></td>
                      
                      <td style="text-align: center;">
                          <a class='btn btn-info btn-xs' href="<?php echo base_url('kas/editData/'.$k->id); ?>"><i class="glyphicon glyphicon-edit"></i> </a>
                          <a class='btn btn-danger btn-xs' href="#" onclick="functionDelete('<?php echo base_url('kas/deleteData/'.$k->id); ?>')"><i class="glyphicon glyphicon-trash"></i> </a>
            
                      </td>
                  </tr>
                  <?php } 
                    } else { ?>
                    <tr>
                      <td class="text-center" colspan="4"><i>Tidak Ada Data</i></td>
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