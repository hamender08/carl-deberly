<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo base_url('admin/product'); ?>">Product</a>
    </li>
    <li class="breadcrumb-item active">Add</li>
</ol>
<div class="row">
    <div class="col-12">
        <h2><?php echo $category[0]->name.$heading; ?></h2>
    </div>
</div>
<div class="clearfix">&nbsp;</div>
<div class="col-6">
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-pencil"></i> Add Sub Category</div>
        <div class="card-body">
            <?php echo form_open(base_url('admin/category/subcategory/').$category[0]->id) ?>
            
            
            <div class="form-group">
                <label>SubCategoryName</label>
                <input name="name" type="text" placeholder="Name" class="form-control" value="<?php echo set_value('name'); ?>" onchange="slugify(this.value);"  />
                <?php echo form_error('name'); ?>
            </div>
            
            
            <div class="form-group">
                <label>Slug</label>
                <input name="slug" type="text" placeholder="Slug" class="form-control" value="<?php echo set_value('slug'); ?>" id="slug" readonly="readonly"  />
                <?php echo form_error('slug'); ?>
            </div>
            <div class="form-group">
                <label>Status</label>
                <?php
                $arr = array('Active', 'Inactive');
                echo form_dropdown('status', $arr, '', array('class' => 'form-control'));
                ?>
                <?php echo form_error('price'); ?>
            </div>
            <button class="btn btn-success btn-block" type="submit"><i class="fa fa-save"></i>&nbsp;Save</button>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    function slugify(argText)
    {
        var value=argText.toString().toLowerCase()
                .replace(/\s+/g, '-')           // Replace spaces with -
                .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
                .replace(/\-\-+/g, '-')         // Replace multiple - with single -
                .replace(/^-+/, '')             // Trim - from start of text
                .replace(/-+$/, '');            // Trim - from end of text
        $('#slug').val(value);
    }
</script>