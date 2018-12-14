<?php
$this->start('body'); ?>
<h1>WELCOME TO DASHBOARD</h1>
<h1><?php
echo "email: ". ($_SESSION['email']);
echo "Full Name: ". ($_SESSION['name']);
?><h1>
<a href = "../login/logout">Logout</a>
<a href = "../user/deleteAccount">Delete Account</a>
<?php $this->end() ?>
