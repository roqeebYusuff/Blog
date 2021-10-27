<section class="all-blogs" style="margin-top: 50px;">
    <div class="container"> 
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
                // Get page number
                if(isset($_GET['page'])){
                    $pageno=$_GET['page'];
                }

                else{
                    $pageno=1;
                }
                
                //number of posts to be displayed on a page
                $post_per_page= 12;
                
                $calc=($pageno) * $post_per_page;

                $start = $calc - $post_per_page;

                $nrows = $number_rows;
                $posts = $result;           
            ?>

            <?php foreach($posts as $post): ?>
                <div class="col">
                    <a href="<?php echo base_url() ?>blog/new-blog.php?s=<?php echo $post->slug ?>">
                    <div class="card h-100 hover-shadow">
                        <img src="assets/img/<?php echo $post->image ?>"class="card-img-top" alt="..." height="220px" />
                        <div class="card-body">
                            <h5 class="card-title"><a href="<?php echo base_url() ?>blog/new-blog.php"><?php echo $post->title ?></a></h5>
                            <div class="card-text">
                                <div class="blog-post-author" > 
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

            <?php
                //Pagination
                $total_pages = ceil($nrows/$post_per_page);

                $pagination='';

                if($pageno <=1 ){
                    $pagination .= "<li class='page-item disabled'><a class='page-link'>&laquo; </a></li>";
                }

                else{
                    $j = $pageno - 1;
                    $pagination .= "<li class='page-item'><a class='page-link' href='?page=$j'> &laquo; </a></li>";
                }

                if($total_pages <= 10)
                {    
                    for($i=1; $i <= $total_pages; $i++){
                        if($i<>$pageno){
                            $pagination .= "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
                        }
                        
                        else{
                            $pagination .= "<li class='page-item active'><a class='page-link' href=''>$i</a></li>";
                        }
                    }
                }

                elseif($total_pages > 10)
                {
                    if($pageno <=6)
                    {
                        for($i=1; $i<8; $i++)
                        {
                            if($i == $pageno){
                                $pagination .= "<li class='page-item active'><a class='page-link' href=''>$i</a></li>";
                            }

                            else
                            {
                                $pagination .= "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
                            }
                        }

                        $pagination .= "<li class='page-item'><a class='page-link'>...</a></li>";
                        $s_last = $total_pages - 1;
                        $pagination .= "<li class='page-item'><a class='page-link'href='?page=$s_last'>$s_last</a></li>";
                        $pagination .= "<li class='page-item'><a class='page-link'href='?page=$total_pages'>$total_pages</a></li>";
                    }

                    elseif ($pageno > 6 && $pageno < $total_pages - 6)
                    {
                        $pagination .= "<li class='page-item'><a class='page-link'href='?page=1'>1</a></li>";
                        $pagination .= "<li class='page-item'><a class='page-link'href='?page=2'>2</a></li>";
                        $pagination .= "<li class='page-item'><a class='page-link'>...</a></li>";

                        for($i=$pageno - 2; $i < $pageno + 2; $i++)
                        {
                            if($i == $pageno){
                                $pagination .= "<li class='page-item active'><a class='page-link' href=''>$i</a></li>";
                            }

                            else
                            {
                                $pagination .= "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
                            }
                        }
                        $pagination .= "<li class='page-item'><a class='page-link'>...</a></li>";
                        $s_last = $total_pages - 1;
                        $pagination .= "<li class='page-item'><a class='page-link'href='?page=$s_last'>$s_last</a></li>";
                        $pagination .= "<li class='page-item'><a class='page-link'href='?page=$total_pages'>$total_pages</a></li>";
                    }

                    else
                    {
                        $pagination .= "<li class='page-item'><a class='page-link'href='?page=1'>1</a></li>";
                        $pagination .= "<li class='page-item'><a class='page-link'href='?page=2'>2</a></li>";
                        $pagination .= "<li class='page-item'><a class='page-link'>...</a></li>";

                        for($i=$total_pages - 6; $i <= $total_pages; $i++)
                        {
                            if($i == $pageno){
                                $pagination .= "<li class='page-item active'><a class='page-link' href=''>$i</a></li>";
                            }

                            else
                            {
                                $pagination .= "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
                            }
                        }
                    }
                }   

                if($pageno == $total_pages ){
                    $pagination .= "<li class='page-item disabled'><a class='page-link'href=''>&raquo;</a></li>";
                }
                else{
                    $j = $pageno + 1;
                    $pagination .= "<li class='page-item'><a class='page-link' href='?page=$j'>&raquo;</a></li>";
                }
            ?>
        </div>
        <nav class="paginate" aria-label="...">
            <ul class="pagination pagination-circle justify-content-center">
                <?php echo $pagination; ?>
            </ul>
        </nav>
    </div>
</section>