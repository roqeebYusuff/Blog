<section class="section-cover an-wrap an-wrap-2" style="background: #1f3888;">
    <div class="container"> 
        <div class="row no-gutters slider-text align-items-center justify-content-center" style="height: 400px;"> 
            <div class="col-md-9 text-center"> 
                <h1 class="text-white">Contact Us</h1>
            </div>
        </div>
    </div>
</section>
<section class="main-section contact-section">
    <div class="container"> 
        <div class="row"> 
            <div class="col-md-1"> 
                <div class="social-warp"> 
                    <p>Follow us on Social Media
                    <div class="social-links"> 
                        <a href="#"> 
                            <i class="fab fa-facebook"> </i>
                        </a>

                        <a href="#"> 
                            <i class="fab fa-twitter"> </i>
                        </a>

                        <a href="#"> 
                            <i class="fab fa-linkedin"> </i>
                        </a>

                        <a href="#"> 
                            <i class="fab fa-instagram"> </i>
                        </a>

                        <a href="#"> 
                            <i class="fab fa-whatsapp"> </i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="container" style="width: 65%">
                <h1>Get in touch</h1>
                <?php echo form_open_multipart('contact/sendmail','id="contact_form" class="form"');?>
                    <div class="row"> 
                        <div class="form-group mb-4"> 
                            <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" title="Your name here" required >
                        </div>

                        <div class="form-group mb-4"> 
                            <input type="email" name="email" id="email" class="form-control" placeholder="Your email" title="Your Email here" required >
                        </div>
                    </div>

                    <div class="form-group mb-4"> 
                        <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject" title="Subject here" required>
                    </div>

                    <div class="form-group mb-4"> 
                        <textarea cols="30" rows="7" name="message" id="message" class="form-control" placeholder="Message..." title="Message here" required></textarea>
                    </div>

                    <div class="form-group col-md-12 text-center"> 
                        <button type="button" class="btn px-5 py-3" onclick="send()">Send Message</button>
                    </div>
                <?php echo form_close() ?>
            </div>            
        </div>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function(){

        $("#contact_form").validate({
            rules: {
                name: "required",
                message: "required",
                email: {
                    required: true,
                    email: true
                },
                subject: "required"
            }                    
        });

        $('.navbar').css("background-color","transparent");        
        $('#header').css("margin-top","15");
        $('#header').css("position","fixed");
        $(window).scroll(function(){
            if($(window).scrollTop() > 150)
            {
                $('.navbar').css("background-color","#1d0769");
                $('#header').css("margin-top","0");
            }
            
            else
            {
                $('.navbar').css("background-color","transparent");
                $('#header').css("margin-top","15");
            }
        });        
    });

    function send()
    {
        if(!$('#contact_form').valid())
        {
            return;
        }


        $.ajax({
            url: '<?php echo base_url() ?>/contact/sendmail',
            method: 'POST',
            dataType: 'JSON',
            data: $('#contact_form').serialize(),

            success: function(response)
            {
                if(response == 'success')
                {
                    swal('Success','Email Successfully sent','success');
                }

                else{
                    swal('Info', response, 'info');
                }
            },

            error: function(response)
            {                
                swal('Error','An Error Occurred','error');
            }
        });
    }
</script>