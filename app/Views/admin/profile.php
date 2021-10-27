 <?php
    $user = session('ss_user');
 ?>
 <!-- MAIN CONTENT-->
 <div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <div class="card bgt-card text-white">
                        <div class="card-header">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1 text-white">Users</h2>
                                    <button type="button" class="au-btn bgt-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#editUser">
                                        <i class="zmdi zmdi-plus"></i>Edit Profile
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="mx-auto d-block">
                                <?php if($user->profile_pic === NULL): ?>
                                    <img class="rounded-circle mx-auto d-block" src="<?php echo base_url() ?>/assets/images/icon/avatar-01.jpg" alt="<?php echo ($user->username) ?>" />
                                <?php else: ?>
                                    <img class="rounded-circle mx-auto d-block" src="<?php echo base_url() ?>/assets/uploads/profile-pictures/<?php echo ($user->profile_pic) ?>" alt="<?php echo ($user->username) ?>" style="height: 100px" />
                                <?php endif; ?>
                                <h5 class="text-sm-center mt-2 mb-1 text-white"><?php echo ucfirst($user->username) ?></h5>
                                <div class="location text-sm-center">
                                    <i class="zmdi zmdi-email-open"></i> <?php echo $user->email; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="card card-user bgt-card text-white">
                        <div class="card-body">
                            <p class="card-text"></p>
                            <div class="author">
                                <div class="block block-one"></div>
                                <div class="block block-two"></div>
                                <div class="block block-three"></div>
                                <div class="block block-four"></div>

                                <a href="#">
                                    <?php if($user->profile_pic === NULL): ?>
                                        <img class="avatar" src="<?php echo base_url() ?>/assets/images/icon/avatar-01.jpg" alt="<?php echo ($user->username) ?>" />
                                    <?php else: ?>
                                        <img class="avatar" src="<?php echo base_url() ?>/assets/uploads/profile-pictures/<?php echo ($user->profile_pic) ?>" alt="<?php echo ($user->username) ?>" />
                                    <?php endif; ?>
                                    <h5 class="title">Mike Andrew</h5>
                                </a>

                                <p class="description">
                                    Ceo/Co-Founder
                                </p>
                            </div>
                            <p></p>

                            <div class="card-description">
                                Do not be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="button-container">
                                <button href="#" class="btn btn-icon btn-round btn-facebook">
                                    <i class="fab fa-facebook"></i>
                                </button>
                                <button href="#" class="btn btn-icon btn-round btn-twitter">
                                    <i class="fab fa-twitter"></i>
                                </button>
                                <button href="#" class="btn btn-icon btn-round btn-google">
                                    <i class="fab fa-google-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="editUser" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" style="max-width: 500px;">
            <div class="modal-content animated fadeInUp">
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="staticModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('admin/save_user', 'id="frmUpdate"'); ?>
                        <input type="hidden" name="id" id="id" value="<?php echo $user->id ?>" />
                        <input type="hidden" name="profile_pic" id="profile_pic" value="<?php echo $user->profile_pic ?>" />
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label text-white" for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $user->username ?>" />
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label text-white" for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $user->email ?>" />
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label text-white" for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" value="<?php echo $user->password ?>" />
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="image" class="form-control-label text-white">Profile Picture</label>
                                <?php if(isset($user->profile_pic)){ ?>
                                    <br />
                                    <img src="<?php echo base_url(); ?>/assets/uploads/profile-pictures/<?php echo $user->profile_pic ?>" style="max-height: 100px;" />
                                    <br />
                                <?php } ?>
                                <input type="file" accept=".gif,.jpg,.jpeg.png" id="image" name="image" />
                            </div>
                        </div>
                    <?php form_close() ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="zmdi zmdi-edit"></i>Close</button>
                    <button type="button" class="btn btn-success" onclick="updateUser()"><i class="zmdi zmdi-folder-person"></i>Add User</button>
                </div>
            </div>
        </div>
    </div> 
</div>
<!-- END MAIN CONTENT-->

<script>
    $(document).ready(function(){
        $('#frmUpdate').validate({
            rules: {
                name: "required",
                email: "required",
                password: "required"
            }
        });
    });

    function updateUser()
    {
        if(!$('#frmUpdate').valid())
        {
            return;
        }

        var frmData = new FormData()
        var files = $('#image').get(0).files;

        frmData.append('profile_pic', files[0]);

        //Other Data
        var otherData = $('#frmUpdate').serializeArray({checkboxesAsBools: false});
        $.each(otherData, function(key, input){
            frmData.append(input.name, input.value);
        });

        $('.page-loader').show();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() ?>/admin/save_user',
            data: frmData,
            processData: false,
            contentType: false,
            enctype: 'multipart/form-data',
            success: function (response)
            {
                if(response == 'success')
                {
                    $('.page-loader').hide();
                    swal("Success", "Profile Successfully Updated", 'success');
                    window.location = '<?php echo base_url() ?>/admin/logout';
                }

                else
                {
                    $('.page-loader').hide();
                    swal("Status", "Unable to Update Profile", 'info');
                }
            },

            error: function (response)
            {
                $('.page-loader').hide();
                swal("Error", "An Error... Please Try Again", 'error');
            }
        })
    }
</script>