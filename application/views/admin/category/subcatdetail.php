<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo base_url('admin/dashboard'); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Categories</li>
</ol>
<div class="row">
    <div class="col-12">
        <h2><?php echo $category[0]->name.$heading; ?></h2>
    </div>
    <div class="col-12">
        <a href="<?php echo base_url('admin/category/subcategory/').$category[0]->id; ?>" class="btn btn-primary pull-right">Add SubCategory</a>
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
        <i class="fa fa-table"></i> Category Listing</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-condensed" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Active</th>
                        <th>Date Added</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($subcategory as $a) { ?>
                        <tr>
                            <td><?php echo $a->name ?></td>
                            <td><?php echo $a->slug ?></td>
                            <td>
                                <?php if ($a->status == 0) { ?>
                                    <span class="badge badge-success">Active</span>
                                <?php } else { ?>
                                    <span class="badge badge-danger">Inactive</span>
                                <?php } ?>
                            </td>
                            <td><?php echo date('d/m/Y H:i:s', strtotime($a->date_added)); ?></td>
                            
                            <td>
				    <a class="btn btn-warning" href="<?php echo base_url('admin/category/subcategoryedit/'.$a->id); ?>" data-tooltip="tooltip" title="Edit"><i class="fa fa-edit"></i></a>&nbsp;<a class="btn btn-danger remove-product" data-url="<?php echo base_url('admin/category/subcategoryremove/'.$category[0]->id.'/'.$a->id); ?>/" data-tooltip="tooltip" title="Delete"><i class="fa fa-trash-o"></i></a>
				</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>