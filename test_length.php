<?
/*////////////////////////////////////////////////////////
// 
// This PHP Script is used for checking the length of text
// obtained via an ODBC Query
// 
////////////////////////////////////////////////////////*/


// SQL SELECT to test
$select = 'SELECT Field_2 FROM Table_2;';


// Connection Info:
$user = 'Designer';
$pass = '';
$server = '127.0.0.1';

$vers4D = 12;

$arch4Dx64 = true;


switch($vers4D){
	case (15):
		$arch4Dx64 ? $driver = '4D v15 ODBC Driver 64-bit' : $driver = '4D v15 ODBC Driver 32-bit';
		break;
	case (14):
		$arch4Dx64 ? $driver = '4D v14 ODBC Driver 64 bits' : $driver = '4D v14 ODBC Driver';
		break;
	case (13):
		$arch4Dx64 ? $driver = '4D v13 ODBC Driver 64 bits' : $driver = '4D v13 ODBC Driver';
		break;
	default:
		die('Script currently only supports v13 through v15');
}

// build connection string
$connection_string = 'DRIVER={'.$driver.'};SERVER='.$server.';UID='.$user.';PWD='.$pass;

ini_set('memory_limit', '512M');

// get 
$conn = odbc_connect( $connection_string , $user , $pass);
if ($conn) {
    echo 'Connection established.' . PHP_EOL;
	$result = odbc_exec($conn,$select);
	while(odbc_fetch_row($result, 1)){
		$test = odbc_result($result,1); // get 1st column of current row
		$lengthOfTest = strlen($test); // get length of column
		echo 'Length found: ' . $lengthOfTest . PHP_EOL; // print length found
	}
	odbc_close($conn);
} else{
    die("Connection could not be established.");
}

?>
