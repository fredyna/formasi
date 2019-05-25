<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Kelola Alumni
      <small>Kelola Alumni</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('alumni');?>"><i class="fa fa-graduation-cap"></i> Kelola Alumni</a></li>
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

            <a href="<?php echo base_url('alumni/addData');?>" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add Data</a> <br/><br/>

            <div class="row">
                <label class="col-sm-3 control-label">Filter Berdasarkan Tahun</label>
                <div class="col-sm-4">
                    <select id="filtertahun" class="form-control">
                        <option value="" style="display:none;">-- Pilih Tahun Angkatan --</option>
                        <?php 
                            if(isset($tahun) && $tahun > 0){
                                foreach($tahun as $t){ ?>
                                    <option value="<?php echo $t->tahun; ?>" <?php echo $t->tahun == $tahun_aktif ? 'selected':''; ?>><?php echo $t->tahun; ?></option>
                        <?php  }
                            }
                        ?>
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

    <?php if(isset($alumni)) { ?>
        <div id="data-alumni" class="col-md-12">
    <?php } else { ?>
        <div id="data-alumni" class="col-md-12" style="display:none;">
    <?php } ?>
    
      <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Data Alumni</h3>

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
            
            
            <?php if(isset($alumni) && count($alumni) > 0) { ?>
                &nbsp;<button id="print" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Print</button>
                <br /><br />
            <?php } ?>

            <div class="table-responsive">
            <?php if(isset($alumni)) { ?>
                <table id="tablealumni" width="100%" class="table table-striped table-bordered table-hover">
            <?php } else{ ?>
                <table width="100%" class="table table-striped table-bordered table-hover">
            <?php } ?>
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Jenis Kelamin</th>
                          <th>No HP</th>
                          <th>Pekerjaan</th>
                          <th>Angkatan</th>
                          <th>Alamat</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php 
                        $no = 1;
                        if(isset($alumni) && count($alumni) > 0){
                            foreach($alumni as $d){ ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d->nama; ?></td>
                            <td><?php echo $d->jenis_kelamin; ?></td>
                            <td><?php echo $d->no_hp; ?></td>
                            <td><?php echo $d->pekerjaan; ?></td>
                            <td><?php echo $d->tahun; ?></td>
                            <td><?php echo $d->alamat; ?></td>
                            <td class="text-center">
                                <a href="<?php echo base_url('alumni/editData/'.$d->id.'/'.$tahun_aktif.'/1'); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                <a href="javascript:void(0)" onclick="functionDelete('<?php echo base_url('alumni/deleteData/'.$d->id.'/'.$tahun_aktif.'/1'); ?>')"class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>

                    <?php }
                        } else{ ?>
                        <tr>
                            <td class="text-center" colspan="8">
                                <i>Tidak Ada Data</i>
                            </td>
                        </tr>
                    <?php }
                    ?>
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
        var tahun = $("#filtertahun").val();
        var BASE_URL = "<?php echo base_url();?>";

        $("#cari").click(function(){
          tahun = $("#filtertahun").val();
          location.href = BASE_URL+"alumni/index/"+tahun;
        });

        $("#print").click(function(){
          var thn = $("#filtertahun").val();
          window.open(BASE_URL+"alumni/printData/"+thn);
        });
    });
</script>