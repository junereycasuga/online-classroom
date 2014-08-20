<?php
class Common {
	public static function showFile($fileName,$content,$mimeType=null,$terminate=true){
		if($mimeType===null){
			if(($mimeType=CFileHelper::getMimeTypeByExtension($fileName))===null){
				$mimeType='text/plain';
			}
		}
		header('Pragma: public');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header("Content-type: $mimeType");
		if(ob_get_length()===false)
				header('Content-Length: '.(function_exists('mb_strlen') ? mb_strlen($content,'8bit') : strlen($content)));
		header("Content-Disposition: inline; filename=\"$fileName\"");
		header('Content-Transfer-Encoding: binary');

		if($terminate){
				Yii::app()->end(0,false);
				echo $content;
				exit(0);
		}else{
			echo $content;
		}
	}
	
	public static function pre($obj,$exit = false){
		echo "<pre>";
		print_r($obj);
		echo "</pre>";
		
		if($exit){
			exit();
		}
	}
	
	public static function accessStatus(){
		return array('0'=>Yii::t("labels","Private"),'1' => Yii::t("labels","Public"));	
	}

	public static function disableYiiLog(){
		foreach (Yii::app()->log->routes as $route){
			if ($route instanceof CWebLogRoute || $route instanceof CFileLogRoute || $route instanceof YiiDebugToolbarRoute)
			{
					$route->enabled = false;
			}
		} 
	}

	public static function getGender(){
		return array('1'=>Yii::t("labels","Male"),'2' => Yii::t("labels","Female"));
	}

	public static function getDays(){
		return array(
			"Monday"	=>	"Monday",
			"Tuesday"	=>	"Tuesday",
			"Wednesday" => 	"Wednesday",
			"Thursday" 	=> 	"Thursday",
			"Friday" 	=> 	"Friday",
			"Saturday" 	=> 	"Saturday",
			"Sunday" 	=> 	"Sunday"
		);
	}

