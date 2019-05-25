<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Kelola Peserta
      <small>Kelola Peserta</small>
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
            <h3 class="box-title">Action</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

            <div class="row">
                <label class="col-sm-3 control-label">Filter Berdasarkan Acara</label>
                <div class="col-sm-4">
                    <select id="filteracara" class="form-control">
                      <option value="" <?php echo $id_acara==''?'selected':'';?>>-- Pilih Acara --</option>
                        <?php 
                          if($acara!=null){
                            foreach($acara as $a){ ?>
                          <option value="<?php echo $a->id;?>" <?php echo $id_acara==$a->id ? 'selected':'';?>><?php echo $a->nama_acara;?></option>
                        <?php  } 
                          } ?>
                    </select>
                </div>
                <div class="col-sm-4">
                    <button id="cari" class="btn btn-info"><i class="fa fa-search"></i> Cari</button>
                </div>
            </div>
                  
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.col -->
    </div>
    <?php if(isset($peserta)){ ?>
      <div class="col-md-12">
    <?php } else { ?>
      <div class="col-md-12" style="display:none;">
    <?php } ?>
      <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Data Peserta</h3>

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

            &nbsp;<button id="print" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Print</button>
            <br /><br />

            <div class="table-responsive">
            <?php 
              if($peserta!=null){ ?>
                <table id="tablepeserta" width="100%" class="table table-striped table-bordered table-hover">
            <?php } else{ ?>
                <table width="100%" class="table table-striped table-bordered table-hover">
            <?php } ?>
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>NIM</th>
                          <th>Nama</th>
                          <th>Prodi</th>
                          <th>Kelas</th>
                          <th>Jenis Kelamin</th>
                          <th>No Hp</th>
                          <th>Acara</th>
                          <th>Alamat</th>
                          <th>Kategori</th>
                          <?php 
                            if($id_acara==4){
                              echo "<th>Pengalaman Organisasi</th>";
                            }
                          ?>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $no = 1;
                  if(isset($peserta) && count($peserta) > 0){
                    foreach($peserta as $p){                  
                  ?>
                  <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $p->nim;?></td>
                      <td><?php echo $p->nama_peserta;?></td>
                      <td><?php echo $p->prodi!=''? $p->prodi:'-';?></td>
                      <td><?php echo $p->kelas!=''? $p->kelas:'-';?></td>
                      <td><?php echo $p->jenis_kelamin;?></td>
                      <td><?php echo $p->no_hp;?></td>
                      <td><?php echo $p->nama_acara;?></td>
                      <td><?php echo $p->alamat;?></td>
                      <td><?php echo $p->kategori;?></td>
                      <?php 
                        if($id_acara==4){
                          echo "<td>" . $p->pengalaman_organisasi . "</td>";
                        }
                      ?>
                      <td style="text-align: center;">
                          <!-- <a class='btn btn-info btn-xs' href="<?php //echo base_url('peserta/editData/'.$p->nim); ?>"><i class="glyphicon glyphicon-edit"></i> </a> -->
                          <a class='btn btn-danger btn-xs' href="#" onclick="functionDelete('<?php echo base_url('peserta/deleteData/'.$p->nim.'/'.$id_acara); ?>')"><i class="glyphicon glyphicon-trash"></i> </a>
                      </td>
                  </tr>
                  <?php } 
                    } else { ?>
                    <tr>
                      <td class="text-center" colspan="11"><i>Tidak Ada Data</i></td>
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
  $(document).ready(function(){
    var BASE_URL = "<?php echo base_url();?>";
    $("#cari").click(function(){
      acara = $("#filteracara").val();
      location.href = BASE_URL+"peserta/index/"+acara;
    });

    $("#print").click(function(){
      var acara = $("#filteracara").val();
      window.open(BASE_URL+"peserta/printData/"+acara);
    });

    $('#tablepeserta').DataTable({
        responsive: true,
        dom: 'lBfrtip',  
        buttons: [  
          'excel', 'pdf'  
        ]
    });
  });
</script>