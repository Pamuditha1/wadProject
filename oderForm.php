<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <!-- <link rel="stylesheet" type="text/css" href="oderFormStyle.css"> -->
    <title>Odering Form</title>

    <style>
        #msg {
            text-align: center;
            color: green;
            margin: 5px 20px 5px 20px;
            border: 3px solid greenyellow;
            display: none;
        }
        .containD{
            margin-top: 50px;
        }
        .formD{
            padding-top: 100px;
            padding-bottom: 100px;
            background-color: hsla(170, 95%, 55%, 0.7);
            border-radius: 100px;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.4), 0 12px 40px 0 rgba(0, 0, 0, 0.4);
            
        }
        .validError{
            color:red
        }
        .formMargin {
            margin-left: 150px;
            margin-right: 150px;
            padding: 5px;
        }
        .formMargin:hover{
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
        .form-control:focus{
            background-color:rgba(0, 0, 0, 0.4);
            color: white;
            font-family: "Lucida Console", Courier, monospace;
            font-weight: 900;
        }
    </style>

</head>

<body>

    <div class="container containD">
    
    <p style="color: red;">*for the moment you have to place oder for each item one by one</p>
    <h3 id="msg" >Successfully Placed the Oder</h3>

            
            <form class="form-horizontal formD" id="form" onload="dateTime()" method="post" enctype="multipart/form-data" action="oderForm.php">

                <?php
                    $rand=rand();
                    $_SESSION['rand']=$rand;
                ?>
                    <input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />
        
                    <div class="form-group formMargin">
                        <label for="date" class="control-label col-sm-4">Date : </label>
                        <input class="form-control col-sm-8" type="text" id="date" name="date" readonly>
                    </div>
                    <div class="form-group formMargin">
                        <label for="time" class="control-label">Time : </label>
                        <input class="form-control col-sm-8" type="text" id="time" name="time" readonly>
                    </div>


                    <div class="form-group formMargin">
                        <label for="name" class="control-label">Name : 
                            <i id="nameI" class="material-icons" style="font-size:24px;color:green;display:none">check</i>  
                        </label>
                        <input class="form-control" type="text" id="name" name="name" onblur="nameValidate()" onfocus="clearError('nameErr')"required>  
                                            
                        <span class="help-block validError" id="nameErr"></span>
                    </div>
                    <div class="form-group formMargin">
                        <label for="htel" class="control-label">Contact No (Mobile) : 
                            <i id="htelI" class="material-icons" style="font-size:24px;color:green;display:none">check</i> 
                        </label>
                        <input class="form-control" type="text" id="htel" name="htel" onblur="htelValidate()" onfocus="clearError('htelErr')" required>                        
                        <span class="help-block validError" id="htelErr"></span>
                    </div>
                    <div class="form-group formMargin">
                        <label for="ltel" class="control-label">Contact No (Land) : 
                            <i id="ltelI" class="material-icons" style="font-size:24px;color:green;display:none">check</i> 
                        </label>
                        <input class="form-control" type="text" id="ltel" name="ltel" onblur="ltelValidate()" onfocus="clearError('ltelErr')" >
                        <span class="help-block validError" id="ltelErr"></span>
                    </div>
                    <div class="form-group formMargin">
                        <label for="adrs" class="control-label">Address :    </label>
                        <textarea class="form-control" type="text" id="adrs" name="adrs" rows="5" required></textarea>
                    </div>
                    <div class="form-group formMargin">
                        <label for="item" class="control-label">Item Code :    </label>
                        <input class="form-control" type="text" id="itm" name="itm" required>
                        <p style="margin-left: 5%;color:blue">*copy the item code from the product view</p>
                    </div>
                    <div class="form-group formMargin">
                        <label for="size" class="control-label">Size :    </label>
                        <select class="form-control" id="size" name="size" required>
                            <option value="xs">XS</option>
                            <option value="s">S</option>
                            <option value="m">M</option>
                            <option value="l">L</option>
                            <option value="xl">XL</option>
                        </select>
                    </div>
                    <div class="form-group formMargin">
                        <label for="qtty" class="control-label">Quantity :    
                            <i id="qttyI" class="material-icons" style="font-size:24px;color:green;display:none">check</i> 
                        </label>
                        <input class="form-control" type="text" id="qtty" name="qtty" onblur="quantityValidate()" onfocus="clearError('qttyErr')"required>                     
                        <span class="help-block validError" id="qttyErr"></span>
                    </div>
                    <div class="form-group formMargin">
                        <label for="payment" class="control-label">Payment Method : </label>
                        <input class="form-control col-sm-8" type="text" id="payment" value="Cash on Delivery" readonly>
                    </div><br>
                    <div class="form-group formMargin">
                        <button class="btn btn-primary btn-lg" classtype="submit" id="submit" name="submit" onclick="validate()">Confirm</button>
                        <button class="btn btn-warning btn-lg" type="reset" id="reset" onclick="resetForm()">Clear</button>
                    </div>

            </form>
        

    </div>

    
    <script>
          
        var d = new Date();
        var date =d.getDate() +'-'+(d.getMonth()+1)+'-'+d.getFullYear();
        document.getElementById("date").value= date;

        var time = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
        document.getElementById("time").value= time;

        function resetForm() {
            document.getElementById("form").reset();
            document.getElementById("msg").style.display = "none";
            window.close();
        }

        function validate() {

            var quantity = document.getElementById("qtty").value;

            
            if (isNaN(quantity)) {
                alert("Quantity input not valid")
                document.getElementById("qtty").style.backgroundColor = "red";
                return false;
            }              

        }

        function nameValidate() {
            var name = document.getElementById("name").value;
            var nameError = "Name should contain only charactors and More than 3 charactors";
            if(reg.test(name) ) {

                document.getElementById("nameErr").innerHTML = nameError;
                document.getElementById("nameI").style.display = 'none';
                
            }
            else{
                document.getElementById("nameI").style.display = 'inline';
            }
        }

        var reg = /^\d+$/;
        var telError = "Mobile number should contain only numbers and Length=10";

        function htelValidate() {
            var htel = document.getElementById("htel").value;
            if(!reg.test(htel)) {

                document.getElementById("htelErr").innerHTML = telError;
                document.getElementById("htelI").style.display = 'none';            
            }
            else{
                document.getElementById("htelI").style.display = 'inline';
            }
        }

        function ltelValidate() {
            var ltel = document.getElementById("ltel").value;
            if(!reg.test(ltel)) {

                document.getElementById("ltelErr").innerHTML = telError;
                document.getElementById("ltelI").style.display = 'none';
            }
            else{
                document.getElementById("ltelI").style.display = 'inline';
            }
        }

        function quantityValidate() {
            var qtty = document.getElementById("qtty").value;
            var qttyError = "Quantity should contain only numbers and More than 0";
            if(!reg.test(qtty) || qtty<=0) {

                document.getElementById("qttyErr").innerHTML = qttyError;
                document.getElementById("qttyI").style.display = 'none';
                
            }else{
                document.getElementById("qttyI").style.display = 'inline';
            }
        }



        function clearError(id) {
            document.getElementById(id).innerHTML = "";
        }
        


    
    </script>
        
    <!-- <form id="form" onload="dateTime()" method="post" enctype="multipart/form-data" action="oderForm.php">

        <?php
            $rand=rand();
            $_SESSION['rand']=$rand;
        ?>
            <input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />
   
        
            <label>Date : </label>
            <input type="text" id="date" name="date" readonly>
            <br><br>
            <label>Time : </label>
            <input type="text" id="time" name="time" readonly>
            <br><br><br><br><br>
            <label>Name : </label>
            <input type="text" id="name" name="name" required>
            <br><br>
            <label>Contact No (Mobile) : </label>
            <input type="text" id="htel" name="htel" required>
            <br><br>
            <label>Contact No (Land) : </label>
            <input type="text" id="ltel" name="ltel" >
            <br><br>
            <label>Address :    </label>
            <textarea type="text" id="adrs" name="adrs" required></textarea>
            <br><br><br><br><br><br>
            <label>Item Code :    </label>
            <input type="text" id="itm" name="itm" required>
            <p style="margin-left: 44%;color:red">*copy the item code from the product view</p>
            <br>
            <label>Size :    </label>
            <select id="size" name="size" required>
                <option value="xs">XS</option>
                <option value="s">S</option>
                <option value="m">M</option>
                <option value="l">L</option>
                <option value="xl">XL</option>
            </select>
            <br><br>
            <label>Quantity :    </label>
            <input type="text" id="qtty" name="qtty" required>
            <br><br>
            <label>Payment Method : </label>
            <input type="text" id="date" value="Cash on Delivery" readonly>
            <br><br>
            <button type="submit" id="submit" name="submit" onclick="validate()">Confirm</button>
            <button type="reset" id="reset" onclick="resetForm()">Clear</button>

        </form> -->
    </div>  


    <?php        

        
        if (isset($_POST['submit'])) {
            
        $date = $_POST["date"];
        $time = $_POST["time"];
        $name = $_POST["name"];
        $htel = $_POST["htel"];
        $ltel = $_POST["ltel"];
        $adrs = $_POST["adrs"];
        $itm = $_POST["itm"];
        $size = $_POST["size"];
        $qtty = $_POST["qtty"];


        $server = 'localhost:3308';
        $user = 'root';
        $pass = '';
        $db = 'wad_app';
        
    
        $conn = new mysqli( $server,$user , $pass,$db) ;
        $sql = "INSERT INTO oders (date,time,name,mobileNo,landNo,address,itemNo,size,quantity) 
        VALUES ('$date','$time','$name','$htel','$ltel','$adrs','$itm','$size','$qtty')" ;

        
    
        
        if(mysqli_query($conn, $sql)){
            echo '<script>
            document.getElementById("msg").style.display = "block";
        </script>';
            echo '<script> 
            document.getElementById("form").reset();
            window.close();
            </script>';
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            exit();
        }
        }

        

        

        
    
    ?>

        


    
    
</body>


</html>