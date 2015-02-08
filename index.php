<?php 
require 'db.php';
require 'settings.php';
$error=0;
if(isset($_POST["newHostName"])){
	
	if ($_POST["newHostName"]!='' && strpos($_POST["newHostName"],';') === false){
		
		if(intval(($DB->get("SELECT count(ID) FROM virtualhosts WHERE Name LIKE '".$_POST['newHostName']."';")[0]['count(ID)']))===0){
			
			$newPort=intval($DB->get("select IFNULL((SELECT Port+1 FROM virtualhosts ORDER BY ID DESC LIMIT 1),0) as port;")[0]["port"]);
			
			if($newPort==0){
				$newPort=$defaultPort;
			}
			
			
			/////////////NEW PROJECT FOLDER/////////////////////////////////////
			mkdir($serverRoot.$_POST["newHostName"], 0775);
			mkdir($serverRoot.$_POST["newHostName"].'/public_html', 0775);
			/////////////NEW PROJECT FOLDER/////////////////////////////////////
			
			
			
			/////////////////CREATE PORT////////////////////////////////////////////////////
			shell_exec("echo 'Listen ".$newPort."' >> ".$portConf);
			/////////////////CREATE PORT////////////////////////////////////////////////////
			
			
			/////////////////CREATE HOST////////////////////////////////////////////////////
			shell_exec("echo '<VirtualHost *:".$newPort.">' >> ".$vhostConf);
			shell_exec("echo 'DocumentRoot ".$serverRoot.$_POST['newHostName']."/public_html' >> ".$vhostConf);
			shell_exec("echo '</VirtualHost>' >> ".$vhostConf);
			/////////////////CREATE HOST////////////////////////////////////////////////////
			
			//////////////////ADD index.html///////////////////////////////////////////////////////////
			shell_exec("echo 'woohoo' >> ".$serverRoot.$_POST['newHostName']."/public_html/index.html");
			//////////////////ADD index.html///////////////////////////////////////////////////////////
			
			
			/////////////////ADD TO HOST LIST////////////////////////////////////////////////////
			$DB->set("INSERT INTO virtualhosts VALUES (default,'".$_POST['newHostName']."',".$newPort.");");
			/////////////////ADD TO HOST LIST////////////////////////////////////////////////////
			 
			 
			 
			 
			exec("sudo /etc/apache2/restart.sh");
		}
		else{
			$error=2;
		}
	
	}
	else{
		$error=1;
	}
}
			
?>
<!DOCTYPE html>
<html>
	<head>
		
	</head>
	<body>
		<h1>Virtual host creator</h1>
		<?php 
			if($error==1)	echo '<label>Name not allowed!</label>';
			else if($error==2)	echo '<label>Name in use!</label>';
		?>
		<form method='post'>
			<input type='text' placeholder='New host name' name='newHostName' />
			<input type='submit' value='Add host'/>
		</form>


		<ul>
		<?php


		foreach($DB->get("SELECT * FROM virtualhosts;") as $host)
		{
		?>
			<li>
				<a href='<?php echo $serverUrl.":".$host["Port"]; ?>' target='_blank'>
					<?php echo $host["Name"]; ?>
				</a>
			</li>
		<?php
		}



		?>
		</ul>
	</body>
</html>
