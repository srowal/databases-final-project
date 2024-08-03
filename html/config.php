<?php
define("DB_SERVER", "unc353.encs.concordia.ca");
define("DB_USERNAME", "unc353_1");
define("DB_PASSWORD", "c7a5yUuK");
define("DB_NAME", "unc353_1");

// Create connection
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


