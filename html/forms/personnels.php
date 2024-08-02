<?php
include "../include/header.php";
?>

<div>
    <h4> CREATE </h4>
    <form action = "../queries/personnels/createPersonnel.php" method="POST">
        <label for="SSN">SSN</label><br>
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

        <input type="submit" value="Submit">
    </form>
</div>

<div>
    <h4> READ </h4>
    <form action = "../queries/personnels/readPersonnel.php" method="GET">
        <label for="SSN">SSN</label><br>
        <input type="text" name="SSN"><br>

        <input type="submit" value="Submit">
    </form>
</div>

<div>
    <h4> UPDATE </h4>
    <form action = "../queries/personnels/updatePersonnel.php" method="POST">
        <label for="SSN">SSN</label><br>
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

        <input type="submit" value="Submit">
    </form>
</div>

<div>
    <h4> DELETE </h4>
    <form action = "../queries/personnels/deletePersonnel.php" method="POST">
        <label for="SSN">SSN</label><br>
        <input type="text" name="SSN"><br>

        <input type="submit" value="Submit">
    </form>
</div>

<?php include "../include/footer.php";?>