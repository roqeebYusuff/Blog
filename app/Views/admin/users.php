 <!-- MAIN CONTENT-->
 <div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="card bgt-card">
                <div class="card-header">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1 text-white">Users</h2>
                            <button type="button" class="au-btn bgt-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#userAdd">
                                <i class="zmdi zmdi-plus"></i>Add user
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-body text-white">
                    <div class="table-responsive">
                        <table id="userData" class="table table-bordered" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <!-- <th>User Group</th> -->
                                    <th>Date Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="userAdd" tabindex="-1" role="dialog" aria-labelledby="userAdd" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" style="max-width: 500px;">
            <div class="modal-content animated fadeInUp">
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="staticModalLabel">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('admin/save_user', 'id="frmAdd"'); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="username" class="form-control-label text-white">Name</label>
                                    <input type="text" class="form-control" id="username" name="username"  />
                                </div>                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email" class="form-control-label text-white">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password" class="form-control-label text-white">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="ppic" class="form-control-label text-white">Profile Picture</label>
                                    <input type="file" class="form-control" style="background: transparent; border: none;" accept=".jpg,.jpeg,.png,.gif" id="profile_pic" name="profile_pic" />
                                </div>
                            </div>
                        </div>
                    <?php form_close() ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
                    <button type="button" class="btn btn-success" onclick="addUser()"><i class="fa fa-user"></i>Add User</button>
                </div>
            </div>
        </div>
    </div>    

    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="frmEdit" aria-hidden="true" data-backdrop="static"></div>
</div>
<!-- END MAIN CONTENT-->

<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();

        $('#postFrm').validate({
            rules: {
                username: "required",
                email: {
                    required: true,
                    email: true
                },
                password: "required"
            }
        });

        var lurl = "<?php echo base_url() ?>/admin/get_users";
        userData = $('#userData').DataTable({
            lengthChange: true,
            "bRetrieve": true,
            "sAjaxSource": lurl,
            "aoColumns": [
                { data: 'username' },
                { data: 'email'},
                // { data: 'group_name'},
                {
                    data: 'created_at',
                    render: function(data){
                        return moment(data).format('MM/DD/YYYY');
                    }
                },
                {
                    data: 'id',
                    render: function(data){
                        var btn = '<div class="table-data-feature justify-content-around">';

                        btn += '<button class="tbAction item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" onclick="Edit('+data+')"><i class="zmdi zmdi-edit"></i></button>';
                        btn += '<button class="tbAction item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" onclick="Delete('+data+')"><i class="zmdi zmdi-delete"></i></button>';

                        btn += '</div>';
                        return btn;
                    }
                }
            ]
        });
    });

    function addUser()
    {
        if(!$('#frmAdd').valid())
        {
            return;
        }

        //Add files and manually add form data
        var frmData = new FormData();
        var files = $('#profile_pic').get(0).files;

        //Add file to form data
        frmData.append('profile_pic', files[0]);

        var other_data = $('#frmAdd').serializeArray({checkboxesAsBools: false});
        $.each(other_data, function(key, input){
            frmData.append(input.name, input.value);
        });

        $('.page-loader').show();
        $.ajax({
            url: '<?php echo base_url() ?>/admin/save_user',
            type: 'POST',
            data: frmData,
            processData: false,
            contentType: false,
            dataType: 'JSON',
            encType: 'multipart/form-data',
            success: function (response)
            {
                if(response == 'success')
                {
                    $('.page-loader').hide();
                    swal("Success", 'User added successfully', 'success');
                    userData.ajax.reload();
                    $('#userAdd').modal('hide');
                }

                else
                {
                    $('.page-loader').hide();
                    swal("Status", response, 'info');
                }
            },

            error: function (response)
            {
                if(response.statusText === 'OK')
                {          
                    $('.page-loader').hide();       
                    swal('Success', 'Post Successfully Created', 'success');
                    userData.ajax.reload();
                    $('#frmAdd')[0].reset();
                    $('#userAdd').modal('hide');
                }
                else
                {         
                    $('.page-loader').hide();           
                    swal("Error", "Unable to add user...Please Try again Later",'error');
                }                
            }
        })
    }

    function Edit(id)
    {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() ?>/admin/get_edit/'+id,
            data: {},
            success: function (response)
            {
                //Show loader
                $('#modalEdit').html(response);
                $('#modalEdit').modal('show');
            },

            error: function (response)
            {
                $('.page-loader').hide();
                swal("Error", "Unable to get User",'error');
            }
        });
    }

    function Delete(id)
    {
        if(!confirm('Are you sure you want to delete this user?...This action is irreversible'))
        {
            return;
        }

        //Show Loader
        $('.page-loader').show();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() ?>/admin/delete/'+id,
            data: {},
            success: function (response)
            {
                //Hide Loader
                $('.page-loader').hide();
                userData.ajax.reload();
                swal('Success', response, 'info');
            },

            error: function (response)
            {
                // Hide Loader
                $('.page-loader').hide();
                swal("Error", response, "error");
            }   
        });
    }
</script>