<?php
$myHeader = "Contact Page";
include_once "..\MyHeader.php";
?>

<?php

echo "<br> Reach out to one of us using the information below! <br> <br>";

echo "<br> Subpages: <nav> <a href='ContactEmail.php'>Email</a> <a href='ContactLocations.php'>Locations</a> </nav>";
?>

<ul class="ContactInfo">
    <li class="ContactListItem">Tobie Allen</li>
    <li class="ContactListItem">tallen@student.neumont.edu</li>
    <li class="ContactListItem">(111) 111 - 1111</li>
</ul>

<ul class="ContactInfo">
    <li class="ContactListItem">Isaiah Rivera</li>
    <li class="ContactListItem">irivera@student.neumont.edu</li>
    <li class="ContactListItem">(111) 111 - 1111</li>
</ul>

<ul class="ContactInfo">
    <li class="ContactListItem">Louis Bui</li>
    <li class="ContactListItem">lbui@student.neumont.edu</li>
    <li class="ContactListItem">(111) 111 - 1111</li>
</ul>

<?php
include_once "..\MyFooter.php";
?>