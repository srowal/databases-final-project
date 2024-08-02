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
            <h4> CREATE </h4>
            <!-- UPDATE PATH -->
            <form action="../queries/" method="POST">
                <label for="teamFormationID">teamFormationID:</label><br>
                <input type="text" name="teamFormationID"><br>

                <label for="address">address:</label><br>
                <input type="text" name="address"><br>

                <label for="datetime">datetime:</label><br>
                <input type="text" name="datetime"><br>

                <label for="type">type:</label><br>
                <input type="text" name="type"><br>

                <label for="team1ID">team1ID:</label><br>
                <input type="text" name="team1ID"><br>

                <label for="team2ID">team2ID:</label><br>
                <input type="text" name="team2ID"><br>

                <label for="score1">score1:</label><br>
                <input type="text" name="score1"><br>

                <label for="score2">score2:</label><br>
                <input type="text" name="score2"><br>

                <input type="submit" value="Submit">
            </form>
        </div>

        <div>
            <h4> READ </h4>
            <!-- UPDATE PATH -->
            <form action="../queries/" method="GET">
                <label for="teamFormationID">teamFormationID:</label><br>
                <input type="text" name="teamFormationID"><br>

                <input type="submit" value="Submit">
            </form>
        </div>

        <div>
            <h4> UPDATE </h4>
            <!-- UPDATE PATH -->
            <form action="../queries/" method="POST">
                <label for="teamFormationID">teamFormationID:</label><br>
                <input type="text" name="teamFormationID"><br>

                <label for="address">address:</label><br>
                <input type="text" name="address"><br>

                <label for="datetime">datetime:</label><br>
                <input type="text" name="datetime"><br>

                <label for="type">type:</label><br>
                <input type="text" name="type"><br>

                <label for="team1ID">team1ID:</label><br>
                <input type="text" name="team1ID"><br>

                <label for="team2ID">team2ID:</label><br>
                <input type="text" name="team2ID"><br>

                <label for="score1">score1:</label><br>
                <input type="text" name="score1"><br>

                <label for="score2">score2:</label><br>
                <input type="text" name="score2"><br>

                <input type="submit" value="Submit">
            </form>
        </div>

        <div>
            <h4> DELETE </h4>
            <!-- UPDATE PATH -->
            <form action="../queries/" method="POST">
                <label for="teamFormationID">teamFormationID:</label><br>
                <input type="text" name="teamFormationID"><br>

                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</div>



<?php include "../include/footer.php";?>