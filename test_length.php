<?
/*////////////////////////////////////////////////////////
// 
// This PHP Script is used for checking the length of text
// obtained via an ODBC Query
// 
////////////////////////////////////////////////////////*/


// Connection Info:
$user = 'Designer';
$pass = '';
$server = '127.0.0.1';
$driver = '4D v15 ODBC Driver 64-bit';

// SQL To test
$sql = 'SELECT Field_2 FROM Table_2;';

// build connection string
$connection_string = 'DRIVER={'.$driver.'};SERVER='.$server.';UID='.$user.';PWD='.$pass;

// connect
$conn = odbc_connect( $connection_string , $user , $pass);
if ($conn) {
	// connected
    echo 'Connection established.' . PHP_EOL;
	
	// execute the sql
	$result = odbc_exec($conn,$sql);
	
	// loop over rows
	while(odbc_fetch_row($result, 1)){
		// for each row
		$test = odbc_result($result,1); // get 1st column of current row
		$lengthOfTest = strlen($test); // get length of column
		echo 'Length found: ' . $lengthOfTest . PHP_EOL; // print length found
	}
	
	// close the connection
	odbc_close($conn);
} else{
    die("Connection could not be established.");
}

// probably not needed
odbc_close_all();

?>
