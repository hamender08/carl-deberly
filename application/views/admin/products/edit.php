<ol class="breadcrumb">
    <li class="breadcrumb-item">
	<a href="<?php echo base_url('admin/product'); ?>">Product</a>
    </li>
    <li class="breadcrumb-item active">Edit</li>
</ol>
<div class="row">
    <div class="col-12">
	<h2><?php echo $heading; ?></h2>
    </div>
</div>
<div class="clearfix">&nbsp;</div>
<div class="row">
    <div class="col-12">
	<?php
	if ($this->session->flashdata('error')) {
	    echo '<p class="text-danger">';
	    echo $this->session->flashdata('error');
	    echo '</p>';
	}
	if ($this->session->flashdata('success')) {
	    echo '<p class="text-success">';
	    echo $this->session->flashdata('success');
	    echo '</p>';
	}
	?>
    </div>
</div>
<div class="card mb-3">
    <div class="card-header">
	<i class="fa fa-image"></i> Product Images</div>
    <div class="card-body">
	<?php if (empty($images)) { ?>
    	<div class="row">
    	    <div class="col-12">
    		<h4>No images avialable for product.</h4>
    	    </div>
    	</div>
	<?php } else { ?>
    	<div class="row">
		<?php ///echo '<pre>'; print_r($images); exit; ?>
		<?php foreach ($images as $z) { ?>

		    <div class="col-2">
			<?php
			$img = explode('.', $z->image);
			?>
			<div class= "thumbnail">
			    <img class="img-thumbnail" src="<?php echo base_url() ?>uploads/products/<?php echo $z->product_id; ?>/<?php echo $img[0] . '_thumb.' . $img[1]; ?>" />
			</div>
			<div class = "caption">
			    <a class="nav-link text-primary remove-image" data-url="<?php echo base_url('admin/product/delete_image/' . $z->id); ?>" style="cursor: pointer !important">Delete</a>
			</div>
		    </div>

		<?php } ?>
    	</div>
	<?php } ?>
	<div class="clearfix">&nbsp;</div>
	<?php echo form_open_multipart(base_url('admin/product/update_image/' . $data->id)) ?>
	<div class="row">
	    <div class="col-12">
		<label>Add New Product Images</label>
	    </div>
	    <div class="col-12">
		<input id="input-b3" name="file[]" type="file" class="file" multiple 
		       data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
	    </div>
	    <div class="clearfix">&nbsp;</div>
	    <div class="col-12">
		<button class="btn btn-success pull-right" type="submit"><i class="fa fa-upload"></i>&nbsp;Upload</button>
	    </div>
	</div>
	<?php echo form_close(); ?>

    </div>
</div>
<div class="clearfix">&nbsp;</div>
<div class="card mb-3">
    <div class="card-header">
	<i class="fa fa-edit"></i> Edit Product</div>
    <div class="card-body">
	<?php echo form_open(base_url('admin/product/update/' . $data->id)); ?>
	<div class="row">
	    <div class="col-6">
		<div class="form-group">
		    <label>Name</label>
		    <input name="name" type="text" placeholder="Name" class="form-control" value="<?php echo set_value('name', $data->name); ?>"  />
		    <?php echo form_error('name'); ?>
		</div>
		<div class="form-group">
		    <label>Category</label>
		    <select class="form-control" name="category"><option value="1">Electronic</option><option value="2">Clothes</option></select>
		</div>
		<div class="form-group">
		    <label>Price</label>
		    <input type='text' class="form-control" name="price" placeholder="Price" value="<?php echo set_value('price', $data->price); ?>" />
		    <?php echo form_error('price'); ?>
		</div>
		<div class="form-group">
		    <label>Product Code</label>
		    <input type='text' class="form-control datepicker" name="code" placeholder="Product Code" value="<?php echo set_value('code', $data->code); ?>" />
		    <?php echo form_error('code'); ?>
		</div>
	    </div>
	    <div class="col-6">
		<div class="form-group">
		    <label>Description</label>
		    <textarea class="form-control" name="description" placeholder="Description"><?php echo set_value('description', $data->description); ?></textarea>
		</div>
		<div class="form-group">
		    <label>Status</label>
		    <?php
		    $select = array('0' => 'Active', '1' => 'Inactive');
		    ?>
		    <?php echo form_dropdown('status', $select, $data->status, array('class' => 'form-control')); ?>
		</div>
		<div class="form-group">
		    <button class="btn btn-success pull-right" type="submit"><i class="fa fa-save"></i>&nbsp;Update</button>
		</div>

	    </div>
	</div>
	<?php echo form_close(); ?>
    </div>
</div>