<?php
ini_set('display_errors', 'On');
session_start();
include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <title>passengerProfile</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <img src="images/car.gif"  height="50" width="50">
          <a class="navbar-brand" href="#">Taxi-App Welcome <?php echo $_SESSION['name'] ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
          </ul>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" action="footer.php">
            <button type="submit" class="btn btn-danger">Sign Out</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
     <div class="container">
       <br> 
  <ul class="nav nav-pills" role="tablist">
    <li><a href="passengerProfile.php">Home</a></li>
    <li class="active"><a href="#">See Driver Bids</a></li>     
  </ul>
</div>
	<br>
<?php
    /*$id = $_SESSION['userId'];
    $query = mysql_query("SELECT `name`,`request_id`,`bid` FROM driverbid NATURAL JOIN driver WHERE request_id IN (SELECT request_id FROM hire_request NATURAL JOIN passenger WHERE `passenger`.`contact_no` = '$id')");
    @$exist = mysql_num_rows($query);
        if($exist > 0){
            
            $dynamicList = "";
            while($row = mysql_fetch_array($query)){ // display all rows  from query
                $name = $row['name'];
                $bid = $row['bid'];
                $request_id = $row['request_id'];
                 $dynamicList .= "<tr><td>$name</td>
                                    <td>$bid</td>
                                    <td>
                                        <button type='submit' name='Accept'>Accept</button>
                                    </td>
                                    </tr>";
            }
        }*/
         
function getBids(){
    $bids = array();
     $id = $_SESSION['userId'];
    $query = mysql_query("SELECT `name`,`request_id`,`bid` FROM driverbid NATURAL JOIN driver WHERE request_id IN (SELECT request_id FROM hire_request NATURAL JOIN passenger WHERE `passenger`.`contact_no` = '$id')");
    
    while($row = mysql_fetch_array($query)){ // display all rows  from query
		$bidRow = array();
		$bidRow[0] = $row['name'];
		$bidRow[1] = $row['bid'];
		$bidRow[2] = $row['request_id'];
		 
        $bids[]= $bidRow;
       
    }
    return $bids;
}
?>
    
    <div class="container">
            <div class="jumbotron">
                
                    <br>
                    <br>
                    <br>
                    <div class="panel panel-primary">
                    <div class="panel-heading">Hire Request</div>
                    <table class="table table-striped">
						<th>Driver Name</th>
						<th>Bid</th>
						<?php
							$hireBids =getBids();
							
							foreach ($hireBids as $bid) {
						?>
								
									<tr>
										<td><?php echo $bid[0] ?></td>
										<td><?php echo $bid[1] ?></td>
										<td>
                                            <button type="submit" value="<?php echo $bid[2] ?>" class="btn-success">Accept Ride</button>                                             </td>
									 </tr>
									
						
						<?php
							}
						?>
                    
                    </table>
                    </div>
                    <br>
                        </div>
                
            </div>
        </div>
        
        <script>
            $(document).ready(function(){
                $('.btn-success').click(function(){
                    var clickBtnValue = $(this).val();
                    var ajaxurl = 'ajax.php',
                    data =  {'requestId': clickBtnValue};
                    $.post(ajaxurl, data, function (response) {
                    alert("You have suuccessfully booked a taxi");
        });
    });

});
        </script>
	
</body>

</html>
