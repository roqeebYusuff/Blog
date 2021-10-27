<section class="section-cover an-wrap an-wrap-2" style="background-image: url('assets/img/bg_2.jpg'); background-position: 50%-40px;">
    <div class="container">
        <div class="row no-gutters slider-text justify-content-center align-items-center" style="height: 400px;">
            <div class="col-md-9 text-center">
                <h1><?php echo $post['title']; ?></h1>
            </div>
        </div>
    </div>
</section>

<section class="blog">
    <div class="container pt-3" style="width:66%; text-align: justify">
        <div>
            <h1 class="blog-title"><?php echo $post['title']; ?></h1>
            <div class="blog-intro">
                <p><?php echo $post['intro']; ?></p>
            </div>
            <div class="blog-feature row"> 
                <div class="blog-author col-md-4"> 
                    <img src="assets/img/p.png" >
                    <span class="author-name"><?php echo $post['author'] ?><span>
                </div>
                <div class="blog-date col-md-3">
                    <i class="fas fa-calendar-alt"></i><?php echo date('d F Y',strtotime($post['created_at']))?>
                </div>
            </div>
        </div>

        <div class="blog-body">
            <?php echo html_entity_decode($post['body']); ?>
        </div>

        <div class="about-author" style="background: #f9f8f8; border-radius: 10px;"> 
            <div class="p-4">
                <img src="assets/img/p.png" class="profile-pic mb-3">
                <p>Roqeeb Yusuff</p>
                <p>I help people just like you become a profitable freelance writer. Within 6 months of starting my freelance writing business from scratch I was able to earn a full-time living as a part-time freelance writer while taking care of my twin toddlers. Check out my free email course Get Paid to Write Online and learn the steps you need to take to be a freelance writer.</p>
            </div>
        </div>            
    </div>
</section>

<section class="section-reply"> 
    <div class="container mt-5" style="width: 66%;">
        <h1> Share Your Thought! </h1>
        <div id="msg" style="color:red"></div>
        <!-- Comment form -->
        <?php echo form_open_multipart('comment/Comment','id="comment_form"');?>
            <div class="form-group mb-4"> 
                <textarea cols="30" rows="7" class="form-control" id="comment" name="comment" placeholder="Enter your comment here..." title="Enter your comment here..." required></textarea>
            </div>
            <div class="hide" style="display:none;"> 
                <div class="row mb-3">
                    <input type="hidden" name="post_id" id="post_id" value="<?php echo $post['id'] ?>" />
                    <div class="form-group col-md-6 col-sm-6">
                        <label>Name<strong style="font-size: 10px;">[Required]</strong></label>
                        <input type="text" class="form-control col-md-12" id="name"  name="name" required>
                    </div>

                    <div class="form-group col-md-6 col-sm-6">
                        <label>Email<strong style="font-size: 10px;">[Required]</strong></label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>

                <div class="form-group text-right" > 
                    <button type="button" class="btn btn-primary" onclick="addComment()" id="submit_comment">Post your comment</button>
                </div> 
            </div> 
        <?php echo form_close() ?> 
        <!-- comment form closes -->
    </div>
</section>


<section class="section-comments"> 
    <div class="container mt-4" style="width: 66%;"> 
        
        <h1 class="show_comment">Comments</h1>
        <div id="comments_here"> 
                          
            <?php if($comments != NULL): ?>
                <?php foreach ($comments as $comment): ?>
                    <header class="comment-header">
                        <img src="assets/img/p.png" alt="" class="profile-pic" width="50px" height="50px"/>
                        <div class="comment-author"><div class="comment-name"><?php echo $username->name ?></div>
                        <div class="comment-date"><?php echo date('d F, Y', strtotime($comment->created_at))?> at <?php echo date('h:i a',strtotime($comment->created_at)) ?></div>
                    </header>

                    <div class="comment-content">
                        <p><?php echo $comment->comment ?></p>
                        <!-- reply button -->
                        <i class="fas fa-reply reply-btn" data-id="<?php echo $comment->id ?>" ></i><i>Reply to <?php echo $comment->name ?></i>
                        
                        <!-- reply form -->
                        <?php echo form_open_multipart('comment/Comment','style="display:none;"id="comment_reply_form_'.$comment->id.'"data-id='.$comment->id);?>
                            <input type="hidden" name="reply_comment_id" id="reply_comment_id" value="<?php echo $comment->id ?>"> 
                            <input type="hidden" name="reply_post_id" id="reply_post_id" value="<?php echo $post['id'] ?>" />
                            <div class="form-group mb-4">
                                <textarea cols="30" rows="7" class="form-control" id="reply_reply" name="reply_reply" placeholder="Message here..."></textarea>
                            </div>
                            
                            <div class="hide" style="display: none;">
                                <div class="row mb-2"> 
                                    <div class="form-group col-md-6 col-sm-6"> 
                                        <label>Name<strong style="font-size: 10px;">[Required]</strong></label>
                                        <input type="text" id="reply_name" name="reply_name" class="form-control" required />
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6"> 
                                        <label>Email<strong style="font-size: 10px;">[Required]</strong></label>
                                        <input type="email" id="reply_email" name="reply_email" class="form-control" required />
                                    </div>
                                </div> 
                                
                                <div class="form-group text-right"> 
                                    <button class="btn btn-primary btn-sm" type="button" id="submit-reply<?php echo $comment->id ?>">Submit</button>
                                </div>
                            </div>
                        <?php echo form_close() ?> 
                    </div>                
                              
                    <!-- All replies to a comment -->
                    <div class="replies_here" id="replies_to_comment_<?php echo $comment->id ?>" data-commentid="<?php echo $comment->id ?>" data-postid="<?php echo $post['id'] ?>">
                        <?php if(count($replies) > 0): ?>
                            <?php foreach($replies as $reply): ?>
                                <header class="comment-header">
                                    <img src="assets/img/p.png" alt="" class="profile-pic" width="50px" height="50px"/>
                                    <div class="comment-author"><div class="comment-name"><?php echo $reply->name ?></div>
                                    <div class="comment-date"><?php echo date('d F Y', strtotime($reply->created_at))?> at <?php echo date('h:i a', strtotime($reply->created_at)) ?></div>
                                </header>

                                <div class="comment-content">
                                    <p><?php echo $reply->reply ?></p>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php else:?>
                <h2 id="first_to_comment">No comment yet. Be the first to comment</h2>
            <?php endif; ?>  
        </div>
    </div>
