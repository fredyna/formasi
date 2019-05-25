<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Sistem Formasi" />
  <meta name="keywords" content="Formasi, Mahasiswa, Islam, PHB"/>
  <meta name="author" content="Fredy Nur Apriyanto"/>
  <title>Print Data Pengurus</title>
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
			LAPORAN DATA PENGURUS <br>
			LDK FORMASI KM PHB <br>
			<?php 
				$thn_now = date('Y');
				if($tahun!=null){
					echo 'TAHUN '.$tahun;
				} else{
					echo 'TAHUN 2007 - '.$thn_now;
				}
			?>
		</h4>
		<br>
		<table class="table table-striped table-bordered table-condensed">
			<thead>
				<tr style="color:#fff;background-color: #777;">
					<th class="text-center">NO</th>
					<th class="text-center">NIM</th>
					<th class="text-center">NAMA</th>
					<th class="text-center">KELAS</th>
					<th class="text-center">PRODI</th>
					<th class="text-center">JENIS KELAMIN</th>
					<th class="text-center">NO HP</th>
					<th class="text-center">JABATAN</th>
					<th class="text-center">TTL</th>
					<th class="text-center">ALAMAT</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					if($pengurus!=null){
						$no = 1;
						foreach($pengurus as $p){ ?>
							<tr>
								<td><?php echo $no++;?></td>
								<td><?php echo $p->nim;?></td>
								<td style="width:200px;"><?php echo $p->nama;?></td>
								<td class="text-center"><?php echo $p->kelas;?></td>
								<td><?php echo $p->prodi?></td>
								<td><?php echo $p->jenis_kelamin?></td>
								<td><?php echo $p->no_hp?></td>
								<td><?php echo $p->no_hp?></td>
								<td>
									<?php
										$tgl = date('d-m-Y',strtotime($p->tanggal_lahir));
										echo $p->tempat_lahir.', '.$tgl;
									?>
								</td>
								<td style="width:200px;"><?php echo $p->alamat?></td>
							</tr>
				<?php	}
					} else { ?>
							<tr>
								<td colspan="7" class="text-center">
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