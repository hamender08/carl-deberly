<style>
    .alert-success{
        border:1px solid green !important;
    }
    .alert-danger{
        border:1px solid red !important;
    }
    .alert-warning{
        border:1px solid yellow !important;
    }
</style>
<?php
if($this->session->flashdata('error'))
{
    echo '<div class="alert alert-danger alert-dismissable">';
    echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
    echo $this->session->flashdata('error');
    echo '</div></div>';
}

if($this->session->flashdata('success'))
{
    echo '<div class="alert alert-success alert-dismissable">';
    echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
    echo $this->session->flashdata('success');
    echo '</div>';
}
if($this->session->flashdata('warning'))
{
    echo '<div class="alert alert-warning alert-dismissable">';
    echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
    echo $this->session->flashdata('warning');
    echo '</div>';
}

?>