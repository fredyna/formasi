<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Kelola Pengurus
      <small>Kelola Pengurus</small>
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
            <h3 class="box-title">Data Pengurus</h3>

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
            <div>
              <label class="col-sm-3 control-label">Filter Berdasarkan Tahun</label>
              <select id="filtertahun">
                <option value="">All</option>
                <?php 
                  $thn = date('Y');
                  for($i=2007;$i<=2050;$i++){ ?>
                  <option value="<?php echo $i;?>" <?php echo $i==$thn ? 'selected':'';?>><?php echo $i;?></option>
                <?php  } ?>
              </select>
            </div>
            <br>
            <a href="<?php echo base_url('pengurus/addData');?>" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add Data</a> 
            &nbsp;<button id="print" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Print</button>
            <br /><br />

            <div class="table-responsive">
            <table width="100%" class="table table-striped table-bordered table-hover" id="tablepengurus">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>NIM</th>
                          <th>Nama</th>
                          <th>Kelas</th>
                          <th>Prodi</th>
                          <th>Jenis Kelamin</th>
                          <th>No Hp</th>
                          <th>Jabatan</th>
                          <th>TTL</th>
                          <th>Alamat</th>
                          <th>Tahun</th>
                          <th>Action</th>
                      </tr>
                       
                  </thead>
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

      $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
        {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };

        var no = 1;

        var t = $("#tablepengurus").DataTable({

            
            oLanguage: {
                sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,
            ajax: {
              "url": BASE_URL+"pengurus/pengurusJson/"+tahun, 
              "type": "POST"
            },
            columns: [
                {"data": "id"},
                {"data": "nim"},
                {"data": "nama"},
                {"data": "kelas"},
                {"data": "prodi"},
                {"data": "jenis_kelamin"},
                {"data": "no_hp"},
                {"data": "jabatan"},
                {"data": "ttl"},
                {"data": "alamat"},
                {"data": "tahun"},
                {
                  "data": "action",
                  "orderable" : false
                }
            ],
            order: [0, 'asc'],
            dom: 'lBfrtip',  
            buttons: [  
              'excel'  
            ],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
        });

        $("#filtertahun").change(function(e){
          e.preventDefault();
          tahun = $("#filtertahun").val();
          t.ajax.url(BASE_URL+"pengurus/pengurusJson/"+tahun).load(null,false);
        });

        $("#print").click(function(){
          var thn = $("#filtertahun").val();
          window.open(BASE_URL+"pengurus/printData/"+thn);
        });
    });
</script>