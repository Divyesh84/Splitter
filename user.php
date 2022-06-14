<!DOCTYPE html>
<html>
    <head>
        
        <title>Splitter</title>

        <link rel="stylesheet" href="stylesheet.css" type="text/css">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        
        <script>
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
        </script>


        <style>

            .positive{
                color:green;
                font-size:30px;
            }

            .negative{
                color:red;
                font-size:30px;
            }

            .ajaxF{
                margin-left:30px;
                line-height: 1.6;
            }

            .b1{
                background-color: dodgerblue;
                padding: 10px;
                border: none;
                color: white;
                border-radius: 5px;
                display: inline-block;
                
            }

            .b1:hover{
                color: dodgerblue;
                background-color: white;
                border: 0.5px solid dodgerblue;
            }

            .close{
                float: right;
                background-color: white;
                color:darkgrey;
                border: none;
                font-size: 30px;
            }

            .save{
                border: none;
                background-color: dodgerblue;
                color: white;
                padding: 10px 15px;
                border-radius: 5px;
            }

            .save:hover{
                color: dodgerblue;
                background-color: white;
                border: 0.5px solid dodgerblue;
            }

            .close:hover{
                color: darkslategray;
            }

            .addFriend{
                background-color: dodgerblue;
                padding: 5px;
                border: none;
                color: white;
                border-radius: 5px;
                display: inline-block;

            }

            .addFriend:hover{
                color: dodgerblue;
                background-color: white;
                border: 0.5px solid dodgerblue;
            }

            table.viewF {
                border-collapse: collapse;
                width: 100%;
                }

            .viewF td {
                padding: 8px;
                text-align: left;
                border-bottom: 1px solid #ddd;
                }

            .viewF th {
                padding: 8px;
                text-align: left;
                border-bottom: 1px solid #ddd;
                background-color:yellow;
                }

            .viewF tr:hover {
                background-color: coral;
            }
            
            .error{
                color: red;
                margin-left:25px;
            }

        </style>

        <script>
            function openForm() {
            document.getElementById("add").style.display = "block";
            }

            function closeForm() {
            document.getElementById("add").style.display = "none";
            }

            function openForm2() {
            document.getElementById("addFriend").style.display = "block";
            }

            function closeForm2() {
            document.getElementById("addFriend").style.display = "none";
            }

            /*
            function deleteRow(o) {
            var p=o.parentNode.parentNode;
            p.parentNode.removeChild(p);
            }
            */

        </script>

<script>
    
