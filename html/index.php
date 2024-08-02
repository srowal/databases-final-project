<?php
require_once './config.php';
include "./include/header.php";
?>

<section id="queries-list">

    <div class="query">
      <h4>1. Create/Delete/Edit/Display a Location</h4>
      <a href="./forms/locations.php">Open statements</a>
    </div>

    <div class="query">
      <h4>2. Create/Delete/Edit/Display a Personnel</h4>
      <a href="./forms/personnels.php">Open statements</a>
    </div>

    <div class="query">
      <h4>3. Create/Delete/Edit/Display a FamilyMember (Primary/Secondary)</h4>
      <a href=".froms/familyMembers.php">Open statements</a>
    </div>

    <!-- UPDATE PATH -->
    <div class="query">
      <h4>4. Create/Delete/Edit/Display a ClubMember</h4>
      <a href="./locations.php">Open statements</a>
    </div>

    <!-- UPDATE PATH -->
    <div class="query">
      <h4>5. Create/Delete/Edit/Display a TeamFormation</h4>
      <a href="./locations.php">Open statements</a>
    </div>

    <!-- UPDATE PATH -->
    <div class="query">
      <h4>6. Assign/Delete/Edit a club member to a team formation</h4>
      <a href="./locations.php">Open statements</a>
    </div>

    <!-- UPDATE PATH -->
    <div class="query">
      <h4>7. Get complete details for every location in the system</h4>
      <a href="./queries/q07.php">Open query</a>
    </div>

    <!-- UPDATE PATH -->
    <div class="query">
      <h4>8. For a given family member, get details of the secondary family member and all the associated club members with the primary family member</h4>
      <a href="./forms/form8.php">Open query</a>
    </div>

    <!-- UPDATE PATH -->
    <div class="query">
      <h4>9. For a given location and day, get details of all the teams formations recorded in the system</h4>
      <a href="./forms/form9.php">Open query</a>
    </div>

    <!-- UPDATE PATH -->
    <div class="query">
      <h4>10. Get details of club members who are currently active and have been associated with at least four different locations and are members for at most two years</h4>
      <a href="./queries/q10.php">Open query</a>
    </div>

    <!-- UPDATE PATH -->
    <div class="query">
      <h4>11. For a given period of time, give a report of the teams’ formations for all the locations</h4>
      <a href="./forms/form11.php">Open query</a>
    </div>

    <!-- VERIFY QUERY REDIRECT -->
    <div class="query">
      <h4>12. Get a report of all active club members who have never been assigned to any formation team session</h4>
      <a href="./queries/q12.php">Open query</a>
    </div>

    <!-- UPDATE PATH -->
    <div class="query">
      <h4>13. Get a report of all active club members who have only been assigned as goalkeepers in all the formation team sessions they have been assigned to</h4>
      <a href="./queries/q13.php">Open query</a>
    </div>

    <!-- UPDATE PATH -->
    <div class="query">
      <h4>14. Get a report of all active club members who have only been assigned at least once to every role throughout all the formation team game sessions</h4>
      <a href="./queries/q14.php">Open query</a>
    </div>

    <!-- UPDATE PATH -->
    <div class="query">
      <h4>15. For a given location, get the list of all family members who have currently active club members associated with them and are also head coaches for the same location</h4>
      <a href="./forms/form15.php">Open query</a>
    </div>

    <!-- UPDATE PATH -->
    <div class="query">
      <h4>16. Get a report of all active club members who have never lost a game in which they played in</h4>
      <a href="./queries/q16.php">Open query</a>
    </div>

    <!-- UPDATE PATH -->
    <div class="query">
      <h4>17. Get a report of all the personnels who were president of the club at least once or is currently president of the club</h4>
      <a href="./queries/q17.php">Open query</a>
    </div>

    <!-- UPDATE PATH -->
    <div class="query">
      <h4>18. Get a report of all volunteer personnels who are not family members of any club member</h4>
      <a href="./queries/q18.php">Open query</a>
    </div>

</section>

<?php include "./include/footer.php";?>