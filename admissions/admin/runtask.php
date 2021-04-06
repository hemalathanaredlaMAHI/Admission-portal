<?php
date_default_timezone_set('Asia/Kolkata');
$backup_file = "dbkp/msitprog_admissions_" . date("Y-m-d-H-i-s") . '.sql';
$command = "mysqldump --opt -h 45.79.134.238 -u msitprogram -pv3NXLXC5YjFPjmH7  msitprog_admissions > ".$backup_file;
system($command);



?>