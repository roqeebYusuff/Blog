 <!-- MAIN CONTENT-->
 <div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="card bgt-card m-0">
                <div class="card-header">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1 text-white">All Posts</h2>
                        </div>
                    </div>
                </div>

                <div class="card-body text-white">
                    <div class="table-responsive">
                        <table id="postData" class="table table-bordered" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Views</th>
                                    <th>Intro</th>
                                    <th>Published</th>
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

    <div class="modal fade" id="modalEdit" data-backdrop="static"></div>
</div>
<!-- END MAIN CONTENT-->

<script>
    $(document).ready(function(){

        var purl = '<?php echo base_url() ?>/admin/get_posts';
        postData = $('#postData').DataTable({
            lengthChange: true,
            "bRetrieve": true,
            "sAjaxSource": purl,
            "aoColumns": [
                {data: 'author'} ,
                {data: 'title'},
                {data: 'views'},
                {data: 'intro'},
                {data: 'published'},
                {
                    data: 'created_at',
                    render: function(data){
                        return moment(data).format('llll')
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

    function Edit(id)
    {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() ?>/admin/get_post_edit/'+id,
            data: {},
            success: function (response)
            {
                $('#modalEdit').html(response)
                $('#modalEdit').modal('show');
            },

            error: function(response)
            {
                swal("Error", "Invalid User", 'error');
            }
        });
    }

    function Delete(id)
    {
        if(!confirm("Are you sure you want to delete this post....The action is irreversible"))
        {
            return;
        }

        $('.page-loader').show();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() ?>/admin/deletePost/'+id,
            data: {},
            success: function (response)
            {
                $('.page-loader').hide();
                postData.ajax.reload();
                swal("Success", response, "info");
            },

            error: function (response)
            {
                $('.page-loader').hide();
                swal("Error", response, "info");
            }
        });
    }
</script>