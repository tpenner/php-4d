<?
/*////////////////////////////////////////////////////////
// 
// This PHP Script is used for checking the length of text
// obtained via an ODBC Query
// 
////////////////////////////////////////////////////////*/


// SQL SELECT to test
$select = 'SELECT * FROM Table_2;';


// Connection Info:
$user = 'Designer';
$pass = '';
$server = '127.0.0.1';
$vers4D = 15;

// detect if PHP is running in 32 or 64 bit mode.
empty(strstr(php_uname("m"), '64')) ?  $php64bit = false : $php64bit = true;

// get driver based on version submitted and architecture PHP is running in
switch($vers4D){
	case (15):
		$php64bit ? $driver = '4D v15 ODBC Driver 64-bit' : $driver = '4D v15 ODBC Driver 32-bit';
		break;
	case (14):
		$php64bit ? $driver = '4D v14 ODBC Driver 64 bits' : $driver = '4D v14 ODBC Driver';
		break;
	case (13):
		$php64bit ? $driver = '4D v13 ODBC Driver 64 bits' : $driver = '4D v13 ODBC Driver';
		break;
	default:
		die('Script currently only supports v13 through v15');
}

// build connection string
$connection_string = 'DRIVER={'.$driver.'};SERVER='.$server.';UID='.$user.';PWD='.$pass;

// temporary increase memory limit
ini_set('memory_limit', '2048');

// execute SELECT 
$conn = odbc_connect( $connection_string , $user , $pass);
if ($conn) {
    echo 'Connection established.' . PHP_EOL;
	$result = odbc_exec($conn,$select); // <-- 64 bit PHP crashes here..... ?
	$rows = odbc_num_rows($result);
	$cols = odbc_num_fields($result);
	echo 'Rows found: ' . $rows . PHP_EOL; 
	echo 'Columns found: ' . $cols . PHP_EOL; 
	$rowCur = 0;
	while(odbc_fetch_row($result)){
		$rowCur++;
		echo 'row('.$rowCur.')'."\t";
		for($i = 1; $i <= $cols; $i++){
			$col = odbc_result($result,$i); 
			echo 'col('.$i.').length = ' . strlen($col) . "\t"; 
		}
		echo PHP_EOL;
	}
	odbc_free_result($result);
	odbc_close($conn);
} else{
    die("Connection could not be established.");
}

?>
