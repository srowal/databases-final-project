<?php
require_once './config.php';
include "./include/header.php";
?>


<section id="queries-list">
    <div class="query">
      <a href="./forms/locations.php">1. Create/Delete/Edit/Display a Location</a>
    </div>

    <div class="query">
      <a href="./forms/personnels.php">2. Create/Delete/Edit/Display a Personnel</a>
    </div>

    <div class="query">
      <a href=".froms/familyMembers.php">3. Create/Delete/Edit/Display a Location</a>
    </div>

    <div class="query">
      <a href="./locations.php">4. Create/Delete/Edit/Display a Location</a>
    </div>

    <div class="query">
      <a href="./locations.php">5. Create/Delete/Edit/Display a Location</a>
    </div>

    <div class="query">
      <a href="./locations.php">6. Create/Delete/Edit/Display a Location</a>
    </div>

    <div class="query">
      <a href="./queries/q07.php">7.</a>
    </div>

    <div class="query">
      <h4>8.</h4>
      <form action = "./queries/q08.php" method="GET">
        <label for="SSN">SSN</label><br>
        <input type="text" name="SSN"><br>
        <input type="submit" value="Submit">
      </form>
    </div>

    <div class="query">
      <h4>9.</h4>
      <form action = "./queries/q09.php" method="GET">
        <label for="location">location</label><br>
        <input type="text" name="location"><br>
        <label for="date">date</label><br>
        <input type="text" name="date"><br>
        <input type="submit" value="Submit">
      </form>
    </div>

    <div class="query">
      <a href="./queries/q10.php">10.</a>
    </div>

    <div class="query">
      <h4>11.</h4>
      <form action = "./queries/q11.php" method="GET">
        <label for="fromDate">From date:</label><br>
        <input type="text" name="fromDate"><br>
        <label for="toDate">To date:</label><br>
        <input type="text" name="toDate"><br>
        <input type="submit" value="Submit">
      </form>
    </div>

    <div class="query">
      <a href="./locations.php">12. </a>
    </div>

    <div class="query">
      <a href="./locations.php">13.</a>
    </div>

    <div class="query">
      <a href="./locations.php">14.</a>
    </div>

    <div class="query">
      <a href="./locations.php">15.</a>
    </div>

    <div class="query">
      <a href="./locations.php">16.</a>
    </div>

    <div class="query">
      <a href="./locations.php">17.</a>
    </div>

</section>

<?php include "./include/footer.php";?>