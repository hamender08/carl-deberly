<div id="loginUserModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">

	<!-- Modal content-->
	<div class="modal-content">
	    <div class="modal-header" style="background: #bf2934; color:#fff !important">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title">Delivberry Login</h4>
	    </div>
	    <div class="modal-body">
		<div id="loginErrorMsg"></div>
		<form id="userLoginForm" action="#">
		    <div class="form-group">
			<label for="useremail">Email:</label>
			<input type="text" class="form-control" id="useremail" name="useremail" placeholder="Email">
		    </div>
		    <div class="form-group">
			<label for="userpassword">Password:</label>
			<input type="password" class="form-control" id="userpassword" placeholder="password" name="userpassword">
		    </div>
		    <button type="submit" class="btn btn-default btn-block btn-sm" style="background: #bf2934; color:#fff !important">Submit</button>
		</form>
	    </div>
	</div>

    </div>
</div>
<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
</script>
<script type="text/javascript">
    $("#userLoginForm").validate({
        rules: {
            useremail: {
                required: true,
                email: true
            },
            userpassword: "required"

        },
        errorElement: "em",
        errorClass: "text-danger",
        errorPlacement: function (error, element) {
            // Add the `help-block` class to the error element
            error.addClass("help-block");
            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.parent("label"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
        },
        submitHandler: function (form) {
            var fd = $('#userLoginForm').serialize();
            $.ajax({
                url: base_url + 'user/login',
                type: 'POST',
                data: fd,
                success: function (data)
                {
                    if (data == "success")
                    {
                        $('#loginErrorMsg').html('<p class="text-success"><strong>Login Successfull !</strong></p>');
                        setTimeout(function () {
                            window.location.href="<?php echo base_url('user/profile'); ?>";
                        }, 3000);
                    } else if (data == "error")
                    {
                        $('#loginErrorMsg').html('<p class="text-danger"><strong>Invalid username/password !</strong></p>');
                    }

                }
            });
        }// end submit handler


    });
</script>