	public static function alertMessage($set,$alertType,$additional=NULL){
		$alerts = new StdClass();
		// alert when updating profile
		if($set == 1){	
			$alerts->msg = "Information successfully updated.";
			if($additional){
				$alerts->msg = $alerts->msg." Please verify your email address by clicking the link sent to your email.";
			}
		}
		// uploading avatar
		else if($set == 2){
			$alerts->msg = "Image successfully uploaded.";
		}
		// error on uploading
		else if($set == 3){
			$alerts->msg = "Image was not uploaded.";
		}
		else if($set == 4){
			$alerts->msg = "The image is too small. Minimum size should be 200x200 pixels. The image is not uploaded.";
		}
		else if($set == 5){
			$alerts->msg = "Activation link sent! Please check your email.";
		}
		else if($set == 6){
			$alerts->msg = "Your account is already verified.";
		}
		else if($set == 7){
			$alerts->msg = "File uploaded.";
		}
		else if($set == 8){
			$alerts->msg = "No file uploaded.";
		}
		else if($set == 9){
			$alerts->msg = "Invalid file format.";
		}
		else if($set == 10){
			$alerts->msg = "Privacy settings updated.";
		}
		else if($set == 11){
			$alerts->msg = "RFID settings updated.";
		}
		else if($set == 12){
			$alerts->msg = "Security password successfully changed.";
		}
		else if($set == 13){
			$alerts->msg = "Security funding password successfully changed.";
		}
		else if($set == 14){
			$alerts->msg = "Security Pin successfully changed.";
		}
		else if($set == 15){
			$alerts->msg = "Transferring of Community Successful";
		}
		else if($set == 16){
			$alerts->msg = "Tagvert action updated.";
		}
		else if($set == 17){
			$alerts->msg = "Privacy settings updated.";	
		}
		else if($set == 18){
			$alerts->msg = "Restriction settings updated.";
		}
		else if($set == 19){
			$alerts->msg = "Member successfully deleted.";
		}
		// removing tagvert in history list
		else if($set == 20){
			$alerts->msg = "Tagvert successfully removed.";
		}
		//  unable to remove tagvert in history list
		else if($set == 21){
			$alerts->msg = "An error occured while removing Tagvert.";
		}
		// accepts community invites
		else if($set == 22){
			$alerts->msg = "Community invitation accepted.";
		}
		// decline community invites
		else if($set == 23){
			$alerts->msg = "Community invitation declined.";
		}
		// accepts user invites
		else if($set == 24){
			$alerts->msg = "User request accepted.";
		}
		// decline user invites
		else if($set == 25){
			$alerts->msg = "User request declined.";
		}
		// cancel user invitation to other user
		else if($set == 26){
			$alerts->msg = "Invitation successfully cancelled.";
		}
		// unblock user
		else if($set == 27){
			$alerts->msg = "User successfully unblocked.";
		}
		// changing role
		else if($set == 28){
			$alerts->msg = "Role successfully changed.";
		}	
		// delete news
		else if($set == 29){
			$alerts->msg = "News successfully deleted.";
		}	
		//  unable to delete news
		else if($set == 30){
			$alerts->msg = "An error occured while deleting news.";
		}
		// approved news
		else if($set == 31){
			$alerts->msg = "News has been approved.";
		}
		// declined news
		else if($set == 32){
			$alerts->msg = "News has been declined.";
		}	
		// error approving news
		else if($set == 33){
			$alerts->msg = "An error occured while approving news.";
		}
		// error declining news
		else if($set == 34){
			$alerts->msg = "An error occured while declining news.";
		}
		// create community
		else if($set == 35){
			$alerts->msg = "Community has been created.";
		}
		// joining community
		else if($set == 36){
			$alerts->msg = "Thank you for joining my community.";
		}
		// create news
		else if($set == 37){
			$alerts->msg = "News saved successfully.";
		}
		// error in creating news
		else if($set == 38){
			$alerts->msg = "An error occured while saving.";
		}
		// updating news
		else if($set == 39){
			$alerts->msg = "News updated successfully.";
		}
		// error in updating news
		else if($set == 40){
			$alerts->msg = "An error occured while updating.";
		}
		// create or saving album
		else if($set == 41){
			$alerts->msg = "Album saved successfully.";
		}
		// format of images
		else if($set == 42){
			$alerts->msg = "Only jpg, png, jpeg or gif files are allowed for file uploads.";
		}
		// error displaying ticket
		else if($set == 43){
			$alerts->msg = "Ticket not found.";
		}
		// posting response to ticket
		else if($set == 44){
			$alerts->msg = "Response posted.";
		}
		// posting a ticket
		else if($set == 45){
			$alerts->msg = "Ticket posted.";
		}
		// send invitation to user from community
		else if($set == 46){
			$alerts->msg = "Invitation successfully sent.";
		}
		// posting review
		else if($set == 47){
			$alerts->msg = "Thank you for posting your review.";
		}
		// posting review
		else if($set == 48){
			$alerts->msg = "Review successfully reported.";
		}
		// error in promo code - input null
		else if($set == 49){
			$alerts->msg = "Enter Promo Code!";
		}
		// error in promo code
		else if($set == 50){
			$alerts->msg = "Invalid Code!";
		}
		// promo code valid
		else if($set == 51){
			$alerts->msg = "Code Valid!";
		}
		// promo send to email
		else if($set == 52){
			$alerts->msg = "Promo Code was sent to your email.";
		}
		//error in sending promo code
		else if($set == 53){
			$alerts->msg = "Error while sending email.";
		}
		//member type updated
		else if($set == 54){
			$alerts->msg = "Member type settings updated.";
		}
		//member type created
		else if($set == 55){
			$alerts->msg = "Member type created.";
		}
		//member type set to default
		else if($set == 56){
			$alerts->msg = "New member type has been set as default.";
		}
		//member type deleted
		else if($set == 57){
			$alerts->msg = "Member type deleted successfully.";
		}
		//member type deleted
		else if($set == 58){
			$alerts->msg = "Offsite action added successfully.";
		}
		//if the user finish to answer the competition tagvert
		else if($set == 59){
			$alerts->msg = "Sucessfully answered all the questions.";
		}
		// delete form layout
		else if($set == 60){
			$alerts->msg = "Layout deleted successfully.";
		}
		// delete form field
		else if($set == 61){
			$alerts->msg = "Field deleted successfully.";
		}
		// subscribe community
		else if($set == 62){
			$alerts->msg = "You will get updates from this community.";
		}
		// unsubscribe community
		else if($set == 63){
			$alerts->msg = "You will no longer receive updates from this community.";
		}
		else if($set == 64){
			$alerts->msg = "Friend request sent.";
		}
		else if($set == 65){
			$alerts->msg = "Request already sent.";
		}
		else if($set == 66){
			$alerts->msg = "Friend already added.";
		}
		else if($set == 67){
			$alerts->msg = "Request email has been sent.";
		}
		else if($set == 68){
			$alerts->msg = "Unable to invite yourself.";
		}
		else if($set == 69){
			$alerts->msg = "Invalid User Id.";
		}
		else if($set == 70){
			$alerts->msg = "Invalid User.";
		}
		else if($set == 71){
			$alerts->msg = "Friend added.";
		}
		else if($set == 72){
			$alerts->msg = "You are blocked.";
		}
		// error accepting user invites contacts
		else if($set == 73){
			$alerts->msg = "Error accepting request.";
		}
		// error declining user invites contacts
		else if($set == 74){
			$alerts->msg = "Error declining request.";
		}
		// error cancelling user invites contacts
		else if($set == 75){
			$alerts->msg = "Error cancelling request.";
		}
		// error unblocking user 
		else if($set == 76){
			$alerts->msg = "Error unblocking user.";
		}
		//rewards successfully
		else if($set == 77){
			$alerts->msg = "Tagvert successfully redeemed.";
		}
		//subdomain updated
		else if($set == 78){
			$alerts->msg = "Subdomain successfully updated.";
		}
		// delete action reward on tagvert
		else if($set == 79){
			$alerts->msg = "Tagvert Action Offsite deleted.";
		}
		// invalid data on updating user profile
		else if($set == 80){
			$alerts->msg = "Some fields are invalid.";
		}
		//stamp successfully added
		else if($set == 81){
			$alerts->msg = "Stamp added.";
		}
		//stamping failed
		else if($set == 82){
			$alerts->msg = "Stamps for today already given.";
		}
		//rsvp accept
		else if($set == 83){
			$alerts->msg = "RSVP accepted.";
		}
		//rsvp decline
		else if($set == 84){
			$alerts->msg = "RSVP declined.";
		}
		//address info passed
		else if($set == 85){
			$alerts->msg = "Address information submitted.";
		}
		//signature submitted
		else if($set == 86){
			$alerts->msg = "Signature submitted.";
		}
		//redeeming a tagvert/reward within a community he/she is a staff of (if he/she is in community view)
		else if($set == 87){
			$alerts->msg = "You cannot redeem your taken tagvert when you are in community view. You can redeem it if your allowed to redeem it as user.";
		}
		// invalid email or password
		else if($set == 88){
			$alerts->msg = "Invalid email or password";
		}
		else if($set == 89){
			$alerts->msg = "Not allowed to login";
		}
		else if($set == 99){
			$alerts->msg = "Tagvert successfully created.";
		}
		else if($set == 100){
			$alerts->msg = "Error on creating a Tagvert.";
		}
		else if($set == 101){
			$alerts->msg = "Tagvert successfully updated.";
		}
		else if($set == 102){
			$alerts->msg = "Error on updating the Tagvert.";
		}
		else if($set == 103){
			$alerts->msg = "Tagvert status changed.";
		}
		else if($set == 104){
			$alerts->msg = "Contact removed and blocked.";
		}
		else if($set == 105){
			$alerts->msg = "Tagvert Discarded.";
		}
		else if($set == 106){
			$alerts->msg = "Error while sending invitation.";
		}
		else if($set == 107){
			$alerts->msg = "Already a member.";
		}
		else if($set == 108){
			$alerts->msg = "Invalid Email address.";
		}
		else if($set == 109){
			$alerts->msg = "Community verification request sent.";
		}else if($set == 110){
			$alerts->msg = "Member type deleted successfully.Some roles of your members has been changed to your default role.";
		}
		else if($set == 111){
			$alerts->msg = "Transfer successful.";
		}
		else if($set == 112){ // approve escrowed transfer
			$alerts->msg = "Wait for release of your transaction.";
		}
		else if($set == 113){
			$alerts->msg = "Problem on approval.";
		}
		else if($set == 114){
			$alerts->msg = "Transaction cancelled.";
		}
		else if($set == 115){
			$alerts->msg = "Transaction already cancelled.";
		}
		else if($set == 116){
			$alerts->msg = "Transaction already approved.";
		}
		else if($set == 117){
			$alerts->msg = "Transaction already released.";
		}
		else if($set == 118){
			$alerts->msg = "Transaction cancelled.";
		}
		else if($set == 119){
			$alerts->msg = "Your payment has been sent.";
		}
		else if($set == 120){
			$alerts->msg = "Rating given.";
		}
		// 1 == "alert alert-success" 
		// 0 == "alert alert-error"
		// 2 == "alert alert-info"
		// 4 == "alert alert-warning"
		if($alertType == 1){
			$alerts->msgClass = "alert alert-success";
		}
		else if($alertType == 0){
			$alerts->msgClass = "alert alert-error";
		}
		else if($alertType == 2){
			$alerts->msgClass = "alert alert-info";
		}
		else if($alertType == 3){
			$alerts->msgClass = "alert alert-warning";
		}

		Yii::app()->user->setFlash('msg',$alerts->msg);
		Yii::app()->user->setFlash('msgClass',$alerts->msgClass);
		Yii::app()->user->setFlash('bool',true);
		return true;
	}
	public static function displayError($message){
		if(is_array($message)){
			$error = "<div class='alert alert-error'><ul>";
			foreach ($message as $value) {
				$error .= "<li>".$value."</li>";
			}
			$error .= "</ul></div>";
			echo $error;
		}else{
			echo "<div class='alert alert-error'><strong>".$message."</strong></div>";
		}
	}
	public static function displayInfo($message){
		if(is_array($message)){
			$error = "<div class='alert alert-info'><ul>";
			foreach ($message as $value) {
				$error .= "<li>".$value."</li>";
			}
			$error .= "</ul></div>";
			echo $error;
		}else{
			echo "<div class='alert alert-info'><strong>".$message."</strong></div>";
		}
	}
	public static function displayWarning($message){
		if(is_array($message)){
			$error = "<div class='alert alert-warning'><ul>";
			foreach ($message as $value) {
				$error .= "<li>".$value."</li>";
			}
			$error .= "</ul></div>";
			echo $error;
		}else{
			echo "<div class='alert alert-warning'><strong>".$message."</strong></div>";
		}
	}
	public static function displaySuccess($message){
		if(is_array($message)){
			$error = "<div class='alert alert-success'><ul>";
			foreach ($message as $value) {
				$error .= "<li>".$value."</li>";
			}
			$error .= "</ul></div>";
			echo $error;
		}else{
			echo "<div class='alert alert-success'><strong>".$message."</strong></div>";
		}
	}

