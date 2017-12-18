<?php
    require_once('include/sendemail.php';
    include_once('include/header.php');
?>

<header id="head" class="secondary">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <h1>Contact us</h1>
            </div>
        </div>
    </div>

</header>

<!-- container -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3 class="section-title" style="margin-bottom: 10px;">Your Message</h3>

            <p>
                <feedback>If you have any comments,&nbsp;questions or suggestions to our institute you can leave your message
                    here.&nbsp;We welcome your comments, suggestions, and questions by filling the form below.
                </feedback>
            </p>

            <form id="defaultForm" class="form-light mt-20" role="form" action="" method="post">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Your name" required>
                </div>
                <div class="row">
                    
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email address" required>
                        </div>
                    
                    
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="mobile" placeholder="Phone number">
                        </div>
                    
                </div>
                <div class="form-group">
                    <label>Subject</label>
                    <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                </div>
                <div class="form-group">
                    <label>Message</label>
                    <textarea class="form-control" id="message" name="message" placeholder="Write you message here..."
                              style="height:100px;" required></textarea>
                </div>
                <button name="sendMsg" type="submit" class="btn btn-two">Send message</button>
                <p><br/></p>
            </form>
        </div>

        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="section-title" style="margin-bottom: 10px;">Phnom Penh Office</h3>

                    <div class="contact-info">
                        <h5>ADDRESS</h5>

                        <p>#253, 255 E0, Borey BipupThmey-Boeung Chhouk Road 2011 (Ouknhar Tri Heng Road), Street E;
                            Khan Posenchey, Phnom Penh, Cambodia;</p>

                        <h5>PHONE</h5>

                        <p>(+855)78 777 384</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3 class="section-title" style="margin-bottom: 10px;">Timing</h3>

                    <div class="contact-info">
                        <h5>Business Hour</h5>
                        
                            <h5>Monday - Friday</h5>

                            <p>8:00 AM - 5:00 PM</p>
                        
                            <h5>Saturday</h5>

                            <p>8:00 AM - 12:00 AM</p>

                    </div>
                </div>
            </div>

            <div class="row">
                <div style="text-decoration:none; overflow:hidden; height:400px; width:600px; max-width:100%;">
                    <div id="gmap-canvas" style="height:300px; width:585px;max-width:100%;">
                        <div class="contact_info">
                                <h3>Find Us Here</h3>
                                <div class="iframe-container">
                                    <!--<iframe src="https://www.google.com/maps/d/embed?mid=1R8W9hGTP1ViFRQIThG6c54BeGPo" width="500" height="300"></iframe>-->
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7651.980214089791!2d104.06676613738055!3d11.314617189534339!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3108e8f0cdf32b35%3A0xadc8d363bd3d1c6c!2sKirirom+Institute+of+Technology!5e1!3m2!1sen!2skh!4v1501486739571" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>
                            </div>
                    </div>
                            </div>

                    <a class="embed-map-html" href="https://www.embed-map.com" id="auth-map-data">embedmap</a>
                    <style>#gmap-canvas .map-generator {
                        max-width: 100%;
                        max-height: 100%;
                        background: none;
                    }
                    </style>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- /container -->


<?php include_once('include/footer.php'); ?>