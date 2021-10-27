<section id="land">
    <div class="lay lay-bg"></div>
    <div class="container">
        <div class="d-flex justify-content-center align-items-center">
            <div class="content" style="height: 100vh;"> 
                <h1>Just a Blog</h1>
                <h3>Nothing else</h3>
                <!-- <a href="#">Get started</a> -->

                <div class="down"> 
                    <div class="animate__animated animate__heartBeat animate__infinite"> 
                        <a href="#header"><i class="ion-arrow-down-c"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<header id="header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="/" >TheRoq</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> 
                <div class="animate-icon"> <span></span> <span></span> <span></span> </div>
            </button>

            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav nav-menu ml-auto">
                    <li class="nav-item"> 
                        <a data-ripple-color="white" class="nav-link ripple" href="<?php echo base_url() ?>">Home</a>
                    </li>
                    <li class="nav-item"> 
                        <a data-ripple-color="white" class="nav-link ripple" href="<?php echo base_url() ?>/blog">Blog</a>
                    </li>
                    <li class="nav-item"> 
                        <a data-ripple-color="white" class="nav-link ripple" href="<?php echo base_url() ?>/contact">Contact</a>
                    </li>
                    <li class="nav-item"> 
                        <a data-ripple-color="white" class="nav-link ripple" href="<?php echo base_url() ?>/about">About</a>
                    </li>
                    <li class="nav-item dropdown"> 
                        <a class="nav-link" id="dropdown-menu" role="button" data-toggle="dropdown" aria-expanded="false">Others<i class="fas fa-caret-down"> </i></a>

                        <ul class="dropdown-menu shadow-3-strong" aria-labelledby="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another Action</a></li>
                            <li><a class="dropdown-item" href="#">Some other action</a></li>
                        </ul>                              
                    </li>
                </ul>
            <div>
        </div>
    <nav>
</header>

<section id="feature"> 
    <div class="section-header">
        <h3>How can I help you?</h3>
    </div>
    
    <div class="conatiner">
        <div class="row no-gutters"> 
            <div class="col-md-4 d-flex align-items-stretch"> 
                <div class="offer-deal text-center px-2 px-lg-5"> 
                    <div class="icon d-flex justify-content-center align-items-center"> 
                        <span> </span>
                    </div>
					<div class="img" style="background-image: url(assets/img/img2.jpg);"> </div>
                    <div class="text mt-4"> 
                        <h3 class="mb-4">Service One</h3>
                        <p class="mb-5">Subtitle Here</p>
                        <p> 
                            <a href="#" class="btn btn-white px-4 py-3">Action Here
                                <span class="ion-ios-arrow-round-forward"> </span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex align-items-stretch"> 
                <div class="offer-deal active text-center px-2 px-lg-5" style="background: #ece5e5;"> 
                    <div class="img" style="background-image: url(assets/img/img2.jpg);"> </div>
                    <div class="text mt-4"> 
                        <h3 class="mb-4">Service Two</h3>
                        <p class="mb-5">Subtitle Here</p>
                        <p> 
                            <a href="#" class="btn btn-white px-4 py-3">Action Here
                                <span class="ion-ios-arrow-round-forward"> </span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex align-items-stretch"> 
                <div class="offer-deal text-center px-2 px-lg-5"> 
                    <div class="img" style="background-image: url(assets/img/img2.jpg);"> </div>
                    <div class="text mt-4"> 
                        <h3 class="mb-4">Another Service</h3>
                        <p class="mb-5">Another Subtitle Here</p>
                        <p> 
                            <a href="#" class="btn btn-white px-4 py-3">Another Action Here
                                <span class="ion-ios-arrow-round-forward"> </span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="latest-blogs"> 
    
    <div class="section-header">
        <h3>Blog</h3>
        <h2>Recent Posts</h2>
    </div>
    <div class="container">
        <?php $times = 0; ?>
        <div class="row">
            
            <?php if($result == 'Error'): ?>
                <div class="col-md-6">
                    No Post yet
                </div>
            <?php else: ?>
                <?php foreach($result as $post): ?>
                    <!-- <?php print_r($result); ?> -->
                    <div class="col-md-6"> 
                        <div class="blog-col">                     
                            <a href="<?php echo base_url()?>/<?php echo $post->slug ?>" class="block-1" style="background-image: url('assets/img/new.jpg');"> </a>

                            <div class="blog p-4 text-center"> 
                                <h2 class="title">
                                    <a href="<?php echo base_url()?>/<?php echo $post->slug ?>"><?php echo $post->title ?></a>
                                </h2>
                                <p class="author"> by Roqeeb | Updated <?php echo date('F d Y', strtotime($post->created_at)); ?></p> 
                                <p class="info">Interested in learning how to start a business – Elna Cain to help with freelance writers and Twins Mommy to help moms Thankladflflsdfhbsdbfjladnljbsdjbljdbsf sdbk,</p>
                            </div>
                            <a class="btn btn-primary px-2 py-4" href="<?php echo base_url()?>/<?php echo $post->slug ?>">Read More</a>
                        </div>
                    </div>

                    <?php 
                        $times++;

                        if($times == 4)
                        {
                            break;
                        }
                    ?>
                <?php endforeach; ?>
            <?php endif; ?>
            
        </div>

        <div class="row justify-content-center mt-5 mb-5 read-more"> 
            <div class="col-md-12 text-center"> 
                <a href="<?php echo base_url() ?>/blog" class="btn btn-light pt-4 pb-4">Read more Blogs</a>
            <div>
        </div>
    </div>
