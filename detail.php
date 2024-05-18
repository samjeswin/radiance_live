<html>

<?php  
require 'conn.php';

if (isset($_POST['submit'])){

    $name = $_POST['user_name'];
    $email = $_POST['user_email'];
    $password =$_POST['password'];
    $flatname =$_POST['flatname'];
    $door_no =$_POST['door'];
echo $door_no;
$ownerqry = "SELECT * FROM r_owner_detail where door_no ='$door_no'";
$own_res = mysqli_query($conn, $ownerqry);
while ($own = mysqli_fetch_array($own_res)){

    $name_chk = $own['name'];
}
if(empty($name_chk)){

    $update = "update r_owner_detail set name ='$name', email='$email' where door_no = '$door_no'";
    echo $update;
    $update_res = mysqli_query($conn, $update);
}
}
?>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up Form</title>
        <link rel="stylesheet" href="https://codepen.io/gymratpacks/pen/VKzBEp#0">
        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/main.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<style>
    *, *:before, *:after {
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    }

    body {
    font-family: 'Nunito', sans-serif;
    color: #384047;
    }

    form {
    max-width: 300px;
    margin: 10px auto;
    padding: 10px 20px;
    background: #f4f7f8;
    border-radius: 8px;
    }

    h1 {
    margin: 0 0 30px 0;
    text-align: center;
    }

    input[type="text"],
    input[type="password"],
    input[type="date"],
    input[type="datetime"],
    input[type="email"],
    input[type="number"],
    input[type="search"],
    input[type="tel"],
    input[type="time"],
    input[type="url"],
    textarea,
    select {
    background: rgba(255,255,255,0.1);
    border: none;
    font-size: 16px;
    height: auto;
    margin: 0;
    outline: 0;
    padding: 15px;
    width: 100%;
    background-color: #e8eeef;
    color: #8a97a0;
    box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
    margin-bottom: 30px;
    }

    input[type="radio"],
    input[type="checkbox"] {
    margin: 0 4px 8px 0;
    }

    select {
    padding: 6px;
    height: 32px;
    border-radius: 2px;
    }

    button {
    padding: 19px 39px 18px 39px;
    color: #FFF;
    background-color: #4bc970;
    font-size: 18px;
    text-align: center;
    font-style: normal;
    border-radius: 5px;
    width: 100%;
    border: 1px solid #3ac162;
    border-width: 1px 1px 3px;
    box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
    margin-bottom: 10px;
    }

    fieldset {
    margin-bottom: 30px;
    border: none;
    }

    legend {
    font-size: 1.4em;
    margin-bottom: 10px;
    }

    label {
    display: block;
    margin-bottom: 8px;
    }

    label.light {
    font-weight: 300;
    display: inline;
    }

    .number {
    background-color: #5fcf80;
    color: #fff;
    height: 30px;
    width: 30px;
    display: inline-block;
    font-size: 0.8em;
    margin-right: 4px;
    line-height: 30px;
    text-align: center;
    text-shadow: 0 1px 0 rgba(255,255,255,0.2);
    border-radius: 100%;
    }

    @media screen and (min-width: 480px) {

    form {
        max-width: 480px;
    }

    }
</style>
    </head>

    <body>
    <script>
				function doorno(val) {
						$.ajax({
						type: "POST",
						url: "drop.php",
						data:'flat='+val,
						success: function(data){
							$("#door_no").html(data);
						}
						});
					}
</script>	
      <div class="row">
    <div class="col-md-12">
    <form method="get" action="apk/GoWatr.apk">
              <button type="submit">Download!</button>
          </form>
        
      <form action="" method="post">
        <h1> Sign Up </h1>
        
        <fieldset>
          
          <legend><span class="number">i</span> Your  Info</legend>  
          
     
          <select onChange="doorno(this.value);"  name="flatname" id="state" class="form-control" required>
                                        <option value="">Select Apartment </option>
                                          <!--- Fetching States--->
                                            <?php
                                              $sql="SELECT * FROM flat_details";
                                                $res= mysqli_query($conn,$sql);
                                             while($row = mysqli_fetch_array($res)) { 
                                            ?>
                                        <option value="<?php echo $row['flat_name'];?>"><?php echo $row['flat_name'];?></option>
                                      <?php }?>
                                    </select>
                                    <br>
                                    <select name="door" id="door_no" class="form-control" required>
                                        <option value="">Select Door No</option>
                                    </select>

          <label for="name">Name:</label>
          <input type="text" id="name" name="user_name">
        
          <label for="email">Email:</label>
          <input type="email" id="mail" name="user_email">
       
          <label for="password">Password:</label>
          <input type="password" id="password" name="password">
        
                                    
        </fieldset>
<?php
//  $state = $_GET["devices"];
//  echo $state;
// //  //D:/xampp/htdocs/gowatr-phpdevelopment/testui/


// //     $command = escapeshellcmd('python wifi.py');
// //     $output = shell_exec($command);
// //     echo $output;



// $command = escapeshellcmd('python3 http://localhost/gowatr-phpdevelopment/testui/wifi.py');
// $output = shell_exec($command);
// echo $output;

$output = shell_exec("python wifi.py");

echo $output;
?>
       
        <button type="submit" name="submit">Sign Up</button>
        
       </form>
        </div>
      </div>
      
    </body>
</html>
