<?php
/**
 * Loggs in a user with a form for the institution of creating a user.
 */

$loginForm = new Form( array(
    'action' => new Action( array( 'User', 'handleUserLogin' ) ),
    'fields' => array(
        new TextField( array(
            'name'        => 'user_email',
            'placeholder' => 'example@email.com',
            'public'      => array(
                'title'  => 'Username',
            ),
        ) ),
        new PasswordField( array(
            'name'             => 'password',
            'placeholder'      => 'secretpass',
            'submit-on-return' => true,
            'public'           => array(
                'title' => 'Password',
            ),
        ) ),
        new SubmitField( array(
            'name'  => 'submit',
            'value' => 'Login',
        ) ),
    )
), false );


$bodyClasses = array( 'login' );

include __DIR__ . '/../components/header.php'; ?>

    <div id="login-form">

        <?php echo $loginForm ?>

    </div>

<?php include __DIR__ . '/../components/footer.php'; ?>
