<?php $this->start('body'); ?>
<form action="<?=PROOT?>user/login" method='post'>
    <input type="text" placeholder="Email" name="email"><br>
    <input type="password" placeholder="Password" name="password"><br>
    <input type="submit" value="submit"><br>
    Remember Me<input type="checkbox" name="rememberCheck">
</form>
<?php $this->end(); ?>