<?php

include "../config/db.php";
include_once "../functions/myfunctions.php";

if (!empty($_POST['search'])) {
    $search_query = $conn->real_escape_string($_POST['search']);
    $query = "SELECT * FROM store
    WHERE grad LIKE '%{$search_query}%' LIMIT 6 OFFSET 0; ";
    $result = $conn->query($query);
    $html = "<table class='table table-bordered'>";
    $html .= "
    <tr class='bg-primary'>
      <th>Id </th>
      <th>Title </th>
      <th>Author</th>
      <th>Description</th>
    </tr>
 ";
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $html .= "<tr><td>" . $row['grad'] . "</td>";
            $html .= "<td>" . $row['adresa'] . "</td>";
            $html  .= "<td>" . $row['telefon'] . "</td>";
            $html  .= "<td>" . $row['radnoVreme'] . "</td></tr>";
        }
        
        $html .= "</table>";
        echo $html;
    } else {
        echo "Sorry! no records found";
    }
} else {
   redirect("Pokušajte ponovo","../view/contact.php");
}