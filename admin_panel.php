<?php

include_once "./db/dbconnect.php";

ob_start();
session_start();
if (!$_SESSION['user_login']) {
    header("Location: index.php");
    ob_end_flush();
} else {
    include "header.html";
    ob_end_flush();
?>
<div class="container">
    <a href="index.php" class="log-link">Home page</a>
</div>
<div class="container">
    <h3 class="panel-title">Add article</h3>

    <div class="container">           <div class="wpforms-container wpforms-container-full wpforms-render-modern" id="wpforms-87"
bis_skin_checked="1">
<form name="myForm" class="wpforms-validate wpforms-form wpforms-ajax-form" data-formid="87"
  method="post" enctype="multipart/form-data" action="action.php" data-token="24cbe7b24e07a41c9cfd06fef330655f"
  novalidate="novalidate" method="post">

  <input type=hidden name="action" value="add">

  <div class="wpforms-field-container" bis_skin_checked="1">
    <div id="wpforms-87-field_1-container" class="wpforms-field wpforms-field-name" data-field-id="1"
      bis_skin_checked="1">
      <label class="wpforms-field-label" for="title">Title of article:
        <span class="wpforms-required-label" aria-hidden="true">*</span></label><input type="text"
        id="title" class="wpforms-field-large wpforms-field-required"
        name="title" aria-errormessage="wpforms-87-field_1-error" required />
    </div>

    <div id="wpforms-87-field_2-container" class="wpforms-field wpforms-field-email" data-field-id="2"
      bis_skin_checked="1">
      <label class="wpforms-field-label" for="message">Message:
        <span class="wpforms-required-label" aria-hidden="true">*</span></label>
        <textarea name="message" id="message" style="width: 300px;"></textarea>
        <!-- <input type="password"
        id="pas" class="wpforms-field-large wpforms-field-required"
        name="pas" spellcheck="false" aria-errormessage="wpforms-87-field_2-error"
        required /> -->
    </div>
  </div>

  <div class="wpforms-submit-container" bis_skin_checked="1">
      <button type="submit"
      name="submitAdd" id="submitAdd" class="wpforms-submit" data-alt-text="Sending..."
      data-submit-text="Submit" aria-live="assertive" value="wpforms-submit">
      Submit</button>
  </div>
</form>
</div>
</div>

<!-- <form name="myForm" action="action.php" method="post" onSubmit="return overify_message(this);">
    <input type=hidden name="action" value="add">
    <div></div>
    <input name="title" style="width: 300px;">
    <div>Message:</div>
    <textarea name="message" style="width: 300px;"></textarea>
    <div>
        <input type="submit" name="submitAdd" value="Submit">
    </div>
</form> -->
</div>

<?php
}

if (isset($_SESSION['add']) && $_SESSION['add']) {
    echo "<div class='container'><p>The entry was added successfully.</p></div>";
    $_SESSION['add'] = false;
}
include "footer.html";
