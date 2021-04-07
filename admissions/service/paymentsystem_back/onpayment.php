<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form name="add" method="post" action="https://pgi.billdesk.com/pgidsk/PGIMerchantPayment" >

 	<?php
	
	  $checksomprovidedbybilldesk = 'wY0iv7Ktr7qa'; 
	
	$str ='CIHL|14GAT06441|NA|2.00|NA|NA|NA|INR|NA|R|cihl|NA|NA|F|Kalyan|rcmc@pharmexcil.com|8374271139|01|GAT|14GAT06441|NA|http://msitprogram.org/paymentsystem/payment_response';
	
	 $checksum = hash_hmac('sha256',$str,$checksomprovidedbybilldesk, false);
		$checksum_value = strtoupper($checksum);
		
		
		
		$dataWithCheckSumValue = $str."|".$checksum_value;

		$msg = $dataWithCheckSumValue; ?>
										 
											<input type="hidden" name="msg" value="<?php  echo $msg;?>">
                                            
   
   
  
                                            
  
  <input type="submit" value="Payment" />
  
  <?php  $response= array('msg' => ' AIDCOC|66IPC0002|MCIT3517006368|247839-094095|2.00|CIT|418136|03|INR|DIRECT|NA|NA|NA|13-10-2014 13:45:31|0300|Srinath|srinath@ibongo.com|9014900000|NA|01|NA|NA|NA|NA|Success|62D20190F2FDE23C96B7C2A8D2D62B07AA88321640641AE3CA1A03E11AF3B344
    [hidRequestId] => PGIBL1000');
	
	
	$payment_response = explode("|", $response['msg']); 
	//print_r($payment_response);
	?>
  </form>                                          
                                           
                                    
                                   
</body>
</html>
