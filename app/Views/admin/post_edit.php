<div class="modal-dialog" style="max-width: 600px;">
    <div class="modal-content animated fadeInUp">
        <div class="modal-header">
            <h5 class="modal-title text-white" id="staticModalLabel">Edit Post</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <?php echo form_open_multipart('admin/save_user', 'id="frmEdit"'); ?>
                <input type="hidden" name="id" id="id" value="<?php echo $post->id ?>" />
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="author" class="form-control-label text-white">Author</label>
                            <input type="text" class="form-control" id="author" name="author" value="<?php echo $post->author ?>" />                        
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title" class="form-control-label text-white">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo $post->title ?>" />                        
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="views" class="form-control-label text-white">Views</label>
                            <input type="text" class="form-control" id="views" name="views" value="<?php echo $post->views ?>" />                        
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="published" class="form-control-label text-white">Published</label>
                            <input type="text" class="form-control" id="published" name="published" value="<?php echo $post->published ?>" />                        
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="image" class="form-control-label text-white">Image</label>
                            <?php if(isset($post->image)){ ?>
                                <br />
                                <img src="<?php echo base_url(); ?>/assets/uploads/post-pictures/<?php echo $post->image ?>" class="rounded-circle" style="max-height: 100px;" />
                                <br />
                            <?php } ?>
                            <input type="file" accept=".jpg,.jpeg,.png,.gif" id="image" name="image" />                        
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="intro" class="form-control-label text-white">Intro</label>
                            <input type="text" class="form-control" id="intro" name="intro" value="<?php echo $post->intro ?>" />                        
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <label for="body" class="form-control-label text-white">Body</label>
                        <textarea class="form-control" rows="5" placeholder="Body" name="body" id="body"><?php echo $post->body ?></textarea>
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
                author: "required",
                title: "required",
                views: "required",
                published: "required",
                image: "required",
                intro: "required",
                body: "required"
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
        var files = $('#image').get(0).files;

        //Add file to form data
        frmData.append('image', files[0]);

        //Other Data
        var other_data = $('#frmEdit').serializeArray({checkboxesAsBools: false});
        $.each(other_data, function(key, input){
            frmData.append(input.name, input.value);
        });

        $('.page-loader').show();
        //Send data to server
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() ?>/admin/update_post',
            data: frmData,
            processData: false,
            contentType: false,
            enctype: 'multipart/form-data',
            success: function(response)
            {
                if(response == 'success')
                {
                    $('.page-loader').hide();
                    swal('Success', 'Post Updated Successfully', 'success');
                    postData.ajax.reload();
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