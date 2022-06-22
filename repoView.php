<?php
//$RepositoryID = htmlspecialchars($_GET["RepositoryID"]);
$RepositoryID = htmlspecialchars($_SERVER['QUERY_STRING']);

require "PAT.php";
$authCreds =  new PAT();
include "Database.php";
$dbh0 = new Database();
$mysqli = $dbh0->connect();
$SELECTquery = "SELECT * FROM Repository WHERE RepositoryID = '$RepositoryID'";

if ($result = $mysqli->query($SELECTquery)) {
    while ($row = $result->fetch_assoc()) {
        extract($row);
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="bootstrap/bootstrap431/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="bootstrap/bootstrap431/js/bootstrap.min.js"></script>
    <title><?php echo 'Interface Showing Information About the ' . $Name . ' Repo That was Clicked'; ?></title>

    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.css">
    <script type="text/javascript" src="bootstrap/bootstrap431/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
    <style>
        h2 {
            text-align: center;
            padding: 20px 0;
        }

        table caption {
            padding: .5em 0;
        }

        table.dataTable th,
        table.dataTable td {
            white-space: nowrap;
        }

        .p {
            text-align: center;
            padding-top: 140px;
            font-size: 14px;
        }

        .pp {
            text-align: center;
            padding-top: 10px;
            font-size: 14px;
        }

        /* .truncate {
        width: 250px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        } */
        .mytable tbody tr td {
            max-width: 200px;
            /* Customise it accordingly */
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>

<body>

    <div>

        <h2>Repository Details For:  <?php echo '<span style="color:Blue; text-align:center">' . $Name . '</span>'; ?></h2>
       
        <div class="container">
            <div class="row">
               
                <div class="col-md-8">
                    <?php
                    $Num = number_format($NumberOfStars);

                    echo '<h2>This Repo is One of Githubs Top 30 Most Starred Public Repos</h2>';
                    echo '<br>';

                    echo '<br>';
                    echo 'The information Regarding this Repo was Last Updated on ' . $UpdatedInThisDB;
                    echo '<br>';
                    echo '<br>';
                    echo 'Repository ID: ' . $RepositoryID;
                    echo '<br>';
                    echo 'Name: ' . $Name;
                    echo '<br>';
                    echo 'Number of Stars: ' . $Num;
                    echo '<br>';
                    echo 'GitHub URL: ' . $URL;
                    echo '<br>';
                    echo 'Created At DateTime: ' . $c2at;
                    echo '<br>';
                    echo 'Last Push DateTime: '  . $LastPushed;
                    echo '<br>';
                    echo 'Repo Description : ' . $Description;
                    echo '<br>';
                    echo '<br>';
                    echo '<br>';


                    ?>


                    <a class="btn btn-primary" href="index2.php" role="button">Back To The Top 30 Repo List</a>
                </div>
                <div class="col-md-12">
                    <h2>Repo Owner Information</h2>

                    <br><br>
                    <?php

                    // Initilize a cURL session to the Github API. Get the Most starred Repositories and sort them Descending. By default Github allows 30 records. There is an option to display more by using the per page parameter. 

                    $url = "https://api.github.com/users/$Name";
                    $ch = curl_init();

                    //Set options to be used in the cURL request.

                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_USERAGENT, "laowensjr");
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
                    curl_setopt($ch, CURLOPT_TIMEOUT, 10);

                    $response = curl_exec($ch);

                    if ($response === false) {

                        $response = curl_error($ch);
                    } else {

                        stripslashes($response);
                        // echo "Before Pre";


                        $res1 = json_decode($response, JSON_PRETTY_PRINT);
                        // print_r($res1) ; Prints out the array which allows you to see its multi-dimensional array. Used this to access data from the for loop

                        foreach ($res1 as $Key => $Value) {

                            echo '<b>';
                            echo $Key;
                            echo ': </b>';
                            echo  $Value;
                            echo '<br>';
                        }
                    }

                    ?>
                </div>
            </div>
            <br /><br />
        </div>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>