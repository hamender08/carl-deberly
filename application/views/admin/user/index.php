<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo base_url('admin/dashboard'); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Users</li>
</ol>
<div class="row">
    <div class="col-12">
        <h2><?php echo $heading; ?></h2>
    </div>
    <div class="col-12">
        <a href="<?php echo base_url('admin/product/add'); ?>" class="btn btn-primary pull-right">Add User</a>
    </div>
</div>
<div class="clearfix">&nbsp;</div>
<div class="row">
    <div class="col-12">
        <?php $this->load->view('admin/includes/success_error'); ?>
    </div>
</div>
<div class="clearfix">&nbsp;</div>
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Users Listing</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-condensed" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Date Added</th>
                        <th>Date Modified</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($records as $r) {
                        ?>
                        <tr>
                            <td><center><img src="<?php echo base_url(); ?>assets/front/images/user.png" width="50%" /></center></td>
            <td><?php echo $r->name; ?><br><small><strong>(<?php echo $r->email; ?>)</strong></small></td>
                            <td><?php echo date('d M Y H:i:s', strtotime($r->date_added)); ?></td>
                            <td><?php echo date('d M Y H:i:s', strtotime($r->date_modified)); ?></td>
                            <td>
                                <?php if ($r->type == 1) { ?>
                                    <span class="badge badge-warning">User</span>
                                <?php } else if ($r->type == 2) { ?>
                                    <span class="badge badge-dark">Driver</span>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if ($r->status == 0) { ?>
                                    <span class="badge badge-success">Active</span>
                                <?php } else { ?>
                                    <span class="badge badge-danger">Inactive</span>
                                <?php } ?>
                            </td>
                            <td><div class="dropdown">
                                    <button class="btn btn-primary button-small dropdown-toggle" type="button" data-toggle="dropdown">Select
                                        <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">&nbsp;Edit</a></li>
                                        <li><a href="#">&nbsp;Delete</a></li>
                                    </ul>
                                </div></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>