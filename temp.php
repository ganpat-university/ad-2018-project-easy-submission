<html>
<body>
<?php
    $a=1;
    session_start();
?>
<?php if($_SESSION['identity']="Student") : ?>
    <a href="http://yahoo.com">This will only display if $condition is true</a>
<?php endif; ?>

</body>
</html>