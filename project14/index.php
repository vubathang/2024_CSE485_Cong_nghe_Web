<?php
    include 'db.php'
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee Information Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
</head>
<body>
<form>
    <div class="form-content m-3 border border-3 border-warning-subtle">
        <div class="form-section p-3">
            <h3 class="form-section-header border-bottom border-3 border-dark-subtle">Basic Info</h3>
            <div class="field px-4">
                <div class="form-group">
                    <label for="empId">Employee ID</label>
                    <input type="text" id="empId" name="empId" >
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" id="lastName" name="lastName">
                </div>
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" id="firstName" name="firstName">
                </div>
                <div class="form-group d-flex">
                    <label for="gender">Gender</label>
                    <div class="d-flex flex-column ms-2">
                        <div class="form-check">
                            <input type="radio" id="male" name="gender" value="male" class="form-check-input">
                            <label for="male" class="form-check-label">Male</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" id="female" name="gender" value="female" class="form-check-input">
                            <label for="female" class="form-check-label">Female</label>
                        </div>
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
                    <input type="datetime-local" id="birthDate" name="birthDate">
                </div>
                <div class="form-group">
                    <label for="hireDate">Hire Date</label>
                    <input type="datetime-local" id="hireDate" name="hireDate">
                </div>
                <div class="form-group">
                    <label for="ssn">SSN # (if applicable)</label>
                    <input type="text" id="ssn" name="ssn">
                </div>
                <div class="form-group">
                    <label for="reportsTo">Reports To</label>
                    <select id="reportsTo" name="reportsTo">
                        <?php if (!empty($reports_to)) {
                            foreach ($reports_to as $report) : ?>
                                <option value="<?= $report ?>"><?= $report ?></option>
                            <?php endforeach;
                        } ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-section p-3">
            <h3 class="form-section-header border-bottom border-3 border-dark-subtle">Contact Info</h3>
            <div class="field px-4">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="name@example.com" >
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
                    <label for="postalCode">Postal code</label>
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
        </div>

        <div class="form-section p-3">
            <h3 class="form-section-header border-bottom border-3 border-dark-subtle">Optional Info</h3>
            <div class="field px-4">
                <div class="form-group d-flex">
                    <label for="notes" style="display: flex; align-items: center">Notes</label>
                    <textarea id="notes" name="notes"></textarea>
                    <script> CKEDITOR.replace('notes'); </script>
                </div>
                <div class="form-group d-flex">
                    <label for="preferredShift">Preferred Shift</label>
                    <div class="d-flex flex-column ms-2">
                        <div class="form-check">
                            <input type="checkbox" id="regular" name="regular" value="regular" class="form-check-input">
                            <label for="regular" class="form-check-label">Regular</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" id="gravyYard" name="gravyYard" value="gravyYard" class="form-check-input">
                            <label for="gravyYard" class="form-check-label">Gravy Yard</label>
                        </div>
                    </div>
                </div>
                <div class="form-group d-flex">
                    <label for="active">Active?</label>
                    <div class="form-check ms-2">
                        <input type="checkbox" id="active" name="active" value="active" class="form-check-input">
                    </div>
                </div>
                <div class="form-group d-flex">
                    <label for="verification" style="display: flex; align-items: center">Are you human?</label>
                    <div class="d-flex flex-column ms-2">
                        <div class="fs-3">
                            <?php
                            function generateRandomString($length) {
                                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                $charactersLength = strlen($characters);
                                $randomString = '';
                                for ($i = 0; $i < $length; $i++) {
                                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                                }
                                return $randomString;
                            }

                            echo generateRandomString(6);
                            ?>
                        </div>
                        <button type="button" class="border border-0 bg-body">Click to change</button>
                        <input type="text" id="userInput" name="userInput" style="width: 470px">
                    </div>
                </div>
            </div>
            <div class="border-bottom border-3 border-dark-subtle mt-4"></div>

        <div class="footer pe-1 mt-2">
            <div class="pageNavigate d-flex justify-content-between">
                <div>
                    <i class="fa-solid fa-square-caret-left fs-5"></i>&nbsp;
                    <i class="fa-solid fa-square-caret-right fs-5"></i><br>
                    <label for="required">* required</label>
                </div>
                <div>
                    <button type="button" class="btn btn-primary p-1" >
                        <i class="fa-solid fa-floppy-disk me-1"></i>Submit
                    </button>
                    <button type="button" class="btn btn-danger p-1">
                        <i class="fa-solid fa-xmark me-1"></i>Cancel
                    </button>

                </div>

            </div>
        </div>
        </div>
    </div>
</form>
</body>
</html>