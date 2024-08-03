<?php
include "../include/header.php";
?>

<link rel="stylesheet" href="../css/form_1.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

<div class="form_1">
    <h2>TeamFormation</h2>
    <div class="statements">
        <div>
            <h4> ASSIGN </h4>
            <!-- UPDATE PATH -->
            <form action="../queries/players/assign.php" method="POST">

                <label for="playerMembershipNumber">playerMembershipNumber:</label><br>
                <input type="text" name="playerMembershipNumber"><br>

                <label for="teamID">teamID:</label><br>
                <input type="text" name="teamID"><br>

                <label for="position">position:</label><br>
                <input type="text" name="position"><br>

                <input type="submit" value="Submit">
            </form>
        </div>

        <div>
            <h4> DELETE </h4>
            <!-- UPDATE PATH -->
            <form action="../queries/players/delete.php" method="POST">

                <label for="playerMembershipNumber">playerMembershipNumber:</label><br>
                <input type="text" name="playerMembershipNumber"><br>

                <label for="teamID">teamID:</label><br>
                <input type="text" name="teamID"><br>

                <input type="submit" value="Submit">
            </form>
        </div>

        <div>
            <h4> EDIT </h4>
            <!-- UPDATE PATH -->
            <form action="../queries/players/edit.php" method="POST">
                <label for="playerMembershipNumber">playerMembershipNumber:</label><br>
                <input type="text" name="playerMembershipNumber"><br>

                <label for="teamID">teamID:</label><br>
                <input type="text" name="teamID"><br>

                <label for="position">position:</label><br>
                <input type="text" name="position"><br>

                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</div>



<?php include "../include/footer.php";?>