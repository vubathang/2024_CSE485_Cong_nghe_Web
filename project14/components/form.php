<?php
function getField($title, $type, $required, $arrValue = null) {
    $title = htmlspecialchars($title);
    $id = join('-', explode(' ', $title));
    $required = $required ? 'required' : '';
    switch ($type) {
        case "area":
            return "
            <div class='field'>
                <label class='text-label' for='$id'>$title</label>
                <div class='input' id='editor'></div>
            </div>
            ";
        case "radio":
            $radioItem = "<div class='input no-border'>";
            foreach ($arrValue as $item)
                $radioItem.="
                    <input type='$type' value='$item' name='$id' id='$id'>
                    <label class='radio-item' for='$id'>$item</label>
                ";
            $radioItem.="</div>";
            return "
                <div class='field'>
                    <label class='text-label' for='$id'>$title</label>
                    $radioItem           
            </div>
            ";
    }
    return "
    <div class='field'>
        <label class='text-label' for='$id'>$title</label>
        <input class='input' type='$type' name='$id' id='$id' $required>
    </div>
    ";
}
?>

<form class="contact" action="/#" method="post">
    <div class="group">
        <p class="text-group-title">Basic Info</p>
        <div class='underline'></div>
        <?= getField("employee", "text", true); ?>
        <?= getField("last name", "text", true); ?>
        <?= getField("first name", "text", true); ?>
        <?= getField("gender", "radio", true, $arrValue = ['Male', 'Female']); ?>
        <?= getField("title", "text", true); ?>
        <?= getField("suffix", "text", true); ?>
        <?= getField("birthDay", "date", true); ?>
        <?= getField("hireDate", "date", true); ?>
        <?= getField("reports to", "button", true); ?>
    </div>
    <div class="group">
        <p class="text-group-title">Contact Info</p>
        <?= getField("email", "email", false); ?>
        <?= getField("address", "text", false); ?>
        <?= getField("city", "text", false); ?>
        <?= getField("region", "text", false); ?>
        <?= getField("postal code", "text", false); ?>
        <?= getField("country", "list", false); ?>
        <?= getField("US home phone", "text", false); ?>
        <?= getField("photo", "file", false); ?>
    </div>
    <div class="group">
        <p class="text-group-title">Optional Info</p>
        <?= getField("notes", "area", false); ?>
        <?= getField("preferred", "radio", false, $arrValue = ['regular', 'gravy yard']); ?>
        <?= getField("active", "checkbox", false); ?>
        <?= getField("are you human?", "text", false); ?>
    </div>
    <div class="form-footer">
        <button type="submit" class="f-btn" id="submit">Submit</button>
        <a class="f-btn" href="#" id="cancel">Cancel</a>
    </div>
</form>
