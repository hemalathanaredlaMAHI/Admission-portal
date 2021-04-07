<?php include('header.php'); ?>
<!-- /. header-section-->
<!-- page-header -->
<div class="page-header half-half">
   <div class="half-half__image pageheader-loaded" style="background-image:url(./images/pageheader.jpg);"></div>
   <div class="container">
      <div class="row">
         <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
            <div class="page-caption half-half__inner">
               <h1><span class="page-title"> Download GAT Hallticket
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
            <table border='0' align='center' width='100%'>
               <tr>
                  <td align='center'>
                     <div style="color:red;font-weight:bold;">
                        <?php 
                           if(isset($_GET['error'])) 
                           {
                             echo $_GET['error']; 
                           }
                           /*else if(isset($_GET['status']) && $_GET['status']=='success' && isset($_GET['center']))
                           {
                             echo "<a href='admissions/authentication/halltickets/".$_GET['center']."/".$_GET['appno'].".pdf' target='_blank' id='downloadlink' >DOWNLOAD HALLTICKET</a>";
                           }*/
                           ?>
                     </div>
                  </td>
               </tr>
               <tr>
                  <td align='center'>
                     <br><br>
                     <div id='display'>
                        <form name="form1" method="post" action="get_htno.php" onsubmit="return validate()">
                           <font color='green'><b>
                           Registered Email:&nbsp;&nbsp;&nbsp;
                           <input type='text' name='email' id='email' /><br><br>
                           &nbsp;&nbsp;&nbsp;&nbsp;Application No:&nbsp;&nbsp;&nbsp;
                           <input type='text' name='htno' id='htno' /><br><br>
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
     document.getElementById("txtHint").innerHTML="Downloading...";
     var emailRegex = /^[A-Za-z0-9._]*\@[A-Za-z]*\.[A-Za-z]{2,5}$/;
     email = document.getElementById('email').value;
     htno = document.getElementById('htno').value;
     if (email=="")
     {
       alert("Please Enter Email");
       $("#email").focus();
       document.getElementById("txtHint").innerHTML="Please Enter Email";
       return false;
     }
     if(!emailRegex.test(email))
     {
       $("#email").focus();
       alert("Please Enter a valid email");
       document.getElementById("txtHint").innerHTML="Please Enter a valid Email";
       return false;
     }
     if (htno=="")
     {
       alert("Please Enter Application Number");
       $("#htno").focus();
       document.getElementById("txtHint").innerHTML="Please Enter Application Number";
       return false;
     }
   }
   
   
</script>
<?php include('footer.php'); ?>