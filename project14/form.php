<?php
include 'db.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
</head>
<body>
<form>
    <div class="form-content">
        <div class="form-section">
            <h3 class="form-section-header">Basic Info</h3>
            <div class="form-group">
                <label for="empId">Employee ID</label>
                <input type="text" id="empId" name="empId">
            </div>
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" name="firstName">
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" name="lastName">
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <div class="form-group-btn">
                    <input type="radio" id="male" name="gender" value="male">
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female">Female</label>
                </div>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="suffix">Suffix</label>
                <input type="text" id="suffix" name="suffix">
            </div>
            <div class="form-group">
                <label for="birthDate">Birth Date</label>
                <input type="date" id="birthDate" name="birthDate">
            </div>
            <div class="form-group">
                <label for="hireDate">Hire Date</label>
                <input type="date" id="hireDate" name="hireDate">
            </div>
            <div class="form-group">
                <label for="ssn">SSN # (if applicable)</label>
                <input type="text" id="ssn" name="ssn">
            </div>
            <div class="form-group">
                <label for="reportsTo">Reports To</label>
                <select id="reportsTo" name="reportsTo">
                    <?php if (!empty($reportsTo)) {
                        foreach ($reportsTo as $report) : ?>
                            <option value="<?= $report ?>"><?= $report ?></option>
                        <?php endforeach;
                    } ?>
                </select>
            </div>
        </div>
        <div class="form-section">
            <h3 class="form-section-header">Contact Info</h3>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="name@example.com">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address">
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" id="city" name="city">
            </div>
            <div class="form-group">
                <label for="region">Region</label>
                <input type="text" id="region" name="region">
            </div>
            <div class="form-group">
                <label for="postalCode">Postal Code</label>
                <input type="text" id="postalCode" name="postalCode">
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <select id="country" name="country">
                    <?php if (!empty($countries)) {
                        foreach ($countries as $country) : ?>
                            <option value="<?= $country ?>"><?= $country ?></option>
                        <?php endforeach;
                    } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="homePhone">US Home Phone</label>
                <input type="text" id="homePhone" name="homePhone">
            </div>
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="text" id="photo" name="photo">
            </div>
        </div>
        <div class="form-section">
            <h3 class="form-section-header">Optional Info</h3>
            <div class="form-group">
                <label for="notes">Notes</label>
                <textarea id="notes" name="notes"></textarea>
                <script> CKEDITOR.replace('notes'); </script>
            </div>
            <div class="form-group">
                <label for="pref">Preferred Shift</label>
                <div class="form-group-btn">
                    <input type="checkbox" id="regular" name="regular" value="regular">
                    <label for="regular">Regular</label>
                    <input type="checkbox" id="gravyYard" name="gravyYard" value="gravyYard">
                    <label for="gravyYard">Gravy Yard</label>
                </div>
            </div>
            <div class="form-group">
                <label for="active">Active</label>
                <input type="checkbox" id="active" name="active" value="active">
            </div>
            <div class="form-group">
                <label for="human">Are you human?</label>
                <input type="text" id="human" name="human">
            </div>
        </div>
        <div class="form-footer">
            <button type="submit">Submit</button>
            <button type="button">Cancel</button>
        </div>
    </div>
</form>
</body>
</html>