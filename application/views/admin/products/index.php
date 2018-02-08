<ol class="breadcrumb">
    <li class="breadcrumb-item">
	<a href="<?php echo base_url('admin/dashboard'); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Products</li>
</ol>
<div class="row">
    <div class="col-12">
	<h2><?php echo $heading; ?></h2>
    </div>
    <div class="col-12">
	<a href="<?php echo base_url('admin/product/add'); ?>" class="btn btn-primary pull-right">Add Product</a>
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
	<i class="fa fa-table"></i> Product Listing</div>
    <div class="card-body">
	<div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		<thead>
		    <tr>
			<th>Image</th>
			<th>Name</th>
			<th>Category</th>
			<th>Price</th>
			<th>Status</th>
			<th>Active</th>
		    </tr>
		</thead>
		<tbody>
			<?php //echo '<pre>'; print_r($record);
			    $cat=array(1=>'Electronic', 2=>'Clothes');
			?>
			<?php foreach ($record as $r) { ?>
			    <tr>
				<td>
				    <?php if ($r['image'] != '') { ?>
					<?php
					$img = explode('.', $r['image']);
					?>
	    			    <img class="img-thumbnail" src="<?php echo base_url() ?>uploads/products/<?php echo $r['id']; ?>/<?php echo $img[0] . '_thumb.' . $img[1]; ?>" />
				    <?php } else { ?>
	    			    <img src="http://via.placeholder.com/80x80" />
				    <?php } ?>

				</td>
				<td><?php echo $r['name']; ?></td>
				<td><?php echo $cat[$r['category']]; ?></td>
				<td><?php echo $r['price']; ?> &dollar;</td>
				<td>
				    <?php if ($r['status'] == 0) { ?>
	    			    <span class="badge badge-success">Active</span>
				    <?php } else { ?>
	    			    <span class="badge badge-danger">Inactive</span>
				    <?php } ?>
				</td>
				<td>
				    <a class="btn btn-warning" href="<?php echo base_url('admin/product/edit/'.$r['id']); ?>" data-tooltip="tooltip" title="Edit"><i class="fa fa-edit"></i></a>&nbsp;<a class="btn btn-danger remove-product" data-url="<?php echo base_url('admin/product/remove/'.$r['id']); ?>" data-tooltip="tooltip" title="Delete"><i class="fa fa-trash-o"></i></a>
				</td>
			    </tr>
			<?php }
		     ?>
		</tbody>
            </table>
	</div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>