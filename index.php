<?php
if( $_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'Commit!' && !empty($_POST['txtName']) && !empty($_POST['txtEmail']) /* && !empty($_POST['txtSpamResult']) && ($_POST['txtSpamResult']==$_POST['txtSumOfNum']) */ ) {
	
	$userMessage = '';
	
	if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
	{
		$secret = 'GOOGLE_CAPTCHA_SECRET';
		$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
		$responseData = json_decode($verifyResponse);
		if($responseData->success)
		{
			$userMessage = 'Your contact request have submitted successfully.';
			
			$toEmail = 'projects@swatantra.info';
			$subject = 'Web Enquiry';
			$message = 'Hello ! '.$_POST['txtName'].' with mail id '.$_POST['txtEmail'].' has visited your website from IP '.$_SERVER['REMOTE_ADDR'].'.';
			$headers = 'From: projects@swatantra.info' . "\r\n" .
				'Reply-To: projects@swatantra.info' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();
			mail($toEmail, $subject, $message, $headers);
			
			$toEmail = $_POST['txtEmail'];
			$subject = 'Web Enquiry';
			$message = 'Hello '.$_POST['txtName'].'! We\'ll get back to you very shortly.';
			$headers = 'From: projects@swatantra.info' . "\r\n" .
				'Reply-To: projects@swatantra.info' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();
			mail($toEmail, $subject, $message, $headers);
		}
		else
		{
			$userMessage = 'Robot verification failed, please try again.';
		}
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Swatantra Solutions</title>
		<meta name="description" content="Swatantra Solutions offers web development,outsourcing website development to India, offshore website development, website development company in India, website development India, outsource web design, web development india, website design company, web site development India, e commerce website development India, PHP Development India, web designing india, offshore web site development services, database driven website development India, e-mail marketing, SMS campaigning, Domain Registration, Web-hosting, SSL Certificates, e-mail hosting, Digital Certificates, Website Builder, Windows Hosting, Linux Hosting" />
		<meta name="keywords" content="Web Development India, Outsourcing Website Development India, website development company in India, website development India, PHP Development India, designing development india site web, Web Site Development India, e commerce website development India, database driven website development India, outsource website development India, complete website development in India, offshore outsourcing development India, ecommerce development India, web based applications development India, development center in India, website development to India, outsource india website development, php framework development India, web site development to India, offshore website development services, development India." />
		<meta name="robots" content="index, follow" />
		<meta name="robots" content="ALL" />
		<meta name="document-classification" content="Web Design Development Company India" />
		<meta name="document-distribution" content="Global" />
		<link rel="icon" href="images/swatantraInc.ico" type="image/x-icon" />
		<link rel="shortcut icon" href="images/swatantraInc.ico" type="image/x-icon" />
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
		
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
		
		<?php require_once 'googleAnalytics.php'; ?>
	</head>
	<body>
		<div class="article">
			<div class="header">
				<h1><a href="https://www.swatantra.info/" title="Swatantra Solutions"><img src="images/swatantra_info.png" alt="Swatantra Solutions" /></a></h1>
				<div class="punchLine">Key to your web solution</div>
			</div>
			
			<div id="content">
				Solution Architecture | Enterprise Architecture | Integration Architecture | AWS | Azure | Cloud Migration | Low Code | Agile | Scrum | DevOps | Digital Transformation | Project Management | Infrastructure Management | ETL | Data | Consulting | Domain Names | Web Hosting | SaaS solution design 
				<br /><br />
				Want to know more about our offerings and services, why not just drop your mail hanldle and we'll get back to you.
				
				<div class="form">
					<?php
					$number1 = rand(1, 5);
					$number2 = rand(6, 9);
					$spamStr = "$number1 + $number2 =";
					$sumOfNum = $number1 + $number2;
					?>
					<form action="" method="POST">
						<div>
							Name: <input type="text" class="formname" name="txtName" value="" size="20" style="width:25%;" />
							Email: <input type="text" class="formname" name="txtEmail" value="" size="20" style="width:25%;" />
							
							<?php 
							/*
							<?php echo $spamStr; ?> <input type="text" class="formname" name="txtSpamResult" value="" size="20" style="width:84px;" />
							<input type="hidden" class="" name="txtSumOfNum" value="<?php echo $sumOfNum; ?>" size="20" />
							*/
							?>
							<input type="submit" class="sendform" name="submit" value="Commit!"/>
						
							<span class="userMessage"><?php if(isset($userMessage) && !empty($userMessage)) { echo $userMessage; } ?></span>
						</div>
						
						<br /><br />
						
						<div class="g-recaptcha" data-sitekey="6LfA_asUAAAAAGyOS0Yf_3Zi0qqWJlHBNSscinti"></div>
						
					</form>
				</div>
			</div>
			
			<div id="footer">
				<!-- <div class="dot_line_5x1"><img height="1" width="1" src="images/spacer.gif" /></div> -->
				<div>
					<span class="footer">Copyright &copy; Swatantra Solutions 2008-<?php echo date('y'); ?></span> |
					<a id="footerLink" href="http://domains.swatantra.info/content.php?action=show_agreements" title="Privacy Policy" target="_blank">Privacy Policy</a> |
					<a id="footerLink" href="contact-us.php" title="Contact Swatantra Solutions">Contact Us</a> |
					<a id="footerLink" href="http://domains.swatantra.info/" title="Book Domain/Digital Certificate/SSL/Web Hosting/Mail Hosting/Web Service/Cloud Computing" target="_blank">Register Domain</a> |
					<a id="footerLink" href="http://resellers.swatantra.info/" title="Be Reseller for Web Services" target="_blank">Become Reseller</a> |
					<a id="footerLink" href="https://blog.swatantra.info/" title="Random Thoughts" target="_blank">Blog</a> |
					<a id="footerLink" href="https://kumar.swatantra.info/" title="Engineering" target="_blank">Think Tank</a> |
					<a id="footerLink" href="http://in.linkedin.com/in/swatantrakumar" target="_blank">
						<img src="http://www.linkedin.com/img/webpromo/btn_profile_greytxt_80x15.png" width="70" height="15" border="0" alt="View Swatantra Kumar's profile on LinkedIn">
					</a>
					<!--
					<a id="footerLink" style="float:right" href="http://twitter.com/SwatantraKumar" target="_blank" title="Follow Swatantra On Twitter">
						<img src="images/swatantra_info_twitter-follow.png" alt="Follow us on Twitter" />
					</a>
					-->
					<!--
					<a id="footerLink" style="float:right" href="https://twitter.com/SwatantraKumar" class="twitter-follow-button" data-show-count="false">Follow @SwatantraKumar</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
					-->
				</div>
				<div style="clear:both;"></div>
			</div>
		</div>
		
		<div class="twitter-widget-box-swatantra">
			<a class="twitter-timeline"  href="https://twitter.com/SwatantraKumar"  data-widget-id="302837475615834112">Tweets by @SwatantraKumar</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			<!--
			<script src="http://widgets.twimg.com/j/2/widget.js"></script>
			<script>
			new TWTR.Widget({
			  version: 2,
			  type: 'profile',
			  rpp: 26,
			  interval: 6000,
			  width: 250,
			  height: 300,
			  theme: {
			    shell: {
			      background: '#466287',
			      color: '#ffffff'
			    },
			    tweets: {
			      background: '#000000',
			      color: '#ffffff',
			      links: '#4aed05'
			    }
			  },
			  features: {
			    scrollbar: true,
			    loop: false,
			    live: false,
			    hashtags: true,
			    timestamp: true,
			    avatars: false,
			    behavior: 'all'
			  }
			}).render().setUser('SwatantraKumar').start();
			</script>
			 -->
		</div>
	</body>
</html>
