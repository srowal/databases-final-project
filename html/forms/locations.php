<?php
include "../include/header.php";
?>

<div>
    <h4> CREATE </h4>
    <form action = "../queries/locations/createLocation.php" method="POST">
        <label for="locationID">Location ID</label><br>
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
    <form action = "../queries/locations/readLocation.php" method="GET">
        <label for="locationID">Location ID</label><br>
        <input type="text" name="locationID"><br>

        <input type="submit" value="Submit">
    </form>
</div>

<div>
    <h4> UPDATE </h4>
    <form action = "../queries/locations/updateLocation.php" method="POST">
        <label for="locationID">Location ID</label><br>
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
    <form action = "../queries/locations/deleteLocation.php" method="POST">
        <label for="locationID">Location ID</label><br>
        <input type="text" name="locationID"><br>

        <input type="submit" value="Submit">
    </form>
</div>

<?php include "../include/footer.php";?>