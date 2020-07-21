<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="editedbootstrap.min.css">

    <title>Oders(Admin)</title>

    <style>
        table{
            margin-top: 50px;
            text-align: center;
        }
        h1{
            text-align: center;
            margin-top: 50px;
            color: #343d46;
            background-color: #c0c5ce;
        }
        h5{
            color: blue;
            margin-left: 50px;
        }
    </style>
</head>
<body >
    <h1>Oders</h1>
    <h5 id="date"></h3>
    <h5 id="time"></h3>
    <?php 

        $server = 'localhost:3308';
        $user = 'root';
        $pass = '';
        $db = 'wad_app';

        $conn = new mysqli( $server,$user , $pass,$db) ;

        $sql = "SELECT*FROM oders" ;
        $result = $conn->query($sql);

        echo'
        <table class="table table-hover table-dark">
        <thead>
          <tr>
            <th scope="col">Oder No</th>
            <th scope="col">Date</th>
            <th scope="col">Time</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Contact(Mobile)</th>
            <th scope="col">Contact(Fixed)</th>
            <th scope="col">Address</th>
            <th scope="col">Item Code</th>
            <th scope="col">Size</th>
            <th scope="col">Quantity</th>
          </tr>
        </thead>
        <tbody> ';

        if ($result->num_rows > 0) {
        
            // output data of each row
            while($row = $result->fetch_assoc()) {
            echo '
                <tr>
                    <th scope="row">'. $row["oderID"].'</th>
                    <td>'. $row["date"].'</td>
                    <td>'.$row["time"].'</td>
                    <td>'. $row["name"].'</td>
                    <td>'.$row["mobileNo"].'</td>
                    <td>'. $row["landNo"].'</td>
                    <td>'.$row["address"].'</td>
                    <td>'. $row["itemNo"].'</td>
                    <td>'.$row["size"].'</td>
                    <td>'. $row["quantity"].'</td>       
                    
                </tr>';     
          
            }

            echo '
                </tbody>
            </table>';
    
        } 
        else {
        echo "0 results";
        }
    
        $conn->close();
           
        

        // if ($result->num_rows > 0) {
        
        //     // output data of each row
        //     while($row = $result->fetch_assoc()) {
        //     echo "<p id='result'>". $row["oderID"]. " -  " . $row["date"]. " - " . $row["time"]. 
        //     " - ".$row["name"]." - ".$row["mobileNo"]." - ".$row["landNo"]." - ".$row["address"].
        //     " - ".$row["itemNo"]." - ".$row["size"]." - ".$row["quantity"]."<br>" . "</p>";
          
        //     }    
        // } 
        // else {
        // echo "0 results";
        // }
        
    
    ?>
    
    <script>
        
            var d = new Date();
            var date =d.getDate() +'-'+(d.getMonth()+1)+'-'+d.getFullYear();
            document.getElementById("date").innerHTML= date;

            var time = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
            document.getElementById("time").innerHTML= time;
            
    </script>


</body>


</html>