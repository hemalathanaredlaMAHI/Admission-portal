 <?php
        if ($_FILES["file"]["error"] > 0)
        {
            echo "Error: " . $_FILES["file"]["error"] . "<br>";
        }
        else
        {
				echo "Upload: " . $_FILES["file"]["name"] . "<br>";
				echo "Type: " . $_FILES["file"]["type"] . "<br>";
				echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br>";
				//echo "Stored in: " . $_FILES["file"]["tmp_name"];
				$a=$_FILES["file"]["tmp_name"];
				//echo $a;
			 
				$connect = mysql_connect('45.79.134.238','msitprogram','v3NXLXC5YjFPjmH7');
			if (!$connect) {
			die('Could not connect to MySQL: ' . mysql_error());
			}	
			//your database name
			$cid =mysql_select_db('msitprog_admissions',$connect);
			 
			// path where your CSV file is located
			//define('CSV_PATH','C:/xampp/htdocs/');
			//<!-- C:\xampp\htdocs -->
			// Name of your CSV file
			$csv_file = $a; 
			 
			if (($getfile = fopen($csv_file, "r")) !== FALSE) {
					 $data = fgetcsv($getfile, 1000, ",");
				   while (($data = fgetcsv($getfile, 1000, ",")) !== FALSE) {
					 //$num = count($data);
					   //echo $num;
						//for ($c=0; $c < $num; $c++) {
							$result = $data;
							$str = implode(",", $result);
							$slice = explode(",", $str);
				 
					$col1 = $slice[0];
                    $col2 = $slice[1];
                    $col3 = $slice[2];
        			$col4 = $slice[3];
					$col5 = $slice[4];
					$col6 = $slice[5];
					$col7 = $slice[6];
					$col8 = $slice[7];
					$col9 = $slice[8];
					$col10 = $slice[9];
					$col11 = $slice[10];
					$col12 = $slice[11];
					$col13 = $slice[12];
					$col14 = $slice[13];
					$col15 = $slice[14];
					$col16 = $slice[15];
					$col17 = $slice[16];
					
        $query = "INSERT INTO userScores(CFullName, Hallticket_No, Gender, dob, Test_date, Test_Completed, Testdate_assigned, testslot_assigned, Verbal_Rw, Quantitative_Rw,
		Analytical_Rw, Total_C, Verbal_Per, Quantitative_Per, Analytical_Per, varCenterName, TestType) VALUES('".$col1."','".$col2."','".$col3."','".$col4."','".$col5."','".$col6."','".$col7."',
		'".$col8."','".$col9."','".$col10."','".$col11."','".$col12."','".$col13."','".$col14."','".$col15."','".$col16."','".$col17."')";
        $s=mysql_query($query, $connect );
		echo mysql_error();
				}
			}
			echo "<script>alert('Records successfully uploaded.');window.location.href='ma_dashboard.php';</script>";
			echo "File data successfully imported to database!!";
			mysql_close($connect);
        }
        ?>
