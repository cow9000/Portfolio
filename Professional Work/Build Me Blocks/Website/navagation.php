<?php
session_start();
	
	
	$conn = mysqli_connect("localhost","buildm10_bmb","!billsyall@.c","buildm10_bmb");
	$script = $_SERVER['SCRIPT_NAME'];
	$get = mysqli_query($conn,"SELECT * FROM pages WHERE name='" . substr(dirname($script),1) . "'");
	$info = mysqli_fetch_assoc($get);
	$title = $info["title"];
	$body = base64_decode($info["body"]);
	
	if(date('n') == 1){
		mysqli_query($conn,"UPDATE dailymessage SET message='" . "Believe" . "' WHERE id=1");
	}else if(date('n') == 2){
		mysqli_query($conn,"UPDATE dailymessage SET message='" . "Courageous" . "' WHERE id=1");
	}else if(date('n') == 3){
		mysqli_query($conn,"UPDATE dailymessage SET message='" . "Respectful" . "' WHERE id=1");
	}else if(date('n') == 4){
		mysqli_query($conn,"UPDATE dailymessage SET message='" . "Get Along With Others" . "' WHERE id=1");
	}else if(date('n') == 5){
		mysqli_query($conn,"UPDATE dailymessage SET message='" . "Problem solver" . "' WHERE id=1");
	}else if(date('n') == 6){
		mysqli_query($conn,"UPDATE dailymessage SET message='" . "Humorous" . "' WHERE id=1");
	}else if(date('n') == 7){
		mysqli_query($conn,"UPDATE dailymessage SET message='" . "Helpful" . "' WHERE id=1");
	}else if(date('n') == 8){
		mysqli_query($conn,"UPDATE dailymessage SET message='" . "Hard Working" . "' WHERE id=1");
	}else if(date('n') == 9){
		mysqli_query($conn,"UPDATE dailymessage SET message='" . "Good Communicator" . "' WHERE id=1");
	}else if(date('n') == 10){
		mysqli_query($conn,"UPDATE dailymessage SET message='" . "Optimistic" . "' WHERE id=1");
	}else if(date('n') == 11){
		mysqli_query($conn,"UPDATE dailymessage SET message='" . "Good Listener" . "' WHERE id=1");
	}else if(date('n') == 12){
		mysqli_query($conn,"UPDATE dailymessage SET message='" . "Responsible" . "' WHERE id=1");
	}
	$getTime = mysqli_query($conn, "SELECT * FROM timer WHERE id = 1");
	$last_exec_timestamp = mysqli_fetch_assoc($getTime);
	if (( time() - strtotime($last_exec_timestamp["time"])) > 2592000) {
	   
	   $updateTime = mysqli_query($conn, "UPDATE timer SET time=NOW() WHERE id=1");
		// code modified from source: https://cms.paypal.com/cms_content/US/en_US/files/developer/nvp_MassPay_php.txt
		// documentation: https://cms.paypal.com/us/cgi-bin/?cmd=_render-content&content_ID=developer/howto_api_masspay
		// sample code: https://cms.paypal.com/us/cgi-bin/?cmd=_render-content&content_ID=developer/library_code
		
		// eMail subject to receivers
		$vEmailSubject = 'PayPal payment';
		
		/** MassPay NVP example.
		 *
		 *  Pay one or more recipients. 
		*/
		
		// For testing environment: use 'sandbox' option. Otherwise, use 'live'.
		// Go to www.x.com (PayPal Integration center) for more information.
		$environment = 'live'; // or 'beta-sandbox' or 'live'.
		
		/**
		 * Send HTTP POST Request
		 *
		 * @param string The API method name
		 * @param string The POST Message fields in &name=value pair format
		 * @return array Parsed HTTP Response body
		 */
		function PPHttpPost($methodName_, $nvpStr_)
		{
		 global $environment;
		
		 // Set up your API credentials, PayPal end point, and API version.
		 // How to obtain API credentials:
		 // https://cms.paypal.com/us/cgi-bin/?cmd=_render-content&content_ID=developer/e_howto_api_NVPAPIBasics#id084E30I30RO
		 $API_UserName = urlencode('melissa_api1.buildmeblocks.com');
		 $API_Password = urlencode('LKX3GLHPURCS9HWZ');
		 $API_Signature = urlencode('AAtZE8Mwcl2n-9el9m9gQ2AiXvHPAc1ycfdhGTifkjNxH8pDNknHNaMR');
		 $API_Endpoint = "https://api-3t.paypal.com/nvp";
		 if("sandbox" === $environment || "beta-sandbox" === $environment)
		 {
		  $API_Endpoint = "https://api-3t.$environment.paypal.com/nvp";
		 }
		 $version = urlencode('51.0');
		
		 // Set the curl parameters.
		 $ch = curl_init();
		 curl_setopt($ch, CURLOPT_URL, $API_Endpoint);
		 curl_setopt($ch, CURLOPT_VERBOSE, 1);
		
		 // Turn off the server and peer verification (TrustManager Concept).
		 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		 curl_setopt($ch, CURLOPT_POST, 1);
		
		 // Set the API operation, version, and API signature in the request.
		 $nvpreq = "METHOD=$methodName_&VERSION=$version&PWD=$API_Password&USER=$API_UserName&SIGNATURE=$API_Signature$nvpStr_";
		
		 // Set the request as a POST FIELD for curl.
		 curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);
		
		 // Get response from the server.
		 $httpResponse = curl_exec($ch);
		
		 if( !$httpResponse)
		 {
		  exit("$methodName_ failed: " . curl_error($ch) . '(' . curl_errno($ch) .')');
		 }
		
		 // Extract the response details.
		 $httpResponseAr = explode("&", $httpResponse);
		
		 $httpParsedResponseAr = array();
		 foreach ($httpResponseAr as $i => $value)
		 {
		  $tmpAr = explode("=", $value);
		  if(sizeof($tmpAr) > 1)
		  {
		   $httpParsedResponseAr[$tmpAr[0]] = $tmpAr[1];
		  }
		 }
		
		 if((0 == sizeof($httpParsedResponseAr)) || !array_key_exists('ACK', $httpParsedResponseAr))
		 {
		  exit("Invalid HTTP Response for POST request($nvpreq) to $API_Endpoint.");
		 }
		
		 return $httpParsedResponseAr;
		}
		
		// Set request-specific fields.
		$emailSubject = urlencode($vEmailSubject);
		$receiverType = urlencode('EmailAddress');
		$currency = urlencode('USD'); // or other currency ('GBP', 'EUR', 'JPY', 'CAD', 'AUD')
		
		// Receivers
		// Use '0' for a single receiver. In order to add new ones: (0, 1, 2, 3...)
		// Here you can modify to obtain array data from database.
		$receivers = array();
		  $i = 0;
		  $getPeople = mysqli_query($conn, "SELECT * FROM affiliateProgram WHERE money != 0");
		  while($row = mysqli_fetch_assoc($getPeople)){
			  $receivers[$i] = array(
			    'receiverEmail' => $row["paypalemail"],
			    'amount' => $row["money"],
			    'uniqueID' => "A47-92w", // 13 chars max, available in 'My Account/Overview/Transaction details' when the transaction is made 
			    'note' => " Affiliate program earnings this month."  // space again at beginning.
			  );
			  mysqli_query($conn, "UPDATE affiliateProgram SET money=0 WHERE paypalemail='" . $row["paypalemail"] . "'");
			  $i += 1;
		  }
		$receiversLenght = count($receivers);
		
		// Add request-specific fields to the request string.
		$nvpStr="&EMAILSUBJECT=$emailSubject&RECEIVERTYPE=$receiverType&CURRENCYCODE=$currency";
		
		$receiversArray = array();
		
		for($i = 0; $i < $receiversLenght; $i++)
		{
		 $receiversArray[$i] = $receivers[$i];
		}
		
		foreach($receiversArray as $i => $receiverData)
		{
		 $receiverEmail = urlencode($receiverData['receiverEmail']);
		 $amount = urlencode($receiverData['amount']);
		 $uniqueID = urlencode($receiverData['uniqueID']);
		 $note = urlencode($receiverData['note']);
		 $nvpStr .= "&L_EMAIL$i=$receiverEmail&L_Amt$i=$amount&L_UNIQUEID$i=$uniqueID&L_NOTE$i=$note";
		}
		
		// Execute the API operation; see the PPHttpPost function above.
		$httpParsedResponseAr = PPHttpPost('MassPay', $nvpStr);
		
		if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"]))
		{
		 //exit('MassPay Completed Successfully: ' . print_r($httpParsedResponseAr, true));
		}
		else
		{
		 //exit('MassPay failed: ' . print_r($httpParsedResponseAr, true));
		}
	}
	
	
	$getDailyMessage = mysqli_query($conn, "SELECT * FROM dailymessage WHERE id=1");
	$getDaily2 = mysqli_fetch_assoc($getDailyMessage);
	$dailyMessage = $getDaily2["message"];
	$welcomeUser = "<p style='font-size:18px;'><a style='color:#408C1D !important;' href='../login/'>login</a> / <a style='color:#408C1D !important;' href='../register/'>register</a>/ <a style='color:#408C1D !important;' href='../forum/'>forum</a>/ <a style='color:#408C1D !important;' href='../blog/'>blog</a></p><Br>";
	if(isset($_SESSION["username"])){
		$welcomeUser = "Welcome back <a href='../settings/'>" . $_SESSION["username"] . "</a><br><a href='../logout.php'>Logout here</a>
		
		";
	}
	
	
