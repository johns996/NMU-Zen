<?php
//nmu-zen
?>

<div class="branding-one allcaps">Northern</div>
<div class="branding-two allcaps">Michigan University</div>

<?php
//alert-danger -> red
//alert-warning -> yellow
//alert-success -> green
//alert-info -> blue

echo '
<div class="alert alert-info alert-dismissible alert-nmu" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>This is a preview of the upcoming website redesign.</strong>  <a href="http://goo.gl/forms/G9VVuhz1QL">Provide feedback here</a>.<br />
  <strong>Note:</strong> This alert section would only be present on the page (and colored red) during campus emergencies.
</div>
';
?>