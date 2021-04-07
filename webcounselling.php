<?php include('header.php'); ?>

<?php
$flag = "";
$appno = "";
$password = "";
$filename="";
if(isset($_POST['htno']) )
{
  //echo "Test here";
  date_default_timezone_set('Asia/Kolkata');
  define("HOST", "45.79.134.238"); // The host you want to connect to.
  define("USER", "msitprogram"); // The database username.
  define("PASSWORD", "v3NXLXC5YjFPjmH7"); // The database password. 
  define("DATABASE", "msitprog_admissions"); // The database name.
  define("prefix","");
  $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);// If you are connecting via TCP/IP rather than a UNIX socket remember to add the port number as a parameter.
  
  if(isset($_POST['htno']) && $_POST['htno']!="")
  {
    //echo "Test ";
    $password = $_POST['password'];
    $appno = $_POST['htno'];
    $qry = "select * from web_counselling_login where Username = '$appno'";
    if ($result = $mysqli->query($qry)) 
    {
      if($row = $result->fetch_object()) 
      {
        $no = $row->Username;
        if($appno==$no)
        {
        
        $rk = "Congratualtions!!! Your GAT Rank is :".$row->Username;
        $rank = "Congratualtions!!! Your GAT Rank is :".$row->Password;
       }
       else
       {
        $rank="Sorry! We are not able to recognize you.";
       }
      }
      else
      { 
        $rank="Sorry! We are not able to recognize you.";
      }
    }
  }
  /*else
  {
    $appno = $_POST['htno'];
  }*/
  /*if($flag=="")
  {
    $filename='admissions/authentication/callletters/'.$appno.'.pdf';
    if (file_exists($filename))
    {
      $flag = "FOUND";
    }
    else
    {
      $flag="Sorry! We are not able to recognize you.";
    }*/
  //}
}
?>

<!--
<div class="page-header half-half">
   <div class="half-half__image pageheader-loaded" style="background-image:url(./images/pageheader.jpg);"></div>
   <<div class="container">
      <div class="row">
         <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
            <div class="page-caption half-half__inner">
               <h1><span class="page-title"> Web Counselling
                  </span>
               </h1>
               <br>
               <br><br>
            </div>
         </div>
      </div>
   </div>
</div>-->
<!-- /.page-header-->
<!-- blog-single  -->
<div class="content">
   <div class="container">
      <div class="row ">
         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <center><font color='blue'><h1><b><?php echo $rank; ?></b></h1></font></center>
            <table border='0' align='center' width='100%'>
              <tr>
              <td align='center'>
               
              </td>
              </tr>
              <tr>
              <td align='center'>
              <br><br>
              <div id='display'>
              <!-- <form name="form1" method="post" action="gatRank.php" onsubmit="return validate()"> -->
              <form name="form1" method="post" action="personal_details.php">
              <font color='green'><b>
             
            
               &nbsp;&nbsp;&nbsp;&nbsp;Application No:&nbsp;&nbsp;&nbsp;
              <input type='text' name='htno' id='htno' /><br><br> 
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              Password:&nbsp;&nbsp;&nbsp;
              <input type='password' name='password' id='password' required /><br/><br/>
              <input value='SUBMIT'  name='get' type='submit' STYLE='font-family:Arial; font-size:12px; font-weight:bold; background:green none; color:#FFFFFF; width:80px; height:25px; border: outset 1px black;'>      

              </b></font>
              </form>

              </div>
              </td>

              </tr>
            </table>

            
         </div>
      </div>
   </div>
</div>
</div>
</div>
<script type="text/javascript">
document.getElementById("txtHint").innerHTML="";
/*function validate()
{
  document.getElementById("txtHint").innerHTML="Please Wait...";
  //var passwordRegex = /^[A-Za-z0-9._]*\@[A-Za-z]*\.[A-Za-z]{2,5}$/;
  password = document.getElementById('password').value;
  htno = document.getElementById('htno').value;
  if (password=="" && htno=="")
  {
    $("#password").focus();
    document.getElementById("txtHint").innerHTML="Please Enter password / Application Number";
    return false;
  }/*
  if(password!="" && !passwordRegex.test(password))
  {
    $("#password").focus();
    document.getElementById("txtHint").innerHTML="Please Enter a valid password";
    return false;
  }
}*/


</script>
<?php include('footer.php'); ?>