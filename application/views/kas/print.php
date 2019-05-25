<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Sistem Formasi" />
  <meta name="keywords" content="Formasi, Mahasiswa, Islam, PHB"/>
  <meta name="author" content="Fredy Nur Apriyanto"/>
  <title>Print Data Kas Pengurus</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- shorcut icon -->
  <link rel="shortcut icon" href="<?php echo base_url('assets/img/logo-formasi100.png'); ?>" type="image/x-icon">

  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
	<div class="container">
		<h4 class="text-center">
			LAPORAN DATA KAS PENGURUS <br>
			LDK FORMASI KM PHB <br>
			<?php 
				$thn = date('Y',strtotime($kas_aktif->created_at));
				if($thn!='1970'){
					echo 'TAHUN '.$thn;
				}
			?>
		</h4>
		<br>

		<table>
          <tr>
            <td class="col-sm-3">Jumlah Pengurus</td>
            <td class="col-sm-1 text-center">:</td>
            <td>
              <?php 
                if($count!=null){
                  echo $count->jumlah;
                }
              ?>
            </td>
          </tr>
          <tr>
            <td class="col-sm-3">Total Kas</td>
            <td class="col-sm-1 text-center">:</td>
            <td>
              <?php 
                if($count!=null){
                  $total = $count->total * $kas_aktif->besar;
                  echo 'Rp '.$total.' ,-';
                }
              ?>
            </td>
          </tr>
        </table>
        <br>
		<table class="table table-striped table-bordered table-condensed">
			<thead>
				<tr style="color:#fff;background-color: #777;">
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
						$no = 1;
						foreach($kas_pengurus as $p){ ?>
							<tr>
								<td><?php echo $no++;?></td>
								<td><?php echo $p->nama;?></td>
								<td class="text-center">
									<?php 
										if($p->bulan1==0){ ?>
											X
									<?php } else{ ?>
											V
									<?php }
									?>
								</td>
								<td class="text-center">
									<?php 
										if($p->bulan2==0){ ?>
											X
									<?php } else{ ?>
											V
									<?php }
									?>
								</td>
								<td class="text-center">
									<?php 
										if($p->bulan3==0){ ?>
											X
									<?php } else{ ?>
											V
									<?php }
									?>
								</td>
								<td class="text-center">
									<?php 
										if($p->bulan4==0){ ?>
											X
									<?php } else{ ?>
											V
									<?php }
									?>
								</td>
								<td class="text-center">
									<?php 
										if($p->bulan5==0){ ?>
											X
									<?php } else{ ?>
											V
									<?php }
									?>
								</td>
								<td class="text-center">
									<?php 
										if($p->bulan6==0){ ?>
											X
									<?php } else{ ?>
											V
									<?php }
									?>
								</td>
								<td class="text-center">
									<?php 
										if($p->bulan7==0){ ?>
											X
									<?php } else{ ?>
											V
									<?php }
									?>
								</td>
								<td class="text-center">
									<?php 
										if($p->bulan8==0){ ?>
											X
									<?php } else{ ?>
											V
									<?php }
									?>
								</td>
								<td class="text-center">
									<?php 
										if($p->bulan9==0){ ?>
											X
									<?php } else{ ?>
											V
									<?php }
									?>
								</td>
								<td class="text-center">
									<?php 
										if($p->bulan10==0){ ?>
											X
									<?php } else{ ?>
											V
									<?php }
									?>
								</td>
								<td class="text-center">
									<?php 
										if($p->bulan11==0){ ?>
											X
									<?php } else{ ?>
											V
									<?php }
									?>
								</td>
								<td class="text-center">
									<?php 
										if($p->bulan12==0){ ?>
											X
									<?php } else{ ?>
											V
									<?php }
									?>
								</td>
							</tr>
				<?php	}
					} else { ?>
							<tr>
								<td colspan="14" class="text-center">
									<i>Tidak Ada Data</i>
								</td>
							</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>
<script src="<?php echo base_url('assets/jquery/jquery.min.js');?>"></script>
<script>
	$(document).ready(function(){
		window.print();
	})
</script>
</html>