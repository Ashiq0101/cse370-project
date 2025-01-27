<?php
$active = "Contact";
include('db.php');
include("functions.php");
include("header.php");
?>

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section" style="background-color: #f8f9fa; padding: 15px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text text-center" style="color: #007bff; font-size: 18px; font-weight: bold;">
                    <a href="index.php" style="color: #007bff; text-decoration: none;"><i class="fa fa-home"></i> Home</a>
                    <span style="color: #6c757d;"> / Contact</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Contact Section Begin -->
<section class="contact-section spad" style="background-color: #f1f1f1; padding: 50px 0;">
    <div class="container">
        <div class="row">
            <!-- Contact Form -->
            <div class="col-lg-6">
                <div class="contact-form bg-white p-4 rounded shadow-sm">
                    <div class="leave-comment">
                        <h4 style="color: #007bff;">Leave A Message</h4>
                        <p style="color: #6c757d;">Our staff will respond to your inquiry promptly.</p>
                        <form action="contact.php" method="POST" class="comment-form">
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <input type="text" placeholder="Your Name" class="form-control" name="name" required style="border: 1px solid #ced4da;">
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <input type="email" placeholder="Your Email" class="form-control" name="email" required style="border: 1px solid #ced4da;">
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <input type="text" placeholder="Subject" class="form-control" name="subject" required style="border: 1px solid #ced4da;">
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <textarea placeholder="Your Message" class="form-control" name="message" rows="5" required style="border: 1px solid #ced4da;"></textarea>
                                </div>
                                <div class="col-lg-12">
                                    <button class="btn btn-primary w-100" name="submit" style="background-color: #007bff; border: none;">Send Message</button>
                                </div>
                            </div>
                        </form>

                        <?php
                        if (isset($_POST['submit'])) {
                            $user_name = $_POST['name'];
                            $user_email = $_POST['email'];
                            
                            $user_msg = $_POST['message'];

                            $receiver_mail = 'md.ashikul.islam1@g.bracu.ac.bd';

                            mail($receiver_mail, $user_name, $user_subject, $user_msg, $user_email);
                        }
                        ?>
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="col-lg-5 offset-lg-1">
                <div class="contact-title">
                    <h4 style="color: #007bff;">Contact Us</h4>
                    <p style="color: #6c757d;">We value your inquiries and feedback!</p>
                </div>
                <div class="contact-widget p-4 bg-white rounded shadow-sm">
                    <div class="cw-item mb-3">
                        <div class="ci-icon text-primary">
                            <i class="ti-location-pin"></i>
                        </div>
                        <div class="ci-text">
                            <span style="color: #6c757d;">Address:</span>
                            <p style="color: #212529;">Merul Badda ,Dhaka Bangladesh</p>
                        </div>
                    </div>
                    <div class="cw-item mb-3">
                        <div class="ci-icon text-primary">
                            <i class="ti-mobile"></i>
                        </div>
                        <div class="ci-text">
                            <span style="color: #6c757d;">Phone:</span>
                            <p style="color: #212529;">01789658745</p>
                        </div>
                    </div>
                    <div class="cw-item">
                        <div class="ci-icon text-primary">
                            <i class="ti-email"></i>
                        </div>
                        <div class="ci-text">
                            <span style="color: #6c757d;">Email:</span>
                            <p style="color: #212529;">bloomthreades.@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

<?php
include('footer.php');
?>
