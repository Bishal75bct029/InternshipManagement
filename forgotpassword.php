<?php 
	require_once 'includes/header.php';

?>
<body>
    
<div class="justify-content-center align-items-center container">
    <div class="card py-5 px-3 mt-4 col-lg-5">
        <h5 class="m-0">Enter your registered email address</h5><span class="mobile-text"> <b class="text-danger"></b></span>
        <div class="d-flex flex-row mt-5"><input type="email" id="email" name = "email" placeholder="Your email here" class="form-control" autofocus=""></div>
        <div class="content text-danger"></div>
        <div class="mt-4">

            <button type="submit" class=" btn btn-sm btn-primary" onclick="sendOtp()">Send OTP</button>
        </div>
    </div>
</div>
    
<div class=" justify-content-center align-items-center container hidecontent" >
    <div class="card py-5 px-3 mt-4 col-lg-5">
        <h5 class="m-0">Email verification</h5><span class="mobile-text">Enter the code we just send on your email <b class="text-danger"></b></span>
        <div class="d-flex flex-row mt-5"><input type="text" class="form-control text-center" autofocus="" placeholder="Enter the 4-digits code"></div>
        <div class="text-center mt-5"><span class="d-block mobile-text">Don't receive the code?</span><span class="font-weight-bold text-danger cursor">Resend</span></div>
    </div>
</div>
<style>
    .hidecontent, .container{
        margin-left: 390px ;
    }
    .hidecontent{
        display: none;
    }
</style>
<script>
    function sendOtp(){
        var emails = jQuery('#email').val()
        // console.log(emails);
        jQuery.ajax({
            url:'otp.php',
            type:'post',
            data:{
                email:emails
            },
            success:function(result){
                // header('location:login.php');
                // var result = value.split(',')
                console.log(result);
                if(result == "\nyes"){
                    jQuery('.container').hide()
                    jQuery('.hidecontent').show()
                    console.log('Hi')

                }else{
                    jQuery('.content').html('Please enter the valid email');
                }
            }

        })
    }
</script>
</body>