<?php
	$host1 = '127.0.0.1';
	$host2 = '127.0.0.1';

	$database1 = 'intranet_voting_system';
	$database2 = 'intranet_voting_system';

	$unDB1 = 'root';
	$unDB2 = 'root';

	$pwDB1 = '';
	$pwDB2 = '';
	
	if(isset($connection1)){
		try
		{
			@$dbc1 = new PDO("mysql:host=$host1;dbname=$database1","$unDB1","$pwDB1");
			@$dbc1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e)
		{
			echo "Connection Failed" . $e->getMessage();
			header("Location: ?error=true");
		}

		// Close PDO connection
		$pdo = null;
	}else if(isset($connection2)){
		try
		{
			@$dbc2 = new PDO("mysql:host=$host2;dbname=$database2","$unDB2","$pwDB2");
			@$dbc2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e)
		{
			echo "Connection Failed" . $e->getMessage();
			header("Location: ?error=true");
		}

		// Close PDO connection
		$pdo = null;
	}
	
?>