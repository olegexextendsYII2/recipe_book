<? require 'header.php'; ?>

 <div class="back-top" id="back-top">
      <a href="/" class="btn btn-block btn-lg btn-danger">рецепты</a>
    </div>
<div class="container">

   

    <!-- login box on left side -->
    <div class="login-box" style="width: 50%; display: block;">
        <h2>Зарегистрировать новую учетную запись</h2>

        <!-- register form -->
        <form method="post" action="/register_action">
            <!-- the user name input field uses a HTML5 pattern check -->
            <input type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" placeholder="" required />
            <input type="text" name="user_email" placeholder="email address (a real address)" required />
           
            <input type="password" name="user_password" pattern=".{6,}" placeholder="Password (6+ characters)" required  />
            
            <!-- show the captcha by calling the login/showCaptcha-method in the src attribute of the img tag -->
          

            <!-- quick & dirty captcha reloader -->
           

            <input type="submit" value="Register" />
        </form>
    </div>
</div>
<div class="container">
    <p style="display: block; font-size: 11px; color: #999;">
        <h1>Зарегистрируйтесь</h1>
    </p>
</div>
<? require 'footer.php'; ?>
