<?php
 $f=0;
 $r=5;
 $NAME = '';
 $PNAME = '';
 $show = '';
 $clsa = 'act_textcls' ;
 $clse = 'act_textcls' ;
 $clsf = 'act_textcls' ;
 $clsl = 'act_textcls' ;
 $clsm = 'act_textcls' ;
 $clss = 'act_textcls' ;
 $disp =0;
 for($i=0;$i<6;$i++){
   		$flames[$i]=TRUE;
 }
   	
   if(isset($_POST['reset_me'])){
   	header("Location: index.php");
   }
   	
   	
   if(isset($_POST['flames_btn'])){
   	$NAME = strtolower($_POST['name']);
   	$PNAME = strtolower($_POST['pname']);
   	$total = strlen($NAME)+strlen($PNAME);
   	if(strlen($NAME)>strlen($PNAME)){
   		$max = strlen($NAME);
   	}else{
   		$max = strlen($PNAME);
   	}
   	for($y=0;$y<$max;$y++){
   	  	$pcrt[$y]=FALSE;
   	  	$crt[$y]=FALSE;
   	 }
   	 $count = 0;
   	for($x=0;$x<strlen($NAME);$x++){
   	  for($y=0;$y<strlen($PNAME);$y++){
   	  		if(($NAME[$x]==$PNAME[$y]) && ((!$pcrt[$y])&&(!$crt[$x]))){
   	  				$pcrt[$y]=TRUE;
   	  				$crt[$x]=TRUE;
   	  				$count++;
			}
   	 	  }
   		}
   	$s = $total-($count*2);
   	for($i=1,$j=0,$n=6;$n!=1;$j++){
   			if($j==6){
   				$j=0;
   			}
   			if($flames[$j]==TRUE){
   					if($i==$s){
   						$flames[$j]=FALSE;
   						$n--;
   						$i=0;
   				    }
   				$i++;
   			}
   		}

   	for($i=0;$i<6;$i++){
   		if($flames[$i]){
   			$result = $i+1;
   			break;   
   		}
   	} 
   	
   	switch($result){
   		case 1:
   				$show = 'Friendship';
   				$clsf = 'act_textcls fontf';
   				$disp = 1;
   				break;
   		case 2:
   				$show =  'Love';
   				$clsl = 'act_textcls fontl';
   				$disp = 1;
   				break;
   		case 3:
   				$show =  'Affection';
   				$clsa = 'act_textcls fonta';
   				$disp = 1;
   				break;
   		case 4:
   				$show =  'Marriage';
   				$clsm = 'act_textcls fontm';
   				$disp = 1;
   				break;
   		case 5:
   				$show =  'Enemy';
   				$clse = 'act_textcls fonte';
   				$disp = 1;
   				break;
   		case 6:
   				$show =  'Siblings';
   				$clss = 'act_textcls fonts';
   				$disp = 1;
   				break;
   		
   	}
   	
   	
   }
?>
<!DOCTYPE >
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="icon" href="ICON.png" >
	<link rel="stylesheet" href="style.css"  />	
	<style>
		.form-control{
	margin: 6px;
}
.act_textcls{
	font-size: 45px;
	font-style: oblique; 
}
.fontf{
	color: #00aa00;
}
.fontl{
	color: #ff0000;
}
.fonta{
	color: #ffff00;
}
.fontm{
	color: #0000ff;
}
.fonte{
	color: #55ffff;
}
.fonts{
	color: #ff00ff;
}
	</style>
	<title>Relationship calculator</title>
</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<img src="LOGO.png" class="img-responsive" alt="logo" >
		</div>
	</div>
	<hr><div class="row">
	<div class="col-sm-3"></div>
		<div class="col-sm-6">
				<div class="panel panel-danger">
					<div class="panel-heading">
						<h3 class="text-danger text-uppercase" align="center">&nbsp;&nbsp;FLAMES test&nbsp;&nbsp;</h3>
					</div>
					<div class="panel-body">
