<ol class="breadcrumb">
    <li class="breadcrumb-item">
	<a href="<?php echo base_url('admin/product'); ?>">Product</a>
    </li>
    <li class="breadcrumb-item active">Add</li>
</ol>

<div class="row">
    <div class="col-12">
	<h2><?php echo $heading; ?></h2>
    </div>
</div>
<div class="clearfix">&nbsp;</div>
<div class="card mb-3">
    <div class="card-header">
	<i class="fa fa-pencil"></i> Add Product</div>
    <div class="card-body">
	<?php //echo '<pre>';print_r($category); die();
        echo form_open_multipart(base_url('admin/product/add')) ?>
	<div class="row">
	    <div class="col-12">
		 <input id="input-b3" name="file[]" type="file" class="file" multiple 
			   data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
	    </div>
	</div>
	<div class="clearfix">&nbsp;</div>
	<div class="row">
	    <div class="col-6">
		<div class="form-group">
		    <label>Name</label>
		    <input name="name" type="text" placeholder="Name" class="form-control" value="<?php echo set_value('name'); ?>"  />
		    <?php echo form_error('name'); ?>
		</div>
		<div class="form-group">
		    <label>Category</label>
		    <select class="form-control" name="category">
                        <?php foreach ($category as $key=>$cat){ //echo '<pre>';print_r($cat); die();?>
                        <option value="<?php echo $key; ?>"><?php echo $cat->name; ?></option>
                        <?php } ?>
                        
                        </select>
		</div>
		<div class="form-group">
		    <label>Price</label>
		    <input type='text' class="form-control" name="price" placeholder="Price" value="<?php echo set_value('price'); ?>" />
		    <?php echo form_error('price'); ?>
		</div>
		<div class="form-group">
		    <label>Product Code</label>
		    <input type='text' class="form-control datepicker" name="code" placeholder="Product Code" value="<?php echo set_value('code'); ?>" />
		    <?php echo form_error('code'); ?>
		</div>
	    </div>
	    <div class="col-6">
		<div class="form-group">
		    <label>Description</label>
		    <textarea class="form-control" name="description" placeholder="Description"><?php echo set_value('description'); ?></textarea>
		</div>
		<div class="form-group">
		    <label>Status</label>
		    <select class="form-control" name="status"><option value="0">Active</option><option value="1">Inctive</option></select>
		</div>
		<div class="form-group">
		    <button class="btn btn-success pull-right" type="submit"><i class="fa fa-save"></i>&nbsp;Save</button>
		</div>

	    </div>
	</div>
	<?php echo form_close(); ?>
    </div>
</div>