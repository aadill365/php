<?php
require_once __DIR__.'\\vendor\\autoload.php';
require_once __DIR__.'\\db.php'; 
require_once __DIR__.'\\functions.php'; 


function send_mail($verify,$to,$activationcode){
	$email = new \SendGrid\Mail\Mail(); 
	$email->setFrom("mail2adil365@gmail.com", "XKCD COMIC");
	
	$sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
	try {
		if($verify){

			$email->setSubject("Email Verification");
			$email->addTo($to);
			$email->addContent(
				"text/html", "<p>Click below to verify your email and start receiving XKCD comics.</p>
				<button style='background:black;color:white;border:none;padding: 0.375rem 0.75rem;border-radius: 0.25rem;'>
				<a href='https://aadill-php-xkcd.herokuapp.com/verification.php?code=$activationcode' style='text-decoration: none; color:white;'>verify</a>
				</button>
				"
			);
			$response = $sendgrid->send($email);
	    	return true;

		}
		else{
			$email->setSubject("LATEST COMIC FOR YOU.");
			$image=get_comic();
			$users = get_all_recepients();
			if ($users){
				foreach($users as $user){
					$code = $user['code'];
					$email->addTo($user['email']);
					$email->addContent(
					"text/html", "<h3>$image->title</h3>
					<img src=$image->img alt='image' style='width:300px;'>
					<p>$image->alt</p>
					<p>Please click the unsubscribe button below if you do not want to receive emails.</p>
					<button style='background:#e32636;
					color:white;border:none;padding:0.5rem 1rem;border-radius:.2rem;'><a href='https://aadill-php-xkcd.herokuapp.com/unsubscribe.php?code=$code' style='text-decoration: none; color:white;'>unsubscribe</a></button><br/><br/>
					<span>Thank you.</span>
					"
				);
				$response = $sendgrid->send($email);
	
				}
				echo "comic sent to all subscribers";
			}


		}
	    
	    
	} catch (Exception $e) {
	    return false;
	    
	}

}

