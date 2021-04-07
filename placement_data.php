<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript">
   $(document).ready(function() {
      $('#example').DataTable( {
          dom: 'Bfrtip',
          buttons: [
              //'copyHtml5',
             /* 'excelHtml5',
              'csvHtml5',
              'pdfHtml5'*/
          ]
      } );
   } );
</script>
<?php 
   include('db_connect.php');
   
   ?>
<center>
<form name="frmyear" action="Placementhistory.php" method="post">
   Year: 
   <select name="academic_year" id="academic_year" style="width:100px;margin-right:75px;margin-bottom:5px;" onchange="document.frmyear.submit();">
      <option value="0" selected>Select Year</option>
      <?php
         $rs = mysql_query ( "select distinct(student_year) from jntu_msit_placement_history order by student_year desc" );
         while ( ( $data = mysql_fetch_assoc ( $rs ) ) != NULL ) 
         {
         	$y = $data['student_year'];
         	if($_REQUEST['academic_year'])
         		$yy = $_REQUEST['academic_year'];
         /*else
         $yy = date('Y') - 1;*/
         
         if($yy==$y)
         	echo '<option value="'.$y.'" selected>'.$y.'</option>';
         else
         	echo '<option value="'.$y.'">'.$y.'</option>';
         }
         ?>
   </select>
   Institution:
   <select name="institution" id="institution" style="width:100px;margin-right:75px;margin-bottom:5px;" onchange="document.frmyear.submit();">
      <option value="0">All</option>
      <?php
         $rs = mysql_query ( "select distinct(institution) from jntu_msit_placement_history" );
         while ( ( $data = mysql_fetch_assoc ( $rs ) ) != NULL ) {
         	
         		$institution = $data['institution'];
         		if($_REQUEST['institution'])
         			$inst = $_REQUEST['institution'];
         
         		if($institution==$inst)
         			echo '<option value="'.$institution.'" selected>'.$institution.'</option>';
         		else
         			echo '<option value="'.$institution.'">'.$institution.'</option>';
         	?>
      </option>
      <?php
         }
         ?>
   </select>
</form>
</center>
<br/>
<table id="example" class="table table-striped table-bordered" style="width:100%">
   <thead>
      <tr>
         <th>S.No</th>
         <th>R.No</th>
         <th>Student Name</th>
         <th>Year</th>
         <th>Company Name</th>
         <th>Institution</th>
      </tr>
   </thead>
   <tbody>
      <?php
         $academic_year=isset($_REQUEST['academic_year'])?$_REQUEST['academic_year']:"0";
         $institution=isset($_REQUEST['institution'])?$_REQUEST['institution']:"0";
         
         //echo "Institution ".$institution." academic_year ".$academic_year;
         if(($academic_year=="0") && ($institution=="0")){
         	$sql = "select * from jntu_msit_placement_history  where status = 'active' ";	
         }
         elseif (($academic_year!="0") && ($institution=="0")) {
         	$sql = "select * from jntu_msit_placement_history  where student_year = $academic_year and status = 'active' ";
         }
         elseif (($academic_year=="0") && ($institution!="0")) {
         	$sql = "select * from jntu_msit_placement_history  where institution = '$institution' and status = 'active' ";
         }
         elseif (($academic_year!="0") && ($institution!="0")) {
         	$sql = "select * from jntu_msit_placement_history  where student_year = $academic_year and institution = '$institution' and status = 'active' ";
         }
         //echo "SQL ".$sql;
         
         $result = mysql_query ( $sql);;
         
         // if ($result->num_rows > 0) { 
         for($i=1;( $row = mysql_fetch_assoc ( $result ) ) != NULL;$i++){
         ?>
      <tr>
         <td><?php echo $i;?></td>
         <td><?php echo $row['roll_number'];?></td>
         <td><?php echo $row['student_name'];?></td>
         <td><?php echo $row['student_year'];?></td>
         <td><?php echo $row['company_name'];?></td>
         <td><?php echo $row['institution'];?></td>
      </tr>
      <?php 
         }//For closed
         
         ?>
   </tbody>
</table>