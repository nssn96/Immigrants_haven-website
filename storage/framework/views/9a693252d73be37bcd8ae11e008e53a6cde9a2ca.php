<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/contact.css')); ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script src="../script/query.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
</head>
<body>
  <div id="mydiv">
    <ul>
    <li class="act" id="float"><a href="services">Services</a></li>
        <li class="act active" id="float"><a href="contactus">Contact Us</a></li>
        <li class="act" id="float"><a href="aboutus">About Us</a></li>
        <li class="act" id="float"><a href="http://sxn7873.uta.cloud/blog/">Blog</a></li>
        <li class="act" id="float"><a href="homepage">Home</a></li>
     
    </ul>   
  </div>

    <div class="container">
        <h1>Contact Us</h1>
        <p><b>We would like to respond to your queries and hear your feedback so that we can help you better.</br>
            Feel free to get in touch with us.</b>
        </p>
    

    <div class="contact-box">

        <div class="contact-right">
         <h3>Reach Us</h3>

         <table>
              <tr>
                  <td>Email</td>
                  <td>contactus.immigrants@gmailcom</td>
              </tr>

              <tr>
                  <td>Phone</td>
                  <td>+1 999 999-9999</td>
              </tr>

              <tr>
                  <td>Address</td>
                  <td>Immigrants Inc. 404 Drive</br>
                      404 E Border Street</br>
                    Arlington-76010</br>
                     TX</td>
              </tr>

         </table>


        </div>

        <div class="contact-left">
            <h3>Send your Message</h3>

            <form method="POST" action="contactusmail">
              <?php echo csrf_field(); ?>
                <div class="input-row">

                  <div class="input-group">
                     <label>Name</label>
                     <input type="text" name="name" id="name" placeholder="John Doe" required="required">
                   </div>

                   <div class="input-group">
                    <label>Email</label>
                    <input type="text" name="email" id="email" placeholder="johndoe@gmail.com" required="required">
                  </div>
                </div>

               <div class="input-row">
                 
                <div class="input-group">
                    <label>Phone</label>
                    <input type="text" name="contact" placeholder="+1 999 999-9999" required="required">
                  </div>

                  

                  <div class="input-group">
                    <label>Country</label>
                    <input type="text" name="country" placeholder="India,USA" required="required">
                  </div>
                </div>

                  <div class="input-row">
                  <div class="input-group">
                    <label>Subject</label>
                    <input type="text" id="subject" name="subject" placeholder="Subject of the message" required="required">
                  </div>
                  </div>

               <label>Enquiry</label>
               <textarea  rows="5" id="message" name="message" placeholder="Your Message" required="required"></textarea>

               <input type="submit" value="Send" />

            </form>



        </div>
    </div>
    </div>
</body>
</html><?php /**PATH C:\xampp\xampp\htdocs\laravel\Immigrants_haeven\resources\views/contactus.blade.php ENDPATH**/ ?>