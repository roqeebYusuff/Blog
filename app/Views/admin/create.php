 <!-- MAIN CONTENT-->
 <div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <div class="card bgt-card m-0">
                <div class="card-header">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1 text-white">Create Post</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php echo form_open_multipart('admin/savePost','id="postFrm"') ?>
                        <div class="form-row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="author" class="form-control-label text-white">Author</label>
                                    <input type="text" class="form-control bgt-form-control" id="author" name="author" placeholder="Author name" />
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="author" class="form-control-label text-white">Title</label>
                                    <input type="text" class="form-control bgt-form-control" id="title" name="title" placeholder="Post Title" />
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="views" class="form-control-label text-white">Views</label>
                                    <input type="text" class="form-control bgt-form-control" id="views" name="views" placeholder="Number of views" />
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="published" class="form-control-label text-white">Published</label>
                                    <select class="form-control bgt-form-control" name="published" id="published">
                                        <option>--Select--</option>
                                        <option value="YES">YES</option>
                                        <option value="NO">NO</option>
                                    </select>
                                    <!-- <input type="text" class="form-control bgt-form-control" id="published" name="published" /> -->
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="image" class="form-control-label text-white">Image</label>
                                    <input type="file" accept='.jpg,.jpeg,.png,.gif' class="form-control bgt-form-control" id="image" name="image" placeholder="Post image" />
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="intro" class="form-control-label text-white">Intro</label>
                                    <input type="text" class="form-control bgt-form-control" id="intro" name="intro" placeholder="Post Intro" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="body" class="form-control-label text-white">Body</label>
                            <textarea class="form-control bgt-form-control" rows="5" placeholder="Body" name="body" id="body"></textarea>
                        </div>

                        <div class="form-group">
                            <button type="button" class="btn btn-success float-right" onclick="post_Submit()">Submit</button>
                        </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->

<script>
    $(document).ready(function(){
        $('#postFrm').validate({
            rules: {
                author: "required",
                title: "required",
                intro: "required",
                views: "required",
                image: "required",
                body: "required",
                published: "required"
            }
        });
    });

    function post_Submit()
    {   
        if(!$('#postFrm').valid())
        {
            return;
        }

        let frmData = new FormData();

        var files = $("#image").get(0).files;

        //Add file to form data
        frmData.append('image', files[0]);

        var other_data = $('#postFrm').serializeArray({checkboxesAsBools: false});
        $.each(other_data, function (key, input) {
            frmData.append(input.name, input.value);
        });

        $('.page-loader').show();
        $.ajax({
            url: '<?php base_url() ?>/admin/create',
            encType: 'multipart/form-data',
            type: 'POST',
            processData: false,
            contentType: false,
            data: frmData,
            dataType: 'JSON',

            success: function(response)
            {
                $('.page-loader').hide();
                if(response == 'success')
                {
                    console.log('Got here Success');
                    swal('Success', 'Post Successfully Created', 'success');
                    $('#postFrm').reset(0);
                }

                else
                {
                    swal('Info', response, 'info');
                }
            },

            error: function(response)
            {
                $('.page-loader').hide();
                if(response.statusText === 'OK')
                {                    
                    swal('Success', 'Post Successfully Created', 'success');
                    $('#postFrm').reset(0);
                }
                else
                {                    
                    swal('Error', 'An error occurred, Please Try Again', 'error');
                }
            }
        });        
    }
</script>