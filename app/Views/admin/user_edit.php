<div class="modal-dialog" style="max-width: 600px;">
    <div class="modal-content animated fadeInUp">
        <div class="modal-header">
            <h5 class="modal-title text-white" id="staticModalLabel">Edit User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <?php echo form_open_multipart('admin/save_user', 'id="frmEdit"'); ?>
                <input type="hidden" name="edt_id" id="edit_id" value="<?php echo $user->id ?>" />
                <input type="hidden" name="edt_profile_pic" id="edt_profile_pic" value="<?php echo $user->profile_pic ?>" />
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="edt_username" class="form-control-label text-white">Name</label>
                            <input type="text" class="form-control" id="edt_username" name="edt_username" value="<?php echo $user->username ?>" />
                        </div>                        
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="edt_email" class="form-control-label text-white">Email</label>
                            <input type="email" class="form-control" id="edt_email" name="edt_email" value="<?php echo $user->email ?>" />
                        </div>                        
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="edt_password" class="form-control-label text-white">Password</label>
                            <input type="password" class="form-control" id="edt_password" name="edt_password" value="<?php echo $user->password ?>" />
                        </div>                        
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="edt_profile_pic" class="form-control-label text-white">Profile Picture</label>
                            <?php if(isset($user->profile_pic)){ ?>
                                <br />
                                <img src="<?php echo base_url(); ?>/assets/uploads/profile-pictures/<?php echo $user->profile_pic ?>" class="rounded-circle" style="max-height: 100px;" />
                                <br />
                            <?php } ?>
                            <input type="file" accept=".jpg,.jpeg,.png,.gif" id="edt_image" name="edt_image" />
                        </div>                        
                    </div>
                </div>
            <?php form_close() ?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
            <button type="button" class="btn btn-success" onclick="editSave()"><i class="fa fa-check-square-o"></i>Add User</button>
        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
        $('#frmEdit').validate({
            rules: {
                edt_username: "required",
                edt_email: {
                    required: true,
                    email: true
                },
                edt_password: "required"
            }
        });
    });

    function editSave()
    {
        if(!$('#frmEdit').valid())
        {
            return;
        }

        //Add files manually
        var frmData = new FormData();
        var files = $('#edt_image').get(0).files;

        //Add file to form data
        frmData.append('profile_pic', files[0]);

        //Other Data
        var other_data = $('#frmEdit').serializeArray({checkboxesAsBools: false});
        $.each(other_data, function(key, input){
            frmData.append(input.name.replace('edt_',''), input.value);
        });

        $('.page-loader').show();
        //Send data to server
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() ?>/admin/save_user',
            data: frmData,
            processData: false,
            contentType: false,
            enctype: 'multipart/form-data',
            success: function(response)
            {
                if(response == 'success')
                {
                    $('.page-loader').hide();
                    swal('Success', 'User Updated Successfully', 'success');
                    userData.ajax.reload();
                    $('#modalEdit').modal('hide');
                }

                else
                {
                    $('.page-loader').hide();
                    swal('Status', response, 'info');
                }
            },

            error: function (response)
            {
                $('.page-loader').hide();
                swal("Error", "Unable to Update User, Please Try again", "error");
            }
        });
    }
</script>