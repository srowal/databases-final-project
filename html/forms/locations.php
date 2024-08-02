<?php
include "../include/header.php";
?>

<link rel="stylesheet" href="../css/form_1.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

<div class="form_1">
        <h2>Location</h2>
        <div class="statements">
            <div>
                <h4> CREATE </h4>
                <form action="../queries/locations/createLocation.php" method="POST">
                    <label for="locationID">Location ID:</label><br>
                    <input type="text" name="locationID"><br>

                    <label for="name">name:</label><br>
                    <input type="text" name="name"><br>

                    <label for="phoneNumber">phoneNumber:</label><br>
                    <input type="text" name="phoneNumber"><br>

                    <label for="address">address:</label><br>
                    <input type="text" name="address"><br>

                    <label for="province">province:</label><br>
                    <input type="text" name="province"><br>

                    <label for="postalCode">postalCode:</label><br>
                    <input type="text" name="postalCode"><br>

                    <label for="maxCapacity">maxCapacity:</label><br>
                    <input type="text" name="maxCapacity"><br>

                    <label for="webAddress">webAddress:</label><br>
                    <input type="text" name="webAddress"><br>

                    <label for="g_manager_id">g_manager_id:</label><br>
                    <input type="text" name="g_manager_id"><br>

                    <label for="city">city:</label><br>
                    <input type="text" name="city"><br>

                    <label for="type">type:</label><br>
                    <input type="text" name="type"><br>

                    <input type="submit" value="Submit">
                </form>
            </div>

            <div>
                <h4> READ </h4>
                <form action="../queries/locations/readLocation.php" method="GET">
                    <label for="locationID">Location ID:</label><br>
                    <input type="text" name="locationID"><br>

                    <input type="submit" value="Submit">
                </form>
            </div>

            <div>
                <h4> UPDATE </h4>
                <form action="../queries/locations/updateLocation.php" method="POST">
                    <label for="locationID">Location ID:</label><br>
                    <input type="text" name="locationID"><br>

                    <label for="name">name:</label><br>
                    <input type="text" name="name"><br>

                    <label for="phoneNumber">phoneNumber:</label><br>
                    <input type="text" name="phoneNumber"><br>

                    <label for="address">address:</label><br>
                    <input type="text" name="address"><br>

                    <label for="province">province:</label><br>
                    <input type="text" name="province"><br>

                    <label for="postalCode">postalCode:</label><br>
                    <input type="text" name="postalCode"><br>

                    <label for="maxCapacity">maxCapacity:</label><br>
                    <input type="text" name="maxCapacity"><br>

                    <label for="webAddress">webAddress:</label><br>
                    <input type="text" name="webAddress"><br>

                    <label for="g_manager_id">g_manager_id:</label><br>
                    <input type="text" name="g_manager_id"><br>

                    <label for="city">city:</label><br>
                    <input type="text" name="city"><br>

                    <label for="type">type:</label><br>
                    <input type="text" name="type"><br>

                    <input type="submit" value="Submit">
                </form>
            </div>

            <div>
                <h4> DELETE </h4>
                <form action="../queries/locations/deleteLocation.php" method="POST">
                    <label for="locationID">Location ID:</label><br>
                    <input type="text" name="locationID"><br>

                    <input type="submit" value="Submit">
                </form>
            </div>

        </div>
    </div>

<?php include "../include/footer.php";?>