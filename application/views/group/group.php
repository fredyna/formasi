<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Kelola Group
      <small>Kelola Group</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('group');?>"><i class="fa fa-group"></i> Kelola Group</a></li>
      <!--<li class="active">Here</li>-->
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div class="col-md-12">
      <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Data Group</h3>

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

            <!--<a href="<?php echo base_url('group/addGroup');?>" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add Group</a> 
            <br /><br />-->

            <div class="table-responsive">
              <table width="100%" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Group Name</th>
                        <th>Group Description</th>
                        <th>Action</th>
                    </tr>
                     
                </thead>
                <tbody>
                <?php 
                $no = 1;
                if($data_group!=null){
                  foreach($data_group as $g){                  
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $g->name; ?></td>
                    <td><?php echo $g->description; ?></td>
                    <td style="text-align: center;">
                        <a class='btn btn-info btn-xs' href="<?php echo base_url('group/updateGroup/'.$g->id); ?>"><i class="glyphicon glyphicon-edit"></i> </a>
                        <!--<a class='btn btn-danger btn-xs' href="#" onclick="functionDelete('<?php echo base_url('group/deleteGroup/'.$g->id); ?>')"><i class="glyphicon glyphicon-trash"></i> </a>-->
          
                    </td>
                </tr>
                <?php } 
                  } else { ?>
                  <tr>
                    <td class="text-center" colspan="4"><i>No Data</i></td>
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