</section>

<section id="testimonials">
    <div class="container"> 
        <div class="section-header">
            <h3 style="padding-top: 20px;">What People are Saying</h3>
        </div> 

        <div class="owl-carousel owl-theme" >
            <div class="single-carousel ">
                <div class="testimony-wrap pb-4"> 
                    <div class="comment"> 
                        <i class="fas fa-quote-left"> </i>
                        <p class="md-4"> 
                            Once again you give a remarkable insight on what you do. Blah blah blah blah blah blah  blah ablha blah blah blah blah blah blah blah
                        </p>
                        <i class="fas fa-quote-right"> </i>
                    </div>

                    <div class="content mt-5"> 
                        <div class="c-img" style="background-image: url('assets/img/person4.jpg')"> </div>
                        <div class="mt-3"> 
                            <h1>Roqeeb</h1>
                            <h4>Scientist</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="single-carousel ">
                <div class="testimony-wrap pb-4"> 
                    <div class="comment"> 
                        <i class="fas fa-quote-left"> </i>
                        <p class="md-4"> 
                            Once again you give a remarkable insight on what you do. Blah blah blah blah blah blah blah ablha blah blah blah blah blah blah blah
                        </p>
                        <i class="fas fa-quote-right"> </i>
                    </div>

                    <div class="content mt-5"> 
                        <div class="c-img" style="background-image: url('assets/img/person4.jpg')"> </div>
                        <div class="mt-3"> 
                            <h1>Roqeeb</h1>
                            <h4>Scientist</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="single-carousel ">
                <div class="testimony-wrap pb-4"> 
                    <div class="comment"> 
                        <i class="fas fa-quote-left"> </i>
                        <p class="md-4"> 
                            Once again you give a remarkable insight on what you do. Blah blah blah blah blah blah blah ablha blah blah blah blah blah blah blah
                        </p>
                        <i class="fas fa-quote-right"> </i>
                    </div>

                    <div class="content mt-5"> 
                        <div class="c-img" style="background-image: url('assets/img/person4.jpg')"> </div>
                        <div class="mt-3"> 
                            <h1>Roqeeb</h1>
                            <h4>Scientist</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="single-carousel ">
                <div class="testimony-wrap pb-4"> 
                    <div class="comment"> 
                        <i class="fas fa-quote-left"> </i>
                        <p class="md-4"> 
                            Once again you give a remarkable insight on what you do. Blah blah blah blah blah blah blah ablha blah blah blah blah blah blah blah
                        </p>
                        <i class="fas fa-quote-right"> </i>
                    </div>

                    <div class="content mt-5"> 
                        <div class="c-img" style="background-image: url('assets/img/person4.jpg')"> </div>
                        <div class="mt-3"> 
                            <h1>Roqeeb</h1>
                            <h4>Scientist</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="single-carousel ">
                <div class="testimony-wrap pb-4"> 
                    <div class="comment"> 
                        <i class="fas fa-quote-left"> </i>
                        <p class="md-4"> 
                            Once again you give a remarkable insight on what you do. Blah blah blah blah blah blah blah ablha blah blah blah blah blah blah blah
                        </p>
                        <i class="fas fa-quote-right"> </i>
                    </div>

                    <div class="content mt-5"> 
                        <div class="c-img" style="background-image: url('assets/img/person4.jpg')"> </div>
                        <div class="mt-3"> 
                            <h1>Roqeeb</h1>
                            <h4>Scientist</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="single-carousel ">
                <div class="testimony-wrap pb-4"> 
                    <div class="comment"> 
                        <i class="fas fa-quote-left"> </i>
                        <p class="md-4"> 
                            Once again you give a remarkable insight on what you do. Blah blah blah blah blah blah blah ablha blah blah blah blah blah blah blah
                        </p>
                        <i class="fas fa-quote-right"> </i>
                    </div>

                    <div class="content mt-5"> 
                        <div class="c-img" style="background-image: url('assets/img/person4.jpg')"> </div>
                        <div class="mt-3"> 
                            <h1>Roqeeb</h1>
                            <h4>Scientist</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="single-carousel ">
                <div class="testimony-wrap pb-4"> 
                    <div class="comment"> 
                        <i class="fas fa-quote-left"> </i>
                        <p class="md-4"> 
                            Once again you give a remarkable insight on what you do. Blah blah blah blah blah blah blah ablha blah blah blah blah blah blah blah
                        </p>
                        <i class="fas fa-quote-right"> </i>
                    </div>

                    <div class="content mt-5"> 
                        <div class="c-img" style="background-image: url('assets/img/person4.jpg')"> </div>
                        <div class="mt-3"> 
                            <h1>Roqeeb</h1>
                            <h4>Scientist</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="single-carousel ">
                <div class="testimony-wrap pb-4"> 
                    <div class="comment"> 
                        <i class="fas fa-quote-left"> </i>
                        <p class="md-4"> 
                            Once again you give a remarkable insight on what you do. Blah blah blah blah blah blah blah ablha blah blah blah blah blah blah blah
                        </p>
                        <i class="fas fa-quote-right"> </i>
                    </div>

                    <div class="content mt-5"> 
                        <div class="c-img" style="background-image: url('assets/img/person4.jpg')"> </div>
                        <div class="mt-3"> 
                            <h1>Roqeeb</h1>
                            <h4>Scientist</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>       
    </div>
</section>