</section>


<section id="recent_post"> 
    <div class="container" style="width: 66%; margin-top: 5rem;">        
        <h5>Recent posts here</h5>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('#header').css('position','fixed');

        $('.section-reply textarea').on('click',function(){
            $('.section-reply .hide').show();
        });

        // Validate form
        $("#comment_form").validate({
            rules: {
                comment: "required",
                name: "required",
                email: "required"
            }
        }); 

        $('.reply-btn').on('click', function(e){
            e.preventDefault();

            var comment_id = $(this).attr('data-id');
            $(this).siblings('#comment_reply_form_'+comment_id).toggle(500);

            $('#comment_reply_form_'+comment_id+' textarea').on('click', function(){
                $('#comment_reply_form_'+comment_id+' .hide').show();
            });

            $('#comment_reply_form_'+comment_id).validate({
                rules: {
                    reply_reply: "required",
                    reply_name: "required",
                    reply_email: "required"
                }
            });

            $('#submit-reply'+comment_id).on('click', function(e){
                e.preventDefault();

                if(!$('#comment_reply_form_'+comment_id).valid())
                {
                    return;
                }

                var frmData = new FormData();

                var temp = $('#comment_reply_form_'+comment_id).serializeArray({checkboxesAsBools: false});
                console.log(temp);
                $.each(temp, function(key, input){
                    frmData.append(input.name.replace('reply_',''), input.value);
                });

                $.ajax({
                    url: '<?php echo base_url() ?>/reply/saveReply',
                    type: 'POST',
                    data: frmData,
                    processData: false,
                    contentType: false,
                    enctype: 'multipart/form-data',
                    beforeSend: function(){
                        $("#submit-reply"+comment_id).attr('disabled','disabled');
                    },

                    success: function(response)
                    {
                        if(response == 'success')
                        {
                            $("#submit-reply"+comment_id).removeAttr('disabled');
                            $('#comment_reply_form_'+comment_id)[0].reset();
                            $('#comment_reply_form_'+comment_id).hide();
                            swal("Success", 'Reply added successfully', 'success');
                        }

                        else{
                            swal("Status",response,"info");
                        }
                    },

                    error: function(response)
                    {
                        $("#submit-reply"+comment_id).removeAttr('disabled');
                        swal("Error","Unable to add Reply","error");
                    }
                });


            });
        });
    });

    function addComment(){
        if(!$("#comment_form").valid()){
            return;
        }

        $.ajax({
            url: '<?php echo base_url() ?>/comment/saveComment',
            type: 'post',
            data: $("#comment_form").serialize(),
            dataType: 'JSON',
            enctype: 'multipart/form-data',
            beforeSend: function(){
                $("#submit_comment").attr('disabled','disabled');
                $('#comment_form').css('opacity','.5');
            },
            success: function(response){
                if(response.status == 'success')
                {
                    $('#comment_form')[0].reset();
                    swal("Success", 'Comment added successfully', 'success');
                    $("#submit_comment").removeAttr('disabled');
                    $('#comment_form').css('opacity','');
                    $('#comments_here').prepend(response.comment);
                    $('#first_to_comment').hide();
                }

                else{
                    swal("Status",response,"info");
                }
            },

            error: function(response){
                swal("Error", 'Unable to add comment, please try again', "error");
                $("#submit_comment").removeAttr('disabled');
                $('#comment_form').css('opacity','');
            }
        })
    }
    // function addReply(id)
    // {
    //     if(!$('#comment_reply_form_'+id).valid())
    //     {
    //         return;
    //     }

    //     $.ajax({
    //         url: '<?php echo base_url() ?>/reply/saveReply',
    //         type: 'post',
    //         data: $('#comment_reply_form_'+id).serialize(),
    //         dataType: 'JSON',
    //         enctype: 'multipart/form-data',
    //         beforeSend: function(){
    //             $("#submit-reply"+id).attr('disabled','disabled');
    //         },

    //         success: function(response)
    //         {
    //             console.log(data);
    //             if(response == 'success')
    //             {
    //                 $("#submit-reply"+id).removeAttr('disabled');
    //                 $('#comment_reply_form_'+id)[0].reset();
    //                 $('#comment_reply_form_'+id).hide();
    //                 // $('#replies_to_comment_'+id).append(response.reply);
    //                 swal("Success", 'Reply added successfully', 'success');
    //             }

    //             else{
    //                 swal("Status",response,"info");
    //             }
    //         },

    //         error: function(response)
    //         {
    //             console.log(data);
    //             // console.log(response);
    //             $("#submit-reply"+id).removeAttr('disabled');
    //             swal("Error","Unable to add Reply","error");
    //         }
    //     });
    // }
</script>