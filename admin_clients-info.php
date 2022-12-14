<?php
    session_start();

    if(empty($_SESSION["type"]) || $_SESSION["type"] == "client") header("Location: index.php");

    $connect = mysqli_connect("localhost", "hdtdywpk_burgershot", "NBAp76!$%", "hdtdywpk_burgershot");
    $sql_accounts = mysqli_query($connect, "SELECT * FROM client_information");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Mark Jigger Masacupan">
  	<meta name="description" content="The owners dreamed of creating a burger restaurant in which the customers could not only eat, but one that offered a friendly and healthy environment. The restaurant’s success led them to begin franchising their concept, becoming operating restaurants.">
  	<meta property="og:title" content="Burger Shot Restaurant | Admin">
    <meta property="og:url" content="https://Burgershot.x10.mx/admin_clients.php">
    <meta property="og:image" content="images/website-image.jpg">
  	<link rel="icon" type="image/any-icon" href="https://burgershot.x10.mx/images/logo/burger-logo.png">
    <link rel="stylesheet" href="css/admin_header.css">
    <link rel="stylesheet" href="css/admin_clients-info.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <title>Burger Shot</title>
</head>
<body>
    <?php include_once 'header.php' ?>

    <!-- Burger Shot Index Page -->
    <main>
        <!-- Burger Shot Sign In -->
        <section class="section_tabular-accounts">
            <div class="container_tabular-header">
                <h1>Client Information</h1>
                <p>Clients important personal information</p>
            </div>
            <div class="container_tabular-accounts">
                <table>
                    <caption>Client information</caption>
                    <thead>
                        <tr>
                            <th class="client_number">#</th>
                            <th class="client_image">Image</th>
                            <th class="client_first-name">First Name</th>
                            <th class="client_last-name">Last Name</th>
                            <th class="client_email">Email</th>
                            <th class="client_mobile">Mobile #</th>
                            <th class="client_street-address">Street Address</th>
                            <th class="client_city">City</th>
                            <th class="client_barangay">Barangay</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row = mysqli_fetch_array($sql_accounts)) {
                                echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td><img src='profile/". $row['image'] ."' alt='Profile Image'></td>";
                                    echo "<td>" . $row['firstname'] . "</td>";
                                    echo "<td>" . $row['lastname'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . (empty($row['mobile']) ? "N/A" : $row['mobile']) . "</td>";
                                    echo "<td>" . (empty($row['street address']) ? "N/A" : $row['street address']) . "</td>";
                                    echo "<td>" . (empty($row['city']) ? "N/A" : $row['city']) . "</td>";
                                    echo "<td>" . (empty($row['barangay']) ? "N/A" : $row['barangay']) . "</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    
    <?php include_once 'global_footer.php' ?>
</body>
</html>