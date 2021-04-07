<?php include('header.php'); ?>

<?php
$flag = "";
$appno = "";
$email = "";
$filename="";
if( isset($_POST['email']) || isset($_POST['htno']) )
{
  //echo "Test here";
  date_default_timezone_set('Asia/Kolkata');
  define("HOST", "45.79.134.238"); // The host you want to connect to.
  define("USER", "msitprogram"); // The database username.
  define("PASSWORD", "v3NXLXC5YjFPjmH7"); // The database password. 
  define("DATABASE", "msitprog_admissions"); // The database name.
  define("prefix","");
  $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);// If you are connecting via TCP/IP rather than a UNIX socket remember to add the port number as a parameter.
  
  if(isset($_POST['email']) && $_POST['email']!="")
  {
    //echo "Test ";
    $email = $_POST['email'];
    //$appno = $_POST['htno'];
    $qry = "select * from gat_call_letters where email = '$email'";
    if ($result = $mysqli->query($qry)) 
    {
      if($row = $result->fetch_object()) 
      {
        //$appno = $row->appno;
        
        $rank = "Congratulations !! Your GAT Rank is :".$row->rank;
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


<div class="page-header half-half">
   <div class="half-half__image pageheader-loaded" style="background-image:url(./images/pageheader.jpg);"></div>
   <div class="container">
      <div class="row">
         <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
            <div class="page-caption half-half__inner">
               <h1><span class="page-title"> GAT Ranks
                  </span>
               </h1>
               <br>
               <br><br>
            </div>
         </div>
      </div>
   </div>
</div>
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
              <form name="form1" method="post" action="gatRank.php">
              <font color='green'><b>
              Registered Email:&nbsp;&nbsp;&nbsp;
              <input type='email' name='email' id='email' required /><br/><br/>
              <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OR&nbsp;&nbsp;&nbsp;&nbsp;<br/><br/> -->
              <!-- &nbsp;&nbsp;&nbsp;&nbsp;Application No (Optional):&nbsp;&nbsp;&nbsp;
              <input type='text' name='htno' id='htno' /><br><br> -->
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
function validate()
{
  document.getElementById("txtHint").innerHTML="Please Wait...";
  var emailRegex = /^[A-Za-z0-9._]*\@[A-Za-z]*\.[A-Za-z]{2,5}$/;
  email = document.getElementById('email').value;
  htno = document.getElementById('htno').value;
  if (email=="" && htno=="")
  {
    $("#email").focus();
    document.getElementById("txtHint").innerHTML="Please Enter Email / Application Number";
    return false;
  }
  if(email!="" && !emailRegex.test(email))
  {
    $("#email").focus();
    document.getElementById("txtHint").innerHTML="Please Enter a valid Email";
    return false;
  }
}


</script>
<?php include('footer.php'); ?>