<?php $this->start('body'); ?>
    <form action="../home/insertUser" method="post">
        <input type="text" placeholder="Username" name="username"><br>
        <input type="text" placeholder="Email" name="email"><br>
        <input type="password" placeholder="Password" name="password"><br>
        <input type="submit" value="register"><br>
    </form>
<?php $this->end(); ?>
