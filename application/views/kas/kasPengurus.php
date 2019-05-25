<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Kelola Kas
      <small>Kelola Kas</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('kelolaKas');?>"><i class="fa fa-cubics"></i> Kelola Kas</a></li>
      <!--<li class="active">Here</li>-->
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div class="col-md-12">
      <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Data Kas Pengurus</h3>

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
                <option value="" style="display:none;">- Tahun -</option>
                <?php 
                  if($kas!=null){
                    foreach($kas as $k){ ?>
                    <option value="<?php echo $k->id;?>" <?php echo $k->id==$kas_aktif->id ? 'selected':'';?>><?php echo $k->tahun_pengurus;?></option>
                <?php } 
                  } ?>
              </select>
            </div>
            <br>
            <button id="print" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Print</button>
            <br /><br />
            <table>
              <tr>
                <td class="col-sm-3">Jumlah Pengurus</td>
                <td class="col-sm-1 text-center">:</td>
                <td>
                  <?php 
                    if(isset($count) && $count!=null){
                      echo $count->jumlah;
                    }
                  ?>
                </td>
              </tr>
              <tr>
                <td class="col-sm-3">Total Kas</td>
                <td class="col-sm-1 text-center">:</td>
                <td id="total">
                  <?php 
                    if(isset($count) && $count!=null){
                      $total = $count->total * $kas_aktif->besar;
                      echo 'Rp '.$total.' ,-';
                    }
                  ?>
                </td>
                <input type="hidden" id="inputtotal" value="<?php echo isset($count) ? $total:'';?>">
              </tr>
            </table>
            <br>

            <div class="table-responsive">
            <table width="100%" class="table table-striped table-bordered table-hover" id="tablepengurus">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th class="text-center">1</th>
                          <th class="text-center">2</th>
                          <th class="text-center">3</th>
                          <th class="text-center">4</th>
                          <th class="text-center">5</th>
                          <th class="text-center">6</th>
                          <th class="text-center">7</th>
                          <th class="text-center">8</th>
                          <th class="text-center">9</th>
                          <th class="text-center">10</th>
                          <th class="text-center">11</th>
                          <th class="text-center">12</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php 
                      if($kas_pengurus!=null){ 
                        $no=1;
                        foreach($kas_pengurus as $k){ ?>
                        <tr>
                          <td><?php echo $no++;?></td>
                          <td><?php echo $k->nama;?></td>
                          <td class="text-center">
                            <?php 
                              if($k->bulan1==0){ ?>
                                <button id="<?php echo 'setor1'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(1,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-warning btn-xs"><i class="fa fa-close"></i></button>
                                <button id="<?php echo 'batal1'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(1,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-success btn-xs" style="display: none;"><i class="fa fa-check"></i></button>
                            <?php } else{ ?>
                                <button id="<?php echo 'setor1'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(1,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-warning btn-xs" style="display: none;"><i class="fa fa-close"></i></button>
                                <button id="<?php echo 'batal1'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(1,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                            <?php }
                            ?>
                          </td>

                          <td class="text-center">
                            <?php 
                              if($k->bulan2==0){ ?>
                                <button id="<?php echo 'setor2'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(2,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-warning btn-xs"><i class="fa fa-close"></i></button>
                                <button id="<?php echo 'batal2'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(2,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-success btn-xs" style="display: none;"><i class="fa fa-check"></i></button>
                            <?php } else{ ?>
                                <button id="<?php echo 'setor2'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(2,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-warning btn-xs" style="display: none;"><i class="fa fa-close"></i></button>
                                <button id="<?php echo 'batal2'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(2,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                            <?php }
                            ?>
                          </td>
                          <td class="text-center">
                            <?php 
                              if($k->bulan3==0){ ?>
                                <button id="<?php echo 'setor3'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(3,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-warning btn-xs"><i class="fa fa-close"></i></button>
                                <button id="<?php echo 'batal3'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(3,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-success btn-xs" style="display: none;"><i class="fa fa-check"></i></button>
                            <?php } else{ ?>
                                <button id="<?php echo 'setor3'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(3,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-warning btn-xs" style="display: none;"><i class="fa fa-close"></i></button>
                                <button id="<?php echo 'batal3'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(3,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                            <?php }
                            ?>
                          </td>

                          <td class="text-center">
                            <?php 
                              if($k->bulan4==0){ ?>
                                <button id="<?php echo 'setor4'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(4,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-warning btn-xs"><i class="fa fa-close"></i></button>
                                <button id="<?php echo 'batal4'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(4,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-success btn-xs" style="display: none;"><i class="fa fa-check"></i></button>
                            <?php } else{ ?>
                                <button id="<?php echo 'setor4'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(4,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-warning btn-xs" style="display: none;"><i class="fa fa-close"></i></button>
                                <button id="<?php echo 'batal4'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(4,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                            <?php }
                            ?>
                          </td>

                          <td class="text-center">
                            <?php 
                              if($k->bulan5==0){ ?>
                                <button id="<?php echo 'setor5'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(5,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-warning btn-xs"><i class="fa fa-close"></i></button>
                                <button id="<?php echo 'batal5'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(5,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-success btn-xs" style="display: none;"><i class="fa fa-check"></i></button>
                            <?php } else{ ?>
                                <button id="<?php echo 'setor5'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(5,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-warning btn-xs" style="display: none;"><i class="fa fa-close"></i></button>
                                <button id="<?php echo 'batal5'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(5,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                            <?php }
                            ?>
                          </td>

                          <td class="text-center">
                            <?php 
                              if($k->bulan6==0){ ?>
                                <button id="<?php echo 'setor6'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(6,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-warning btn-xs"><i class="fa fa-close"></i></button>
                                <button id="<?php echo 'batal6'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(6,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-success btn-xs" style="display: none;"><i class="fa fa-check"></i></button>
                            <?php } else{ ?>
                                <button id="<?php echo 'setor6'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(6,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-warning btn-xs" style="display: none;"><i class="fa fa-close"></i></button>
                                <button id="<?php echo 'batal6'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(6,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                            <?php }
                            ?>
                          </td>
                          <td class="text-center">
                            <?php 
                              if($k->bulan7==0){ ?>
                                <button id="<?php echo 'setor7'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(7,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-warning btn-xs"><i class="fa fa-close"></i></button>
                                <button id="<?php echo 'batal7'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(7,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-success btn-xs" style="display: none;"><i class="fa fa-check"></i></button>
                            <?php } else{ ?>
                                <button id="<?php echo 'setor7'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(7,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-warning btn-xs" style="display: none;"><i class="fa fa-close"></i></button>
                                <button id="<?php echo 'batal7'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(7,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                            <?php }
                            ?>
                          </td>

                          <td class="text-center">
                            <?php 
                              if($k->bulan8==0){ ?>
                                <button id="<?php echo 'setor8'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(8,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-warning btn-xs"><i class="fa fa-close"></i></button>
                                <button id="<?php echo 'batal8'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(8,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-success btn-xs" style="display: none;"><i class="fa fa-check"></i></button>
                            <?php } else{ ?>
                                <button id="<?php echo 'setor8'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(8,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-warning btn-xs" style="display: none;"><i class="fa fa-close"></i></button>
                                <button id="<?php echo 'batal8'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(8,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                            <?php }
                            ?>
                          </td>

                          <td class="text-center">
                            <?php 
                              if($k->bulan9==0){ ?>
                                <button id="<?php echo 'setor9'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(9,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-warning btn-xs"><i class="fa fa-close"></i></button>
                                <button id="<?php echo 'batal9'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(9,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-success btn-xs" style="display: none;"><i class="fa fa-check"></i></button>
                            <?php } else{ ?>
                                <button id="<?php echo 'setor9'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(9,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-warning btn-xs" style="display: none;"><i class="fa fa-close"></i></button>
                                <button id="<?php echo 'batal9'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(9,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                            <?php }
                            ?>
                          </td>

                          <td class="text-center">
                            <?php 
                              if($k->bulan10==0){ ?>
                                <button id="<?php echo 'setor10'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(10,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-warning btn-xs"><i class="fa fa-close"></i></button>
                                <button id="<?php echo 'batal10'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(10,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-success btn-xs" style="display: none;"><i class="fa fa-check"></i></button>
                            <?php } else{ ?>
                                <button id="<?php echo 'setor10'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(10,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-warning btn-xs" style="display: none;"><i class="fa fa-close"></i></button>
                                <button id="<?php echo 'batal10'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(10,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                            <?php }
                            ?>
                          </td>

                          <td class="text-center">
                            <?php 
                              if($k->bulan11==0){ ?>
                                <button id="<?php echo 'setor11'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(11,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-warning btn-xs"><i class="fa fa-close"></i></button>
                                <button id="<?php echo 'batal11'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(11,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-success btn-xs" style="display: none;"><i class="fa fa-check"></i></button>
                            <?php } else{ ?>
                                <button id="<?php echo 'setor11'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(11,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-warning btn-xs" style="display: none;"><i class="fa fa-close"></i></button>
                                <button id="<?php echo 'batal11'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(11,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                            <?php }
                            ?>
                          </td>

                          <td class="text-center">
                            <?php 
                              if($k->bulan12==0){ ?>
                                <button id="<?php echo 'setor12'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(12,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-warning btn-xs"><i class="fa fa-close"></i></button>
                                <button id="<?php echo 'batal12'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(12,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-success btn-xs" style="display: none;"><i class="fa fa-check"></i></button>
                            <?php } else{ ?>
                                <button id="<?php echo 'setor12'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(12,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-warning btn-xs" style="display: none;"><i class="fa fa-close"></i></button>
                                <button id="<?php echo 'batal12'.$k->id_kas.$k->id_pengurus;?>" onclick="setor(12,'<?php echo $k->id_kas;?>','<?php echo $k->id_pengurus;?>')" class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                            <?php }
                            ?>
                          </td>
                  <?php }
                    } else { ?>
                    <tr>
                      <td class="text-center" colspan="14"><i>Tidak Ada Data</i></td>
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

    var tahun = $("#filtertahun").val();
    var BASE_URL = "<?php echo base_url();?>";

    $("#filtertahun").change(function(e){
      e.preventDefault();
      tahun = $("#filtertahun").val();
      if(tahun!=''){
        window.location.href = BASE_URL+"kas/kelolaKas/"+tahun;
      }
    });

    $("#print").click(function(){
      var thn = $("#filtertahun").val();
      window.open(BASE_URL+"kas/printData/"+thn);
    });
  });

  function setor(bln, id_kas, id_pengurus){
    var BASE_URL = '<?php echo base_url();?>';
    var total = $("#inputtotal").val();
    var besar = '<?php $kas_aktif->besar?>';
    $.ajax({
      type  : "POST",
      url   : BASE_URL+"kas/setor/"+bln+"/"+id_kas+"/"+id_pengurus,
      dataType  : "json",
      success:function(response)
      {
        if(response==1){
          $("#batal"+bln+id_kas+id_pengurus).show();
          $("#setor"+bln+id_kas+id_pengurus).hide();
          var total_all = $total * besar;
          $("#total").text("Rp "+total_all+" ,-");

        } else if(response==2){
          $("#batal"+bln+id_kas+id_pengurus).hide();
          $("#setor"+bln+id_kas+id_pengurus).show();
        } else{
          alert("Gagal! Silahkan Coba Lagi!"+response);
        }
      }  
    })
    .done(function(response){
      console.log("success");
    })
    .fail(function(jqXHR, status, error){
      console.log(jqXHR.status+" "+status+" "+error);
    });
  };

</script>