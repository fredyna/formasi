<!DOCTYPE html>
<html class="no-js" lang="en-us">
    <head>

        <!-- Site Title -->
        <title>Formasi</title>

        <!-- Site Meta Info -->
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="Sistem Formasi" />
        <meta name="keywords" content="Formasi, Mahasiswa, Islam, PHB"/>
        <meta name="author" content="Fredy Nur Apriyanto"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?php echo base_url('assets/img/logo-formasi100.png'); ?>" type="image/x-icon">


        <!-- Essential CSS Files -->
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>">
    
        <!-- Icon Family -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css');?>">
        <style>
            body{
                background-color: #f9f9f9;
            }

            #container{
                background-color: #fff;
                margin-top: 30px;
                padding: 30px;
                box-shadow: 7px 7px 7px 0 rgba(0, 0, 0, 0.1);
                border-radius: 7px;
            }
            table tbody td i.fa-close{
                color: red;
            }
            table tbody td i.fa-check{
                color: green;
            }
            footer{
                margin-top: 30px;
            }
        </style>
        
    </head>
    <body>
        <div id="container" class="container">
            <h3 class="text-center">Publikasi Kas Pengurus Formasi</h3>
            <h3 class="text-center">Tahun <?php echo date('Y', strtotime($kas_aktif->created_at)); ?></h3>
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
              <!-- <tr>
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
              </tr> -->
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
                                <i class="fa fa-close"></i>
                            <?php } else{ ?>
                                <i class="fa fa-check"></i>
                            <?php }
                            ?>
                          </td>

                          <td class="text-center">
                            <?php 
                              if($k->bulan2==0){ ?>
                                <i class="fa fa-close"></i>
                            <?php } else{ ?>
                                <i class="fa fa-check"></i>
                            <?php }
                            ?>
                          </td>
                          <td class="text-center">
                            <?php 
                              if($k->bulan3==0){ ?>
                                <i class="fa fa-close"></i>
                            <?php } else{ ?>
                                <i class="fa fa-check"></i>
                            <?php }
                            ?>
                          </td>

                          <td class="text-center">
                            <?php 
                              if($k->bulan4==0){ ?>
                                <i class="fa fa-close"></i>
                            <?php } else{ ?>
                                <i class="fa fa-check"></i>
                            <?php }
                            ?>
                          </td>

                          <td class="text-center">
                            <?php 
                              if($k->bulan5==0){ ?>
                                <i class="fa fa-close"></i>
                            <?php } else{ ?>
                                <i class="fa fa-check"></i>
                            <?php }
                            ?>
                          </td>

                          <td class="text-center">
                            <?php 
                              if($k->bulan6==0){ ?>
                                <i class="fa fa-close"></i>
                            <?php } else{ ?>
                                <i class="fa fa-check"></i>
                            <?php }
                            ?>
                          </td>
                          <td class="text-center">
                            <?php 
                              if($k->bulan7==0){ ?>
                                <i class="fa fa-close"></i>
                            <?php } else{ ?>
                                <i class="fa fa-check"></i>
                            <?php }
                            ?>
                          </td>

                          <td class="text-center">
                            <?php 
                              if($k->bulan8==0){ ?>
                                <i class="fa fa-close"></i>
                            <?php } else{ ?>
                                <i class="fa fa-check"></i>
                            <?php }
                            ?>
                          </td>

                          <td class="text-center">
                            <?php 
                              if($k->bulan9==0){ ?>
                                <i class="fa fa-close"></i>
                            <?php } else{ ?>
                                <i class="fa fa-check"></i>
                            <?php }
                            ?>
                          </td>

                          <td class="text-center">
                            <?php 
                              if($k->bulan10==0){ ?>
                                <i class="fa fa-close"></i>
                            <?php } else{ ?>
                                <i class="fa fa-check"></i>
                            <?php }
                            ?>
                          </td>

                          <td class="text-center">
                            <?php 
                              if($k->bulan11==0){ ?>
                                <i class="fa fa-close"></i>
                            <?php } else{ ?>
                                <i class="fa fa-check"></i>
                            <?php }
                            ?>
                          </td>

                          <td class="text-center">
                            <?php 
                              if($k->bulan12==0){ ?>
                                <i class="fa fa-close"></i>
                            <?php } else{ ?>
                                <i class="fa fa-check"></i>
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

        <footer>
            <p class="text-center">Copyright &copy; 2018 by IT Formasi</p>
        </footer>

    </body>
</html>
