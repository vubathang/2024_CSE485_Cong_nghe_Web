<?php
require "./db.php";
function getField($title, $type, $required, $arrValue = null) {
    $title = htmlspecialchars($title);
    $id = join('-', explode(' ', $title));
    $required = $required ? 'required' : '';
    switch ($type) {
        case "area":
            return "
            <div class='field'>
                <label class='text-label' for='$id'>$title</label>
                <div class='input border-input' id='editor'></div>
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
        case 'select':
            $options = "";
            foreach ($arrValue as $item)
                $options.="<option value='$item'>$item</option>";
            return "
                <div class='field'>
                    <label class='text-label' for='$id'>$title</label>
                    <select>
                        $options
                    </select>
                </div>
            ";
        default:
            return "
                <div class='field'>
                    <label class='text-label' for='$id'>$title</label>
                    <input class='input border-input' type='$type' name='$id' id='$id' $required>
                </div>
            ";
    }

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
        <?= getField("reports to", "select", true, $arrValue = $reportTo); ?>
    </div>
    <div class="group">
        <p class="text-group-title">Contact Info</p>
        <?= getField("email", "email", true); ?>
        <?= getField("address", "text", true); ?>
        <?= getField("city", "text", true); ?>
        <?= getField("region", "select", true, $arrValue = $countries); ?>
        <?= getField("postal code", "text", true); ?>
        <?= getField("country", "list", true); ?>
        <?= getField("US home phone", "text", true); ?>
        <?= getField("photo", "file", true); ?>
    </div>
    <div class="group">
        <p class="text-group-title">Optional Info</p>
        <?= getField("notes", "area", true); ?>
        <?= getField("preferred", "radio", true, $arrValue = ['regular', 'gravy yard']); ?>
        <?= getField("active", "check", true); ?>
        <?= getField("are you human?", "text", true); ?>
    </div>
    <div class="form-footer">
        <button type="submit" class="f-btn" id="submit">Submit</button>
        <a class="f-btn" href="#" id="cancel">Cancel</a>
    </div>
</form>