<form name="myForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validateForm()" method="post" class="form-horizontal">
    <div class="form-group">
      <div class="col-sm-12">
        <input type="text" placeholder="Enter Your Name " class="form-control" max="25" min="3" id="name" value="<?php echo $NAME; ?>" name="name"/>	
      </div>
    <p id="nameerror"></p>
    </div>
    <div class="form-group">
      <div class="col-sm-12">
        <input type="text" placeholder="Enter Your Partner Name " class="form-control" max="25" min="3" id="pname" name="pname" value="<?php echo $PNAME; ?>" />	
      </div>
      <p id="partnernameerror"></p>
    </div>
    <center>
    <button  type="submit" name="flames_btn" class="btn btn-primary">&nbsp;<span class="glyphicon glyphicon-heart"></span>&nbsp;TEST&nbsp;&nbsp;</button> 
    
    <button  type="submit" id="reset_me" name="reset_me" class="btn btn-danger">&nbsp;<span class="glyphicon glyphicon-wrong"></span>&nbsp;RESET&nbsp;&nbsp;</button>
    </center>
</form>
<?php
if($disp){
echo'<h2 class="text-uppercase text-success">RESUlt :  </h2>
	<center><h1><span class="'.$clsf.'" >F</span>&nbsp;&nbsp;<span class="'.$clsl.'">L</span>&nbsp;&nbsp;<span class="'.$clsa.'" >A</span>&nbsp;&nbsp;<span class="'. $clsm.'">M</span>&nbsp;&nbsp;<span class="'.$clse.'">E</span>&nbsp;&nbsp;<span class="'.$clss.'" >S</span></h1>
	<h2>"'.$show.'"</h2></center>';
}
	?>
	</div>
				</div>
		</div>
	<div class="col-sm-3"></div>
	</div>
	<hr>
	<div class="row">
		<div class="col-xs-12">
			<p align="justify">
				<h2 style="color: red">How does this flames calculator work ?</h2>
It is always hard to define the relationship between two people in a simple word like friendship, love, affection and enemy or to predict the outcome, like marriage.<br><br>

The above tool tries to find the answer to questions likes "what is our relationship?" or to give you a sense of what is going on between you and another person. You are only asked to enter the two names between which you want to calculate the relationship.<br><br>

The flames calculator is based on quite a simple algorithm in which FLAMES stands for:<br><br>

■ Friendship;<br><br>

■ Love;<br><br>

■ Affection;<br><br>

■ Marriage;<br><br>

■ Enemy;<br><br>

■ Siblings.<br><br>

The FLAMES test is actually a compatibility analysis that reveals to what extent the relationship between two persons can go, defining that into 6 simple words.
<br><br>
You can use it as a love meter to see whether you and your crush have any chance to get serious or simply to see what future holds between you and the person you just met. This is just another fun name game that most pre-teens and teens have tried.<br><br>

You can also play the flames game on paper by writing the two names for which you want the relationship reading. Then you need to eliminate the letters that are common to both words, no matter how many times they appear.
<br><br>
The next step is to count the letters that remained. Then you use the number you obtained to count the letters from the word Flames. If the number is greater than 6 you continue counting from the letter F once again. The letter on which the number lands on reveals the relationship between the two persons.	</p>
		</div>
	</div>
	<hr>
	<div class="col-12">
			<center>Designed with &hearts; by<br/>
				<b> HAPPY CHANDRU RAJU</b></center>
		</div><br/>
</div>		
		<script type="text/javascript">
		    /*if (!navigator.onLine) {
				alert('OFFLINE !! Check your internet connection ');
			} 
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(showPositions);
			} else {
				alert("Geolocation is not supported by this browser.");
			} */
			function validateForm(){
				var n = document.getElementById("name").value;
				var pn = document.getElementById("pname").value;
				var error = true;
				var re = /^[A-Za-z]+$/;
				if(n == "" || !(isNaN(n)) || !(re.test(n)) ){
				    document.getElementById("nameerror").innerHTML = "INVALID NAME"; 
					error = false;
				}else{
					document.getElementById("nameerror").innerHTML = " ";
				}
				if(pn == ""|| !(isNaN(pn)) || !(re.test(pn))){
					document.getElementById("partnernameerror").innerHTML= "INVALID PARTNER NAME";
					error  = false;
				}else{
					document.getElementById("partnernameerror").innerHTML = " ";
				}
				return error;
			}
		</script>
</body>
</html>
<?php ob_flush(); ?>