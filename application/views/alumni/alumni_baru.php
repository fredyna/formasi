<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Kelola Alumni
      <small>Kelola Data Alumni Baru</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('alumni');?>"><i class="fa fa-graduation-cap"></i> Kelola Alumni</a></li>
      <!--<li class="active">Here</li>-->
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div id="data-alumni" class="col-md-12">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Data Alumni Baru</h3>

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
            <?php } else { ?>
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
                                <a href="javascript:void(0)" class="btn btn-success btn-xs" onclick="konfirmasi('<?php echo $d->id; ?>')">Confirm</a>
                                <a href="<?php echo base_url('alumni/editData/'.$d->id).'/'.null.'/0'; ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                <a href="javascript:void(0)" onclick="functionDelete('<?php echo base_url('alumni/deleteData/'.$d->id.'/'.null.'/0'); ?>')"class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
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
    var BASE_URL = "<?php echo base_url();?>";

    function konfirmasi(id){
        var r = confirm("Are you sure to confirm?");
        if (r == true) {
            location.href = BASE_URL+"alumni/confirmData/"+id;
        }
    }

    $(document).ready(function(){
        var tahun = $("#filtertahun").val();

        $("#print").click(function(){
          var thn = $("#filtertahun").val();
          window.open(BASE_URL+"alumni/printData/"+thn);
        });
    });
</script>