</script>
    
    </head>

    <body>
    <?php 
        $user = $_GET['user'];
        $userFriend = $user."friend";
        $userHistory = $user."history";
        $userRecord = $user."record";
        $selfUrl = $_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
        date_default_timezone_set('Asia/Calcutta');
    ?>
    
        <header class="header">
            <nav class="navbar navbar-style">
                    <div class="container">
                        <div class="navbar-header">

                            <a href=""> <img src="logo.png" alt="logo" class="logo"></a>

                        </div>
                        <h2>Welcome...&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $user;?></h2>
                        <ul class="nav">

                            <li class="nav-item"><a  class="nav-link" href="">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="">Features</a></li>
                            <li class="nav-item"><a class="nav-link" href="">Team</a></li>
                            <li class="nav-item"><a class="nav-link" href="">About Us</a></li>

                        </ul>
    
                </div>

            </nav>
            
        </header>
        <?php include "connection.php"?>
        <?php
            $fnameErr="";
            if(isset($_POST['addF']))
            {
                $fname = $_POST['search'];
                $fnameFriend = $fname."friend";
                $query = "SELECT * from register WHERE UNAME='$fname'";
                $n = $conn->query($query);
                if($n->num_rows == 0)
                {
                    $fnameErr="No user exists.";
                }
                else
                {
                    $query = "SELECT * from $userFriend WHERE FNAME='$fname'";
                    $n = $conn->query($query);
                    if($n->num_rows == 1)
                    {
                        $fnameErr="Already Friends.";
                    }
                    else
                    {
                        $query="INSERT INTO $userFriend values('$fname')";
                        $query1="INSERT INTO $fnameFriend values('$user')";
                        $conn->query($query);
                        $conn->query($query1);
                    }
                }   
            }
        ?>
        <div class="row  my-5 mx-5">

            <div class="col-sm-3 border-end">

                <div class="row my-3 border-bottom">

                    <div class="col-sm-8">FRIENDS</div>

                    <div class="col-sm-4">
                        <button class="addFriend" onclick="openForm2()">+add</button>

                    </div>

                </div>

                <div class="container-fluid border-bottom" id="addFriend" style="display: none;">

                    <div>
                        <h4 style="display: inline-block;" >Add friends</h4>
                        
                        <button type="button" class="close" aria-label="Close" onclick="closeForm2()">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <br>
                    <form action="<?php echo $selfUrl; ?>" method="post">

                        <label for="user">To: </label>
                        <input type="text" id="search" placeholder="Username" name="search">
                        <span class="error"><?php echo $fnameErr;?></span>
                        <br>
                        <div id="output" class="ajaxF"></div>
                        <br>

                        <center><input type="submit" value="Add" class="save" name="addF"></center>

                        <script type="text/javascript">
                        $(document).ready(function(){
                        $("#search").keyup(function(){
                            var query = $(this).val();
                            if (query != "") {
                                $.ajax({
                                url: 'searchfriend.php',
                                method: 'POST',
                                data: {query:query},
                                success: function(data){
                    
                                    $('#output').html(data);
                                    $('#output').css('display', 'block');
                    
                                    $("#search").focusout(function(){
                                        $('#output').css('display', 'none');
                                    });
                                    $("#search").focusin(function(){
                                        $('#output').css('display', 'block');
                                    });
                                }
                                });
                            } else {
                            $('#output').css('display', 'none');
                            }
                        });
                        });
                    </script>

                        <br>
                    </form>

                </div>
                
                <?php
                    $query = "select * from $userFriend";
                    $rs = $conn->query($query);
                    echo "<br>";
                    echo '<table class="viewF">';
                    while($r = $rs->fetch_assoc())
                    {
                        echo "<tr>";
                        echo "<td>".$r["FNAME"]."</td>";
                        //<td><input type='button' value='&#10008;' onclick='deleteRow(this)'></td>
                        echo "</tr>";
                    }
                    echo '</table>';   
                ?>
            </div>
            
            <div class="col-sm-6 p-3 border-end">

                <div class="container-fluid">

                    <h2 style="display: inline-block;">Dashboard</h2>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button class="b1" onclick="openForm()">Add an expense</button>

                </div>
                <br>
                <div class="row border-bottom" id="add" style="display: none;"> 
                    
                    <?php
                        $flag=0;
                        $addEfname=$des=$date="";
                        function check($n)
                        {
                            $n = trim($n);
                            $n = stripslashes($n);
                            $n = htmlspecialchars($n);
                            return $n;
                        }
                        if(isset($_POST['addE']))
                        {
                            if(empty($_POST["f1"])){
                                echo "<script>";
                                echo 'alert("Failed to add expanse.\n\nFriend Name is required!!!");';
                                echo "</script>";
                                $addEfname = "";
                            }
                            else
                            {
                                $addEfname = check($_POST['f1']);
                                $fnameFriend = $addEfname."friend";
                                $query = "SELECT * from $userFriend WHERE FNAME='$addEfname'";
                                $n = $conn->query($query);
                                if($n->num_rows == 0)
                                {
                                    echo "<script>";
                                    echo 'alert("Failed to add expanse.\n\nNo Friend exists!!!");';
                                    echo "</script>";
                                    $addEfname = "";
                                }
                                else
                                {
                                    $flag++;
                                }   
                            }
                            
                            if(empty($_POST["des"])){
                                echo "<script>";
                                echo 'alert("Failed to add expanse.\n\nDescription is required!!!");';
                                echo "</script>";
                                $des = "";
                            }
                            else{
                                $des = check($_POST['des']);
                                $flag++;
                            }

                            $amount = $_POST['amount'];
                            $flag++;
                            
                            $time = strtotime($_POST['date']);

                            if($time)
                            {
                                $date = date('Y-m-d', $time);
                                $flag++;
                            }
                            else{
                                echo "<script>";
                                echo 'alert("Failed to add expanse.\n\nDate is required!!!");';
                                echo "</script>";
                                $date = "";
                            }

                            if($flag==4){
                                $flag=0;
                                
                                $fnameRecord = $addEfname."record";
                                $fnameHistory = $addEfname."history";
                                if($_POST['split']==1)
                                    {
                                        $amountU = $amount/2;
                                        $amountF = -1 * $amountU;
                                        $userH = "You get back $amountU from $addEfname for $des.";
                                        $friendH = "You owe $amountU to $user for $des.";
                                        $timeNow = date("Y-m-d");
                                        $query1 = "INSERT INTO $userRecord values('$addEfname','$amountU','$date','$des')";
                                        $query2 = "INSERT INTO $fnameRecord values('$user','$amountF','$date','$des')";
                                        $query3 = "INSERT INTO $userHistory values('$userH','$timeNow')";
                                        $query4 = "INSERT INTO $fnameHistory values('$friendH','$timeNow')";
                                        
                                        if($conn->query($query1) && $conn->query($query2) && $conn->query($query3) && $conn->query($query4))
                                        {
                                            echo "<script>";
                                            echo 'alert("\nExpanse Added...");';
                                            echo "</script>";
                                        }
                                    }
                                else if($_POST['split']==3)
                                    {
                                        $amountU = $amount;
                                        $amountF = -1 * $amount;
                                        $userH = "You get back $amountU from $addEfname for $des.";
                                        $friendH = "You owe $amountU to $user for $des.";
                                        $timeNow = date("Y-m-d");
                                        $query1 = "INSERT INTO $userRecord values('$addEfname','$amountU','$date','$des')";
                                        $query2 = "INSERT INTO $fnameRecord values('$user','$amountF','$date','$des')";
                                        $query3 = "INSERT INTO $userHistory values('$userH','$timeNow')";
                                        $query4 = "INSERT INTO $fnameHistory values('$friendH','$timeNow')";
                                        
                                        if($conn->query($query1) && $conn->query($query2) && $conn->query($query3) && $conn->query($query4))
                                        {
                                            echo "<script>";
                                            echo 'alert("\nExpanse Added...");';
                                            echo "</script>";
                                        }
                                    }
                                else if($_POST['split']==2){
                                        $amountU = -1 * $amount;
                                        $amountF = $amount;
                                        $friendH = "You get back $amountF from $user for $des.";
                                        $userH = "You owe $amountF to $addEfname for $des.";
                                        $timeNow = date("Y-m-d");
                                        $query1 = "INSERT INTO $userRecord values('$addEfname','$amountU','$date','$des')";
                                        $query2 = "INSERT INTO $fnameRecord values('$user','$amountF','$date','$des')";
                                        $query3 = "INSERT INTO $userHistory values('$userH','$timeNow')";
                                        $query4 = "INSERT INTO $fnameHistory values('$friendH','$timeNow')";
                                        
                                        if($conn->query($query1) && $conn->query($query2) && $conn->query($query3) && $conn->query($query4))
                                        {
                                            echo "<script>";
                                            echo 'alert("\nExpanse Added...");';
                                            echo "</script>";
                                        }
                                }
                                else
                                {
                                        $amountF = $amount/2;
                                        $amountU = -1 * $amountF;
                                        $userH = "You owe $amountF to $addEfname for $des.";
                                        $friendH = "You get back $amountF from $user for $des.";
                                        $timeNow = date("Y-m-d");
                                        $query1 = "INSERT INTO $userRecord values('$addEfname','$amountU','$date','$des')";
                                        $query2 = "INSERT INTO $fnameRecord values('$user','$amountF','$date','$des')";
                                        $query3 = "INSERT INTO $userHistory values('$userH','$timeNow')";
                                        $query4 = "INSERT INTO $fnameHistory values('$friendH','$timeNow')";
                                        
                                        if($conn->query($query1) && $conn->query($query2) && $conn->query($query3) && $conn->query($query4))
                                        {
                                            echo "<script>";
                                            echo 'alert("\nExpanse Added...");';
                                            echo "</script>";
                                        }
                                }
                                $addEfname=$des=$date="";
                            }
                        }
                    ?>
                    
                    <form action="<?php echo $selfUrl; ?>" method="post">

                    <div class="container-fluid">

                        <h4 style="display: inline-block;">Add Expenses</h4>

                        <button type="button" class="close" aria-label="Close" onclick="closeForm()">
                        <span aria-hidden="true">&times;</span>
                        </button>

                    </div>
                        <br>
                        <label for="friend">With <b style="color:dodgerblue;font-size:30px">You </b>and </label>&nbsp;&nbsp;
                        <input type="text" name="f1" id="f1">   

                        <br><br>

                        <label for="des">Description</label>&nbsp;&nbsp;
                        <input type="text" name="des" id="des">

                        <br><br>

                        <label for="amount">Amount</label>&nbsp;&nbsp;
                        <input type="number" step="any" name="amount" id="amount" min="1"> <b>&#8360;</b>
                        <br><br>
                        <center>
                        <select name="split" id="spit">
                            <option value="1">Paid by you and split equally.</option>
                            <option value="2">You owe the full amount.</option>
                            <option value="3">They owe the full amount.</option>
                            <option value="4">Paid by them and split equally.</option>
                        </select> 

                        </center>
                        <br>
                        <label for="date">Date</label> &nbsp;&nbsp;
                        <input type="date" name="date" id="date">

                        <center>
                            <input type="submit" value="Save" class="save" name="addE">

                        </center>

                        <br>
                
                    </form>

                </div>

                <div class="row p-3">

                    <div class="col-sm-4">
                        <center style="font-size:25px">
                            You are owed<br><br>
                            <b class="positive">
                            <?php
                                $query = "SELECT SUM(AMOUNT) AS total FROM $userRecord WHERE AMOUNT>=0";
                                $n = $conn->query($query);
                                $rs = $n->fetch_assoc();
                                $sum2 = $rs["total"];
                                if($sum2 == null)
                                    echo 0;
                                else
                                    echo $sum2;
                                
                            ?>
                            </b>
                        </center>
                    </div>

                    <div class="col-sm-4">
                        <center style="font-size:25px">
                            You owe<br><br>
                            <b class="negative">
                            <?php
                                $query = "SELECT SUM(AMOUNT) AS total FROM $userRecord WHERE AMOUNT<0";
                                $n = $conn->query($query);
                                $rs = $n->fetch_assoc();
                                $sum1 = $rs["total"];
                                if($sum1 == null)
                                    echo 0;
                                else
                                    echo abs($sum1);
                                
                            ?>
                            </b>
                        </center>
                    </div>
                    <div class="col-sm-4">
                        <center style="font-size:25px">
                            Overall<br><br>
                            <?php
                                $sum3 = $sum1 + $sum2;
                                if($sum3 == null)
                                    echo '<b class="positive">0</b>';
                                else if($sum3>=0)
                                    echo '<b class="positive">'.$sum3.'</b>';
                                else
                                    echo '<b class="negative">'.$sum3.'</b>';
                            ?>
                        </center>
                    </div>

                </div>
                <br>
                <br>
                <br>

                <div class="row" style="margin-left:30px">
                <?php
                    $query = "SELECT FNAME, SUM(AMOUNT) AS TOTAL FROM $userRecord GROUP BY FNAME";
                    $n = $conn->query($query);
                    $m = $conn->query($query);
                ?>
                    
                    <div class="col-sm-6">
                    <center>
                        <h4>YOU ARE OWED</h4>
                        <?php
                            if($m->num_rows > 0)
                            {
                                echo "<br>";
                                echo '<table class="viewF">';
                                echo '<tr><th>By</th><th>Amount</th></tr>';
                                while($rs = $m->fetch_assoc())
                                {
                                    if($rs['TOTAL']>0)
                                    {
                                        echo "<tr>";
                                        echo "<td>".$rs["FNAME"]."</td>";
                                        echo "<td>".abs($rs["TOTAL"])."</td>";
                                        echo "</tr>";
                                    }
                                }   
                                echo '</table>'; 
                            }
                        ?>
                    </center>
                    </div>
                    
                    <div class="col-sm-6">
                    <center>
                        <h4>YOU OWE</h4>
                        <?php
                            if($n->num_rows > 0)
                            {
                                echo "<br>";
                                echo '<table class="viewF">';
                                echo '<tr><th>To</th><th>Amount</th></tr>';
                                while($rs = $n->fetch_assoc())
                                {
                                    if($rs['TOTAL']<0)
                                    {
                                        echo "<tr>";
                                        echo "<td>".$rs["FNAME"]."</td>";
                                        echo "<td>".abs($rs["TOTAL"])."</td>";
                                        echo "</tr>";
                                    }
                                }   
                                echo '</table>'; 
                            }
                        ?>
                    </center>
                    </div>
                </div>

                

            </div>

            <div class="col-sm-3">

            
            </div>

        </div>

    </body>

</html>