<?

// Connection Info:
$user = 'Designer';
$pass = '';
$server = '127.0.0.1';
$driver = '4D v15 ODBC Driver 64-bit';

// SQL To test
$sql = "INSERT INTO Table_1 (Field_2) VALUES('PHP')";

// build connection string
$connection_string = 'DRIVER={'.$driver.'};SERVER='.$server.';UID='.$user.';PWD='.$pass;

// try to connect
$conn = odbc_connect( $connection_string , $user , $password);
if ($conn) {
	
	// connected
    echo 'Connection established.' . PHP_EOL;
	
	// prepare the statement
	$stmt = odbc_prepare($conn,$sql);
	
	// execute the statement
	$result = odbc_execute($stmt);

	// close the connection
	odbc_close($conn);
	
} else{
	
	// could not connect
    die("Connection could not be established.");
	
}

// probably not needed
odbc_close_all();

?>
