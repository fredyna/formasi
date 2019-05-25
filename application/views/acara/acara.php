<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Kelola Acara
      <small>Kelola Acara</small>
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
            <h3 class="box-title">Data Acara</h3>

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
            
            <a href="<?php echo base_url('acara/addData');?>" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add Data</a> 
            <br /><br />

            <div class="table-responsive">
            <?php 
              if($acara!=null){ ?>
                <table id="tablealumni" width="100%" class="table table-striped table-bordered table-hover">
            <?php } else{ ?>
                <table width="100%" class="table table-striped table-bordered table-hover">
            <?php } ?>
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Nama Acara</th>
                          <th>Kategori</th>
                          <th>Form</th>
                          <th>Date</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $no = 1;
                  if($acara!=null){
                    foreach($acara as $a){                  
                  ?>
                  <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $a->nama_acara; ?></td>
                      <td>
                        <?php 
                          if($a->kategori == 1){
                            echo 'Umum';
                          } else if($a->kategori == 2){
                            echo 'Mahasiswa';
                          } else{
                            echo 'Umum & Mahasiswa';
                          }
                        ?>
                      </td>
                      <td class="text-center">
                          <a class="btn btn-success btn-xs" href="<?php echo base_url('registrasi/acara/'.$a->id)?>" target="_blank"> Visit</a>
                      </td>
                      <td>
                        <?php 
                          $tgl = date('d-m-Y', strtotime($a->tanggal));
                          echo $tgl; 
                        ?>
                      </td>
                      <td style="text-align: center;">
                          <?php 
                            if($a->status==0){ ?>
                              <button id="<?php echo 'activate'.$a->id;?>" onclick="activate(<?php echo $a->id?>)" class="btn btn-success btn-xs">Activate</button>
                              <button id="<?php echo 'deactivate'.$a->id;?>" onclick="activate(<?php echo $a->id?>)" class="btn btn-danger btn-xs" style="display: none;">Deactivate</button>
                          <?php  } else { ?>
                              <button id="<?php echo 'activate'.$a->id;?>" onclick="activate(<?php echo $a->id?>)" class="btn btn-success btn-xs" style="display: none;">Activate</button>
                              <button id="<?php echo 'deactivate'.$a->id;?>" onclick="activate(<?php echo $a->id?>)" class="btn btn-danger btn-xs">Deactivate</button>
                          <?php } ?>

                          <a class='btn btn-info btn-xs' href="<?php echo base_url('acara/editData/'.$a->id); ?>"><i class="glyphicon glyphicon-edit"></i> </a>
                          <a class='btn btn-danger btn-xs' href="#" onclick="functionDelete('<?php echo base_url('acara/deleteData/'.$a->id); ?>')"><i class="glyphicon glyphicon-trash"></i> </a>
            
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
<script>
  function activate(idacara){
    var y = confirm("Are you sure?");
    if(y == true){
      var BASE_URL = "<?php echo base_url();?>";
      $.ajax({
        type: "POST",
        url: BASE_URL+"acara/changeStatus", 
        data: {id: idacara },
        dataType: "json",
      })
      .done(function(data){
        if(data==1){
          $("#deactivate"+idacara).show();
            $("#activate"+idacara).hide();
        } else if(data==2){
          $("#deactivate"+idacara).hide();
            $("#activate"+idacara).show();
        } else{
          alert("Gagal Ubah Status!");
        }
      })
      .fail(function(jqXHR, textStatus){
        alert("Koneksi Error "+textStatus);
      });
    }
  }

  function activate2(idform){
    var y = confirm("Are you sure?");
    if(y == true){
      var BASE_URL = "<?php echo base_url();?>";
      $.ajax({
        type: "POST",
        url: BASE_URL+"acara/changeStatusForm", 
        data: {id: idform },
        dataType: "json",
      })
      .done(function(data){
        if(data==1){
          $("#deactivate2"+idform).show();
            $("#activate2"+idform).hide();
        } else if(data==2){
          $("#deactivate2"+idform).hide();
            $("#activate2"+idform).show();
        } else{
          alert("Gagal Ubah Status!");
        }
      })
      .fail(function(jqXHR, textStatus){
        alert("Koneksi Error "+textStatus);
      });
    }
  }
</script>