<?php
//ENTER THE RELEVANT INFO BELOW
$mysqlDatabaseName ='db282171973';
$mysqlUserName ='dbo282171973';
$mysqlPassword ='MySQL123!';
$mysqlExportPath ='chooseFilenameForBackup.sql';

//DO NOT EDIT BELOW THIS LINE
$mysqlHostName ='localhost';
//Export the database and output the status to the page
$command='mysqldump -u' .$mysqlUserName .' -S /kunden/tmp/mysql5.sock -p' .$mysqlPassword .' ' .$mysqlDatabaseName .' > ' .$mysqlExportPath;
exec($command,$output=array(),$worked);
switch($worked){
    case 0:
        echo 'Database <b>' .$mysqlDatabaseName .'</b> successfully exported to <b>' .getcwd() .'/' .$mysqlExportPath .'</b>';
        break;
    case 1:
        echo 'There was a warning during the export of <b>' .$mysqlDatabaseName .'</b> to <b>' .getcwd() .'/' .$mysqlExportPath .'</b>';
        break;
    case 2:
        echo 'There was an error during export. Please check your values:<br/><br/><table><tr><td>MySQL Database Name:</td><td><b>' .$mysqlDatabaseName .'</b></td></tr><tr><td>MySQL User Name:</td><td><b>' .$mysqlUserName .'</b></td></tr><tr><td>MySQL Password:</td><td><b>NOTSHOWN</b></td></tr><tr><td>MySQL Host Name:</td><td><b>' .$mysqlHostName .'</b></td></tr></table>';
        break;
}
?>