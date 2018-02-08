<style>
    .text-danger
    {
	color:red !important;
    }
</style>
<div id="registerModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

	<!-- Modal content-->
	<div class="modal-content">
	    <div class="modal-header" style="background: #bf2934; color:#fff !important">
		<button type="button" class="close" data-dismiss="modal" style="color:#fff !important">&times;</button>
		<h4 class="modal-title text-center">Delivberry Registration</h4>
	    </div>
	    <div class="modal-body">
		<div id="registerMsg"></div>
		<form id="registerForm" action="#">
		    <div class="form-group">
			<label for="name">Name:</label>
			<input type="text" class="form-control" id="name" name="name" placeholder="Name">
		    </div>
		    <div class="form-group">
			<label for="email">Email:</label>
			<input type="text" class="form-control" id="email" placeholder="Email" name="email">
		    </div>
		    <div class="form-group">
			<label for="password">Password:</label>
			<input type="password" class="form-control" id="password" name="password" placeholder="Password">
		    </div>
		    <div class="form-group">
			<label for="cpwd">Confrim Password:</label>
			<input type="password" class="form-control" id="cpwd" name="cpassword" placeholder="Confrim Password">
		    </div>
		    <button type="submit" class="btn btn-default btn-block" style="background: #bf2934; color:#fff !important">Submit</button>
		</form>
	    </div>

	</div>

    </div>
</div>
<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
</script>
<script type="text/javascript">
    $("#registerForm").validate({

        rules: {
            name: "required",
            email: {
                required: true,
                email: true,
                remote: {
                    url: base_url + 'user/checkmail',
                    type: "post"
                }
            },
            password: "required",
            cpassword: {
                required: true,
                equalTo: "#password"
            }

        },
	messages:{
	    email:{
		remote:'Email alredy exsist'
	    }
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
            var fd = $('#registerForm').serialize();
            console.log(fd);
            $.ajax({
                url: base_url + 'user/signup',
                type: 'POST',
                data: fd,
                success: function (data)
                {
                    if (data == "success")
                    {
                        $('#registerMsg').html('<p class="text-success"><strong>Your account has been successfully created !</strong></p>');
                    } else if (data == "error")
                    {
                        $('#registerMsg').html('<p class="text-danger"><strong>There is an error creating your account !</strong></p>');
                    }
                    setTimeout(function () {
                        location.reload();
                    }, 3000);
                   
                }
            });
        }// end submit handler


    });
</script>