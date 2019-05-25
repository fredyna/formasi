<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Besar Kas
      <small>Edit Kas</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('kas');?>"><i class="fa fa-money"></i> Edit Kas</a></li>
      <!--<li class="active">Here</li>-->
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div class="col-md-12">
      <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Kas</h3>

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

            <?php
                $name = array(
                    'name'=>'editData',
                    'class'=>'form-horizontal'
                    );  
                echo form_open('kas/editData/'.$kas->id,$name);
            ?>

              <div class="form-group">
                <label for="kas" class="col-sm-3 control-label">Besar Kas</label>
                <div class="col-sm-9">
                  <input type="number" name="kas" value="<?php echo $kas->besar;?>" class="form-control" placeholder="Besar Kas">
                  <?php echo form_error('kas');?>
                </div>
              </div>

              <div class="form-group">
                <label for="tahun" class="col-sm-3 control-label">Tahun Berlaku</label>
                <div class="col-sm-8">
                  <select name="tahun" class="form-control" required>
                    <option value="">--Pilih Tahun Kepengurusan--</option>
                  <?php if(isset($tahun_kas)){
                      foreach($tahun_kas as $t){ ?>
                        <option value="<?php echo $t->tahun; ?>" <?php echo $kas->tahun_pengurus==$t->tahun? 'selected':'';?>><?php echo $t->tahun; ?></option>
                  <?php }
                      }
                    ?>
                  </select>
                  <?php echo form_error('tahun');?>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-4">
                  <a href="<?php echo base_url('kas')?>" class="btn btn-info"><i class="fa fa-arrow-left"></i> Back</a>
                  <button type="submit" name="submit" value="submit" class="btn btn-success"><i class="fa fa-plus"></i> Add</button>
                </div>
              </div>
            </form>

          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.col -->
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->