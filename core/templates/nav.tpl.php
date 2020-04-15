<section>
    <nav >  <?php if (in_array($form['action'], ['register.php', 'login.php','index.php', 'logout.php'])): ?>

        <ul><?php print $title; ?>
            <li><a href="index.php"><?php print 'Home'; ?></a></li>
            <li><a href="login.php"><?php print 'Login'; ?></a></li>
            <li><a href="register.php"><?php print 'Register'; ?></a></li>
            <li><a href="logout.php"><?php print 'Logout'; ?></a></li>
        </ul>
    </nav>
</section>


if(isset register.php print 'New to this page, please register here');
if(isset logout.php print 'You are not logged in')