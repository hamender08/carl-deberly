<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php echo $title; ?></title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/front/css/font-awesome.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url(); ?>assets/front/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/front/css/main.css" rel="stylesheet" type="text/css" />
        <style>
            body {
                padding-top: 70px;
            }
            .navbar-default {
                background-color:#bf2934;
                background-image: none;
                background-repeat: no-repeat;

            }
            .navbar-default a{
                color:#fff !important;
            }
            .text-danger
            {
                color:#d9534f !important;
            }
        </style>
    </head>

    <body>

        <!-- Fixed navbar -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>">Delivberry</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="#"><i class="fa fa-user-circle-o fa-lg"></i>&nbsp;My Profile</a></li>
                        <li><a href="#"><i class="fa fa-cart-arrow-down fa-lg"></i>&nbsp;My Orders</a></li>
                        <li><a href="#"><i class="fa fa-dollar fa-lg"></i>&nbsp;Payment</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php if (($this->session->userdata('USER_ID') != '') && ($this->session->userdata('ROLE') == 'USER')) { ?>
                            <li><a>Hi ! <?php echo $this->session->userdata('USERNAME'); ?></a></li>
                            <li><a href="<?php echo base_url('logout'); ?>"><i class="fa fa-sign-out fa-lg"></i>&nbsp;Logout</a></li>
                        <?php } ?>

                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <?php
                if ($this->session->flashdata('error')) {
                    echo '<p class="text-danger"><strong>';
                    echo $this->session->flashdata('error');
                    echo '</strong></p>';
                }
                if ($this->session->flashdata('success')) {
                    echo '<p class="text-success"><strong>';
                    echo $this->session->flashdata('success');
                    echo '</strong></p>';
                }
                //echo '<pre>'; print_r($userdata);
                ?>
            </div>
            <div class="row">
                <legend>Edit Profile</legend>
                <?php echo form_open(base_url('user/update/')); ?>
                <div class="col-md-6">
                    <fieldset>
                        <!-- Form Name -->
                        <form action="#">
                            <div class="form-group">
                                <label for="uname">NAME:</label>
                                <input type="text" class="form-control" id="uname" placeholder="NAME" value="<?php echo $userdata[0]->name; ?>" name="uname">
                            </div>
                            <div class="form-group">
                                <label for="uaddress">ADDRESS:</label>
                                <textarea class="form-control" placeholder="ADDRESS" rows="3" name="uaddress"><?php echo $userdata[0]->address; ?></textarea>
                            </div>
                    </fieldset>
                </div>
                <div class="col-md-6 ">
                    <fieldset>
                        <!-- Form Name -->
                        <div class="form-group">
                            <label for="uemail">EMAIL ADDRESS:</label>
                            <input type="uemail" class="form-control" id="email" placeholder="EMAIL ADDRESS" value="<?php echo $userdata[0]->email; ?>" name="uemail">
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary pull-right">SUBMIT</button>
                        </div>
                    </fieldset>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="clearfix">&nbsp;</div>
            <div class="row">
                <legend>Change Password</legend>
                <?php echo form_open(base_url('user/update_password/'.$this->session->userdata('USER_ID')), array('id'=>'changePasswordForm')); ?>
                    <div class="col-md-6">
                        <fieldset>
                            <!-- Form Name -->
                            <div class="form-group">
                                <label for="password">NEW PASSWORD:</label>
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset>
                            <!-- Form Name -->
                            <div class="form-group">
                                <label for="cpassword">CONFIRM PASSWORD:</label>
                                <input type="password" class="form-control" id="cpassword" name="cpassword">
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </fieldset>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div> <!-- /container -->
        <div class="clearfix">&nbsp;</div>
        <footer class="footer">
            <div class="footer-block">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12" style="margin-bottom:40px;">
                            <p class="text-center">Interested in a great way to make money?  <a href="#" class="btn btn-danger">
                                    Become a shopper</a></p>
                        </div>
                        <div class="col-md-2 col-sm-3">
                            <div class="row">
                                <div class="col-sm-12 col-xs-6">
                                    <ul class="list-unstyled simple-list">
                                        <li><a href="#">Locations</a></li>
                                        <li><a href="#">Careers</a></li>
                                        <li><a href="#">Contact </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-3">
                            <div class="row">
                                <div class="col-sm-12 col-xs-6">
                                    <ul class="list-unstyled simple-list">
                                        <li><a href="#">Instacart Express</a></li>
                                        <li><a href="#">Lists & Recipes</a></li>
                                        <li><a href="#">Partner program</a></li>
                                        <li><a href="#">Blog</a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-2 col-sm-3">
                            <div class="row">
                                <div class="col-sm-12 col-xs-6">
                                    <ul class="list-unstyled simple-list margin-bottom-10">
                                        <li><a href="#">Press</a></li>
                                        <li><a href="#">Privacy</a></li>
                                        <li><a href="#">Enter your location</a></li>
                                        <li><a href="#">Help</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 md-margin-bottom-40">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                            <br>
                            <ul class="list-inline footer-social">
                                <li><a href="http://www.facebook.com/" target="_blank"><i class="fb rounded-md fa fa-facebook"></i></a></li>
                                <li><a href="http://www.twitter.com/" target="_blank"><i class="tw rounded-md fa fa-twitter"></i></a></li>
                                <li><a href="http://www.instagram.com/" target="_blank"><i class="tw rounded-md fa fa-instagram"></i></a></li>
                                <li><a href="#" data-toggle="modal" data-target="#tell-a-friend"><i class="tw rounded-md fa fa-share"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </footer>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="<?php echo base_url(); ?>assets/front/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/front/js/bootstrap.min.js"></script>
        <!-- Jquery Validation Js-->
        <script src="<?php echo base_url() ?>assets/front/js/jquery.validate.js"></script>

        <script type="text/javascript">
            $("#changePasswordForm").validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: "required",
                    cpassword:{
                        required:true,
                        equalTo:"#password"
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
                }
            });
        </script>
    </body>
</html>
