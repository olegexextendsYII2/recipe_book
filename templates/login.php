

<? require 'header.php'; ?>

<div class="container">
<div class="back-top" id="back-top">
      <a href="/" class="btn btn-block btn-lg btn-danger">рецепты</a>
    </div>
    <!-- echo out the system feedback (error and success messages) -->
   
    <div class="login-page-box">
        <div class="table-wrapper">

            <!-- login box on left side -->
            <div class="login-box">
                <h2>Login here</h2>
                <form action="/login_action" method="post">
                    <input type="text" name="user_name" placeholder="Username or email" required />
                    <input type="password" name="user_password" placeholder="Password" required />
                   
                    
                    <input type="submit" class="login-submit-button" value="Log in"/>
                </form>
               

        </div>
    </div>
</div>
<? require 'footer.php'; ?>
