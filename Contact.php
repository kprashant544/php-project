<?php include('layout/header.php'); ?>

    <!-- Contact Form section -->
     <section class="search text-center">
        <div class="container">
            <section class="contact">
                <div class="container">
                    <h2 class="text-center text-white contact-heading">Send us a Message</h2>
                    <form action="" class="form-horizontal">
                        <label for="">Name</label>
                        <input class="form-control" type="text" name="name" id="name" placeholder="Enter your name..">
        
                        <label for="">Email</label>
                        <input class="form-control" type="text" name="email" id="email" placeholder="Enter your email..">
        
                        <label for="">Message</label>
                        <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Enter your message.."></textarea>
        
                        <a href="index.php"><h3 class="btn btn-primary">Submit</h3></a>
                    </form>
                </div>
            </section>
        </div>
    </section>
    <!-- Contact Form Section Ends -->
   
    <?php include('layout/footer.php'); ?>
