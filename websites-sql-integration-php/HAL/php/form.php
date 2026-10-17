<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>

<section class="login-section">
```html
<!--
    card is a box holding everything together
-->
<div class="login-card">

    <!--
        contains heading
    -->
    <div class="login-header">
        <h2>Login</h2>
        <p>Sign in to continue</p>
    </div>


    <!--
       form> contains form
        action= "login.php">> location where data is sent
        method= "POST" >> send data rather than adding into url.
    -->
    <form action="login.php" method="POST">

        <div class="form-group">

            <!--
                The <label> identifies the input field for the user.
                for="user_id" >> connects label with id
            -->
            <label for="user_id">User ID</label>

            <input
                type="text"
                id="user_id"
                name="user_id"
                placeholder="Enter your User ID"
                required
            >

        </div>

        <div class="form-group">

            <!--
                The <label> identifies the input field for the user.
                for="password" >> connects label with id
            -->
            <label for="password">Password</label>


            
            <div class="password-wrapper">
                   
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                >


                <!--
                    This button allows the user to show or hide
                    the password.

                    type="button"
                    ---------------
                    This is important because the button is inside
                    a <form>. Setting its type to "button" prevents
                    it from submitting the form.

                    class="show-password"
                    ---------------------
                    Provides a CSS class that can be used to style
                    the eye button.

                    onclick="togglePassword()"
                    --------------------------
                    Calls the JavaScript function "togglePassword()"
                    whenever the user clicks the eye icon.

                    That JavaScript function is responsible for
                    changing the password field between hidden
                    and visible text.
                -->
                <button type="button"
                        class="show-password"
                        onclick="togglePassword()">

                    <!--
                        The eye symbol provides a visual indication
                        that this button controls password visibility.
                    -->
                    👁

                </button>

            </div>

        </div>


        <!--
            This section contains additional options related
            to the login process.

            It contains:
            1. The "Remember me" checkbox.
            2. The "Forgot Password?" link.
        -->
        <div class="login-options">


            <!--
                This label contains the "Remember me" checkbox
                and its text.

                Placing the checkbox and text inside the same
                label makes the text clickable as well.
            -->
            <label class="remember-me">

                <!--
                    This checkbox allows the user to indicate that
                    they want the website to remember their login.

                    name="remember"
                    ----------------
                    Gives the checkbox a name so its value can be
                    identified when the form is submitted.
                -->
                <input type="checkbox" name="remember">

                <!--
                    <span> contains the visible text displayed
                    next to the checkbox.
                -->
                <span>Remember me</span>

            </label>


            <!--
                This link takes the user to the password recovery
                page if they cannot remember their password.

                href specifies the PHP page that should be opened
                when the link is clicked.
            -->
            <a href="forgot-password.php">
                Forgot Password?
            </a>

        </div>


        <!--
            This is the main button used to submit the login form.

            type="submit"
            ---------------
            Tells the browser that clicking this button should
            submit the surrounding <form>.

            Since the form specifies:

                action="login.php"

            the browser sends the form data to login.php.
        -->
        <button type="submit" class="login-btn">

            <!--
                This text is displayed inside the login button.
            -->
            Login

        </button>

    </form>

</div>


<!--
    The closing </section> indicates the end of the section
    that contains the login card.

    The opening <section> is not included in the code shown
    above, so it is assumed to exist earlier in the page.
-->
</section>


<?php

/*
    include 'headerfooter.php';

    The PHP include statement loads the contents of another
    PHP file into the current page.

    This is useful when a website has common components,
    such as a header or footer, that are reused on multiple
    pages.

    Instead of writing the same header/footer HTML on every
    page, it can be stored in one file and included wherever
    it is needed.
*/
include 'headerfooter.php';

?>
```

</body>
</html>