<?php
function getField($title, $type, $required) {
    $title = htmlspecialchars($title);
    $required = $required ? 'required' : '';
    return "
    <div class='field'>
        <label class='text-label' for='$title'>$title</label>
        <input  type='$type' name='$title' id='$title' $required>
    </div>
    ";
}
?>

<form class="contact" action="/#" method="post">
    <div class="group">
        <p class="text-group-title">Basic Info</p>
        <div class='underline'></div>
        <?= getField("name", "text", true); ?>
        <?= getField("password", "password", true); ?>
        <?= getField("name", "text", true); ?>

    </div>
    <div class="group">
        <p class="text-group-title">Additional Info</p>
        <?= getField("email", "email", true); ?>
    </div>
    <div class="group">
        <p class="text-group-title">Optional Info</p>
        <?= getField("phone", "tel", false); ?>
    </div>
    <button type="submit">Submit</button>
</form>