	public static function checkPrivacy($id,$type){
		if($type == 1){
			$user = Users::model()->findByPk($id);
			$private = ($user->access_status == 0)?true:false;
		}else{
			$community = Communities::model()->findByPk($id);
			$private = ($community->community_type == 1)?true:false;
		}

		return $private;
	}

	public static function checkUserPrivacy($id,$type){
		if($type == "email"){
			$user = Users::model()->findByPk($id);
			$private = ($user->user_email_access_status == 0)?true:false;
		}
		else if($type == "contact"){
			$user = Users::model()->findByPk($id);
			$private = ($user->user_contact_access_status == 0)?true:false;
		}
		else if($type == "mutual"){
			$user = Users::model()->findByPk($id);
			$private = ($user->user_mutual_access_status == 0)?true:false;
		}
		else if($type == "fof"){
			$user = Users::model()->findByPk($id);
			$private = ($user->user_fof_access_status == 0)?true:false;
		}
		else if($type == "communityList"){
			$user = Users::model()->findByPk($id);
			$private = ($user->user_communityList_access_status == 0)?true:false;
		}
		

		return $private;
	}

	public static function formatGender($gender){
		$genderType = ($gender == 1)? "Male" : "Female";

		return $genderType;
	}

	public static function formatNationality($nationality,$otherNationality){
		if($nationality == 1){
			return "Filipino";
		}else{
			if($otherNationality == "not given"){
				return "Not Given";
			}else{
				return ucfirst($otherNationality);
			}
		}
	}

	public static function formatMaritalStatus($status){
		if($status == 1){
			return "Single";
		}elseif($status == 2){
			return "Married";
		}elseif($status == 3){
			return "widowed";
		}elseif($status == 4){
			return "Separated";
		}else{
			return "Not Given";
		}
	}
	public static function formatDate($date){
		return date('F d, Y', strtotime($date));
	}
}
?>