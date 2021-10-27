<section class="all-blogs" style="margin-top: 50px;">
    <div class="container"> 
        <div class="row row-cols-1 row-cols-md-3 g-4">

            <?php if(! empty($posts) && is_array($posts)): ?>
                <?php foreach($posts as $post): ?>
                    <div class="col">
                        <a href="<?php echo base_url() ?>/<?php echo $post->slug ?>">
                        <div class="card h-100 hover-shadow">
                            <img src="assets/uploads/post-pictures/<?php echo $post->image ?>"class="card-img-top" alt="..." height="220px" />
                            <div class="card-body">
                                <h5 class="card-title"><a href="<?php echo base_url() ?>/<?php echo $post->slug ?>"><?php echo $post->title ?></a></h5>
                                <div class="card-text">
                                    <div class="blog-post-author"> 
                                        <div class="blog-post-author-avatar"> 
                                            <img src="assets/img/p.png" width="17" height="17" class="profile-pic">
                                        </div>

                                        <div class="blog-post-author-name"> 
                                            <?php echo $post->author ?>
                                        </div>
                                    </div>

                                    <div class="blog-post-date" style="font-size: 12px"> 
                                        <i class="fas fa-calendar" style="font-size: 10px;"></i><?php echo date('d F', strtotime($post->created_at)) ?>
                                    </div>

                                    <div class="blog-post-views" style="font-size: 12px;"> 
                                        <i class="fas fa-eye" style="font-size: 10px;"></i><?php echo $post->views ?>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        </a>               
                    </div>
                <?php endforeach; ?>
                
            <?php else: ?>
                <h3>No news</h3>
                <p>Unable to find any news for you</p>
            <?php endif; ?>
        </div>
        <nav class="paginate" aria-label="...">
            <ul class="pagination pagination-circle justify-content-center">
                
            </ul>
        </nav>
    </div>
</section>