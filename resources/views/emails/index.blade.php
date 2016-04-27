<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Verify Your Email Address</h2>

        <div>
            Thanks for creating an account with our greetingcard shop.
            To complete your sign up, please verify your email using the following link:<br/>
            {{ URL::to('register_verify_' .  $confirmation_code ) }}.
            <br/>

        </div>
        <p>Cheers,</p>
        <h3>The Kebroke Team</h3>

    </body>
</html>
