# Connecting to 4D Server from PHP via ODBC

This repository is a collection of PHP scripts (code snippets) to help get connected to 4D Server from PHP. It may be broken, it may not work, it may not help (hopefully it helps though).

### Requirements

On the 4D side you need:
* 4D Server
 * 4D's SQL Server must be started and accessible to the client (default port 19812)

On the ODBC client side you need:
* 4D ODBC Driver installed
 * the version of the ODBC driver must match the version of the 4D Server
    * if the server is using v15.2 then use the v15.2 ODBC drive
 * the architecture of the ODBC driver must match the architecture of the ODBC client (PHP in this situation)
   * if you are using PHP 32 bit then use the 32 bit driver.
    * if you are using PHP 64 bit then use the 64 bit driver.

Note that ODBC connections will consume a 4D Client license in the absence of an Unlimited SQL license.
