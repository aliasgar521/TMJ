<!DOCTYPE html>
<html>
<?php
  function runMyFunction() {
    echo 'I just ran a php function';
  }

  if (isset($_GET['hello'])) {
    runMyFunction();
  }
?>

Hello there!
<a href='test.php?hello=true'>Run PHP Function</a>
</html>