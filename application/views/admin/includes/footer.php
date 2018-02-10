</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<footer class="sticky-footer">
    <div class="container">
        <div class="text-center">
            <small>Copyright © Your Website 2018</small>
        </div>
    </div>
</footer>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Confrimation</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Do you really want to delete this image</div>
            <div class="modal-footer">
                <a class="btn btn-primary btn-block final-remove-image" href="#">Remove</a>
            </div>
        </div>
    </div>
</div>
<!--Ends Here-->
<!--Delete Product Modal-->
<?php $this->load->view('admin/modals/delete_product'); ?>
<!--Ends Here-->
<!--Delete Category Modal-->
<?php $this->load->view('admin/modals/delete_category'); ?>
<?php //$this->load->view('admin/modals/delete_subcategory'); ?>
<!--Ends Here-->
<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="<?php echo base_url() ?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Page level plugin JavaScript-->
<script src="<?php echo base_url() ?>assets/admin/vendor/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/vendor/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>assets/admin/vendor/datatables/dataTables.bootstrap4.js"></script>
<!-- Custom scripts for all pages-->
<script src="<?php echo base_url() ?>assets/admin/js/sb-admin.min.js"></script>
<!-- Custom scripts for this page-->
<script src="<?php echo base_url() ?>assets/admin/js/sb-admin-datatables.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/js/sb-admin-charts.min.js"></script>
<!-- file input js-->
<script src="<?php echo base_url() ?>assets/admin/js/fileinput.js"></script>
<!-- Deberly .js-->
<script src="<?php echo base_url() ?>assets/front/deberly.js"></script>
</div>
</body>
</html>
