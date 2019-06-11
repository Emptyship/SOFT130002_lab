<?php
//Fill this place
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travel";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
//****** Hint ******
//connect database and fetch data here


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Lab11</title>

      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    
    

    <link rel="stylesheet" href="css/captions.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.css" />    

</head>

<body>
    <?php include 'header.inc.php'; ?>
    


    <!-- Page Content -->
    <main class="container">
        <div class="panel panel-default">
          <div class="panel-heading">Filters</div>
          <div class="panel-body">
            <form action="Lab11.php" method="get" class="form-horizontal">
              <div class="form-inline">
              <select name="continent" class="form-control">
                <option value="0">Select Continent</option>
                <?php
                //Fill this place

                $sql8="SELECT *
                       FROM continents";

                $result = mysqli_query($conn,$sql8);

                //****** Hint ******
                //display the list of continents

                while($row = $result->fetch_assoc()) {
                  echo '<option value=' . $row['ContinentCode'] . '>' . $row['ContinentName'] . '</option>';
                }

                ?>
              </select>     
              
              <select name="country" class="form-control">
                <option value="0">Select Country</option>
                <?php 
                //Fill this place

                $sql9="SELECT *
                       FROM countries";

                $result2 = mysqli_query($conn,$sql9);



                while($row2 = $result2->fetch_assoc()) {
                    echo '<option value=' . $row2['ISO'] . '>' . $row2['CountryName'] . '</option>';
                }

                //****** Hint ******
                /* display list of countries */ 
                ?>
              </select>    
              <input type="text"  placeholder="Search title" class="form-control" name="title">
              <button type="submit" class="btn btn-primary">Filter</button>
              </div>
            </form>

          </div>
        </div>     
                                    

		<ul class="caption-style-2">
            <?php
            $sql10="";
            if(isset($_GET["continent"])){$con1=$_GET["continent"];}
            if(isset($_GET['country'])){$con2=$_GET['country'];}
            if(isset($_GET['title'])){$con3=$_GET['title'];}
            if(isset($_GET["continent"])){
                if($con1=='0'){$con1='';};
                if($con2=='0'){$con2='';};


                $sql10="SELECT ImageID,Title,Description,Path
                       FROM imagedetails
                       WHERE ContinentCode like '%$con1%' and CountryCodeISO like '%$con2%'  and Title like '%$con3%' ";
            }else{
                $sql10="SELECT ImageID,Title,Description,Path
                       FROM imagedetails";
            }






            $result2=$conn->prepare($sql10);
            $result2->bind_result($picid,$title,$word,$path);
            $result2->execute();
            while($result2->fetch()){
                echo"<li>
              <a href=\"detail.php?id=".$picid."\" class=\"img-responsive\">
                <img style='width:225px;height:225px;' src=\"images/square-medium/".$path."\" alt=\"".$title."\">
                <div class=\"caption\">
                  <div class=\"blur\"></div>
                  <div class=\"caption-text\">
                    <p>".$title."</p>
                  </div>
                </div>
              </a>
            </li>   ";
            }

            //Fill this place

            //****** Hint ******
            /* use while loop to display images that meet requirements ... sample below ... replace ???? with field data

            */ 
            ?>
       </ul>       

      
    </main>
    
    <footer>
        <div class="container-fluid">
                    <div class="row final">
                <p>Copyright &copy; 2017 Creative Commons ShareAlike</p>
                <p><a href="#">Home</a> / <a href="#">About</a> / <a href="#">Contact</a> / <a href="#">Browse</a></p>
            </div>            
        </div>
        

    </footer>


        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>