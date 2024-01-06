<?php

include_once "action.php";
$str_form = '<div class="container">           <div class="wpforms-container wpforms-container-full wpforms-render-modern" id="wpforms-87"
bis_skin_checked="1">
<form id="autoForm" class="wpforms-validate wpforms-form wpforms-ajax-form" data-formid="87"
  method="post" enctype="multipart/form-data" action="autorize.php" data-token="24cbe7b24e07a41c9cfd06fef330655f"
  novalidate="novalidate" method="post">
  <div class="wpforms-field-container" bis_skin_checked="1">
    <div id="wpforms-87-field_1-container" class="wpforms-field wpforms-field-name" data-field-id="1"
      bis_skin_checked="1">
      <label class="wpforms-field-label" for="login">Login
        <span class="wpforms-required-label" aria-hidden="true">*</span></label><input type="text"
        id="login" class="wpforms-field-large wpforms-field-required"
        name="login" aria-errormessage="wpforms-87-field_1-error" required />
    </div>
    <div id="wpforms-87-field_2-container" class="wpforms-field wpforms-field-email" data-field-id="2"
      bis_skin_checked="1">
      <label class="wpforms-field-label" for="pas">Password
        <span class="wpforms-required-label" aria-hidden="true">*</span></label><input type="password"
        id="pas" class="wpforms-field-large wpforms-field-required"
        name="pas" spellcheck="false" aria-errormessage="wpforms-87-field_2-error"
        required />
    </div>
  </div>
  <div class="wpforms-submit-container" bis_skin_checked="1">
      <button type="submit"
      name="go" id="go" class="wpforms-submit" data-alt-text="Sending..."
      data-submit-text="Submit" aria-live="assertive" value="wpforms-submit">
      Submit</button>
  </div>
</form>
</div>
</div>';

if (!isset($_POST['go'])) {
    include "header.html";
    echo $str_form;
} else {
    if (check_autorize($_POST['login'], $_POST['pas'])) {
        header("Location: admin_panel.php");
    } else {
        include "header.html";
        echo $str_form;
        echo "<div class='container'><p>Incorrect input, try again!</p></div>";
    }
}
include "footer.html";
