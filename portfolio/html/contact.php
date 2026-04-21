<?php
$nameErr =$emailErr=$genderErr=$contactErr="";
$name = $email = $gender = $contact = "";

function cleanInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"])) {
        $nameErr = " Name is required";
    } else {
        $name = cleanInput($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = cleanInput($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = cleanInput($_POST["gender"]);
    }

    if (empty($_POST["contact"])) {
        $contactErr = "contact is required";
    } else {
        $contact = cleanInput($_POST["contact"]);
    }



}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Contact - Anika Khandoker</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" href="../css/contact.css">
</head>

<body>
    <header>
        <nav>

            <ul>
                <li><a href="../index.html">Home</a></li>
                <li><a href="educations.html">Education</a></li>
                <li><a href="experience.html">Experience</a></li>
                <li><a href="projects.html">Projects</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
    </header>

    <h2>Contact Form</h2>

    <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table class ="form-table">

            <tr>
                <th>Contact Information</th>
            </tr>

            <tr>
                <td>First Name <span class="required" style="color:red">*</span></td>
                <td>
                    <input type="text" name="firstname" value="<?= $name ?>">
                    
                    <span style="color:red">* <?= $nameErr ?></span><br><br>
                </td>
    

            </tr>

            <tr>
                <td>Last Name <span class="required" style="color:red">*</span></td>
                <td><input type="text" name="lastname" value="<?= $name ?>">
                 
                 <span style="color:red">* <?= $nameErr ?></span><br><br>
                </td>
            </tr>

            <tr>
                <td>Gender <span class="required" style="color:red">*</span></td>
                <td>
                    <input type="radio" name="gender" value="female" <?= ($gender == "female") ? "checked" : "" ?>> Female &nbsp;
                    <input type="radio" name="gender" value="male" <?= ($gender == "male") ? "checked" : "" ?>> Male
                    
                    <span style="color:red">* <?= $genderErr ?></span><br><br>
                </td>
            </tr>

            <tr>
                <td>Email <span class="required" style="color:red">*</span></td>
                <td>
                    <input type="text" name="email" value="<?= $email ?>">
                    
                    <span style="color:red">* <?= $emailErr ?></span><br><br>
                </td>
            </tr>

            <tr>
                <td>Company</td>
                <td><input type="text" name="company"></td>
            </tr>

            <tr>
                <td>Reason of Contact <span class="required" style="color:red">*</span></td>
<td>
    <select name="reason">
        <option value="">Select</option>
        <option value="Projects" <?php if(isset($reason) && $reason=="Projects") echo "selected"; ?>>Projects</option>
        <option value="Thesis" <?php if(isset($reason) && $reason=="Thesis") echo "selected"; ?>>Thesis</option>
        <option value="Job" <?php if(isset($reason) && $reason=="Job") echo "selected"; ?>>Job</option>
    </select>
    
    <span style="color:red">* <?= $contactErr ?></span><br><br>
</td>
            </tr>

            <tr>
                <td>Topics</td>
                <td>
                    <input type="checkbox" name="topics[]" value="Web Development"> Web Development<br>
                    <input type="checkbox" name="topics[]" value="Mobile Development"> Mobile Development<br>
                    <input type="checkbox" name="topics[]" value="AI/ML Development"> AI/ML Development
                </td>
            </tr>

            <tr>
                <td>Consultation Date</td>
                <td><input type="date" name="date" ></td>
            </tr>

            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Submit">
                    <input type="reset" value="Reset">
                </td>
            </tr>

        </table>
    </form>
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" &&
        !$nameErr && !$emailErr && !$genderErr && !$contactErr ): ?>
        <h3>Submitted values</h3>
        <table class="result-table">
            <tr><td>Name</td><td><?= $name ?></td></tr>
            <tr><td>Email</td><td><?= $email ?></td></tr>
            <tr><td>Gender</td><td><?= $gender ?></td></tr>
            <tr><td>Contact</td><td><?= $contact ?></td></tr>
        </table>
    <?php endif; ?>

    <br>
    <a href="../index.html">Back to Home</a>
    <footer>
        <p>&copy; 2026 Anika Khandoker</p>
    </footer>

</body>

</html>