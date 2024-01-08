<?php

include_once "action.php";
include "./header.html";

$c = 0;
if (isset($_SESSION['user_login'])) {
    echo "<div class='container' id='logIn'><a href='admin_panel.php' class='log-link'>Log in to the administrative panel</a><br>";
    echo "<a href='action.php?action=logout' class='log-link'>Log out of your account</a></div>";
} else {
    echo "<div class='container' id='logIn'><a href='autorize.php' class='log-link'>Sign in</a><br>";
    echo "<a href='registration.php' class='log-link'>Register now</a></div>";
}

$out = out(5);

if (count($out) > 0) {
  echo '          <div class="container" bis_skin_checked="1">
  <div class="row" bis_skin_checked="1">
    <div class="section-title" bis_skin_checked="1" id="news">
      <h2>Recent World News</h2>
    </div>
  </div>
</div>';
    foreach ($out as $row) {

        ?>
<div class='container'>
    <div style="color: #999999;border-bottom:2px solid #999999;"><h3><?php echo $row['title']; ?></h3></div>
    <div style="background:#fafafa;padding:5px;"><?php echo $row['message']; ?></div>
    <div style="color: #999999; border-bottom:1px solid #999999;padding:5px;">Author: <span
            style="color: #444;font-weight: bold;"><?php echo $row['nickname']; ?></span></div>
    <div style="color: #999999; border-top:1px solid #999999;padding:5px;">Date of publication: <?php echo $row['date']; ?>
    </div>
</div>
<?php
}
} else {
    echo "<div class='container'><p>There are currently no articles...</p>";
}

include "footer.html";
