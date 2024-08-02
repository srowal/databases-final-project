<?php
include "../include/header.php";
?>

<link rel="stylesheet" href="../css/form_1.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

<div class="form_1">
    <h2>ClubMember</h2>
    <div class="statements">
        <div>
            <h4> CREATE </h4>
            <!-- UPDATE PATH -->
            <form action="../queries/" method="POST">
                <label for="SSN">SSN:</label><br>
                <input type="text" name="SSN"><br>

                <label for="firstName">firstName:</label><br>
                <input type="text" name="firstName"><br>

                <label for="lastName">lastName:</label><br>
                <input type="text" name="lastName"><br>

                <label for="dateOfBirth">dateOfBirth:</label><br>
                <input type="text" name="dateOfBirth"><br>

                <label for="medicareNumber">medicareNumber:</label><br>
                <input type="text" name="medicareNumber"><br>

                <label for="phoneNumber">phoneNumber:</label><br>
                <input type="text" name="phoneNumber"><br>

                <label for="address">address:</label><br>
                <input type="text" name="address"><br>

                <label for="city">city:</label><br>
                <input type="text" name="city"><br>

                <label for="province">province:</label><br>
                <input type="text" name="province"><br>

                <label for="postalCode">postalCode:</label><br>
                <input type="text" name="postalCode"><br>

                <label for="emailAddress">emailAddress:</label><br>
                <input type="text" name="emailAddress"><br>

                <label for="membershipNumber">membershipNumber:</label><br>
                <input type="text" name="membershipNumber"><br>

                <input type="submit" value="Submit">
            </form>
        </div>

        <div>
            <h4> READ </h4>
            <!-- UPDATE PATH -->
            <form action="../queries/" method="GET">
                <label for="SSN">SSN:</label><br>
                <input type="text" name="SSN"><br>

                <input type="submit" value="Submit">
            </form>
        </div>

        <div>
            <h4> UPDATE </h4>
            <!-- UPDATE PATH -->
            <form action="../queries/" method="POST">
                <label for="SSN">SSN:</label><br>
                <input type="text" name="SSN"><br>

                <label for="firstName">firstName:</label><br>
                <input type="text" name="firstName"><br>

                <label for="lastName">lastName:</label><br>
                <input type="text" name="lastName"><br>

                <label for="dateOfBirth">dateOfBirth:</label><br>
                <input type="text" name="dateOfBirth"><br>

                <label for="medicareNumber">medicareNumber:</label><br>
                <input type="text" name="medicareNumber"><br>

                <label for="phoneNumber">phoneNumber:</label><br>
                <input type="text" name="phoneNumber"><br>

                <label for="address">address:</label><br>
                <input type="text" name="address"><br>

                <label for="city">city:</label><br>
                <input type="text" name="city"><br>

                <label for="province">province:</label><br>
                <input type="text" name="province"><br>

                <label for="postalCode">postalCode:</label><br>
                <input type="text" name="postalCode"><br>

                <label for="emailAddress">emailAddress:</label><br>
                <input type="text" name="emailAddress"><br>

                <label for="membershipNumber">membershipNumber:</label><br>
                <input type="text" name="membershipNumber"><br>

                <input type="submit" value="Submit">
            </form>
        </div>

        <div>
            <h4> DELETE </h4>
            <!-- UPDATE PATH -->
            <form action="../queries/" method="POST">
                <label for="SSN">SSN:</label><br>
                <input type="text" name="SSN"><br>

                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</div>



<?php include "../include/footer.php";?>