$navagation = "
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-65508800-1', 'auto');
  ga('send', 'pageview');

</script>
<div class='topnav'>
                <h1><a href='../home'>School</a></h1>
                <div class='float'>
                	 $welcomeUser
			 <p class='dailyMessage'>$dailyMessage</p>
		</div>
</div>
<!--==============================header=================================-->
<header>
<div class='inner'> 
<div class='main'>
<nav> 
<ul class='menu'> 
<li><a href='../home'><i class='fa fa-home' style='left:-25px; top:-25px; position:absolute; font-size:48px;color:white;'></i></a></li>
<li class='item1'><span><a href='../about/'>About</a></span> 
	<ul> 
		<li><a href='../resources/'>resources</a></li> 
		<li><a href='../pricing/'>Playbook</a></li>
		<li><a href='../register/'>Register</a></li> 
		<li><a href='../login/'>Login</a></li>
	</ul> 
</li> 
<li class='item2'><span><a href='../programs'>Special Agent<br>Mission</a></span> 
</li> 


<li class='item3'><span><a href='../reading'>Reading Adventures</a></span>
</li> 
<li class='item4'><span><a href='javascript:;'>Blog</a></span> 	<ul> 
		<li><a href='https://buildmeblocks.wordpress.com/'>Build ME Blocks blog</a></li>
		<li><a href='http://maxandelena.com/'>Max and Elena</a></li> 
	</ul> 
</li> 
<li class='item5'><span><a href='../pricing'>Store</a></span> 
<li class='item6'><span><a href='../contact/'>Contact<br>us</a></span></li> 
	</ul> 
</li> 
</ul> </nav> </div> </div></header>";

?>