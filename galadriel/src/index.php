<?php
include("./logged-control.php");
include("./database.php");

function filterRequest($search)
{
   $search = strtolower($search);
   if (strstr($search, "or") || strstr($search, "union") || strstr($search, "and")) {

      $search = str_replace("or", "", $search);
      $search = str_replace("and", "", $search);
      $search = str_replace("union", "", $search);
   }
   return $search;
}

$searchTerm = $_GET['search'] ?? '';
$searchTerm = filterRequest($searchTerm);
$sql = "SELECT * FROM companies WHERE full_name LIKE '%" . $searchTerm . "%'";
$results = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="./style/pico.min.css" />
</head>

<body>
   <nav style="max-width: 1400px; margin: 0 auto;">
      <nav aria-label="breadcrumb">
         <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">User</a></li>
            <li>Customers</li>
         </ul>
      </nav>
      <ul>
         <li><a href="./logout.php"><button type="submit" style="padding: 0.4rem 1rem">Logout</button></a></li>
      </ul>
   </nav>

   <article class="container">
      <div style="display: flex; justify-content: space-between; align-items: center; padding: 0 2rem 3rem 2rem">
         <h2 style="text-align: center; margin: 0;">Customer's Table</h2>
         <form action="" method="GET" style="display: flex; justify-content: center; align-items: center; margin: 0;">
            <input type="Search" name="search" placeholder="Search" autocomplete="off" style="max-width: 20rem; margin: 0;">
         </form>
      </div>
      <table role="grid">
         <thead>
            <tr>
               <th scope="col">ID</th>
               <th scope="col">Full Name</th>
               <th scope="col">Job Title</th>
               <th scope="col">Salary</th>
               <th scope="col">City</th>
            </tr>
         </thead>
         <tbody>
            <?php foreach ($results as $result) {
               echo '<tr>
                                <th scope="row">' . $result["id"] . '</th>
                                <td>' . $result["full_name"] . '</td>
                                <td>' . $result["job_title"] . '</td>
                                <td>' . $result["salary"] . '</td>
                                <td>' . $result["city"] . '</td>
                            </tr>';
            } ?>
         </tbody>
      </table>
   </article>
</body>

</html>