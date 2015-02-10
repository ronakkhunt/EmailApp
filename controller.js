function EmailController($scope,$http){
		$scope.emails = [];
		$scope.sentEmails = [];
	$http.get("http://localhost/angular/emailapp/getiemail.php").
		success(function(response) {$scope.emails = response;});
	$http.get("http://localhost/angular/emailapp/getsemail.php").
		success(function(response) {$scope.sentEmails = response;});

		//Tabs 
		$scope.activeTab = 'inbox';
		//sent emails tab
		
				
		//Details variables
		$scope.isPopupVisible = false;
		$scope.showPopup = function (email) {
			$scope.isPopupVisible = true;
			$scope.selectedEmail = email;
		};
		$scope.closePopup = function (email) {
			$scope.isPopupVisible = false;
			
		};
		// Compose variables
		
		$scope.isComposePopupVisible = false;
		
		$scope.composeEmail = {};
		
		$scope.showComposePopup = function (email) {
			$scope.isComposePopupVisible = true;
			
		};
		$scope.closeComposePopup = function (email) {
			$scope.isComposePopupVisible = false;
			
		};/*
		$scope.sendEmail = function() {
		    
			$scope.composeEmail.date = new Date();
			$scope.sentEmails.push($scope.composeEmail);
			$scope.storeEmail();
			
		};
		$scope.storeEmail = function() {
		$scope.isComposePopupVisible = false;
			$scope.xmlhttp;
			if (window.XMLHttpRequest)
			  {// code for IE7+, Firefox, Chrome, Opera, Safari
			  $scope.xmlhttp=new XMLHttpRequest();
			  }
			else
			 {// code for IE6, IE5
			  $scope.xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			 }
			  
			
			  
			var temp="http://localhost/angular/emailapp/istoremail.php?to="+composeEmail.to+"&sub="+composeEmail.subject+"&body="+composeEmail.body+"&uid="+uid;
			//alert(temp);
			$scope.xmlhttp.open("GET",temp,true);
			Sscope.xmlhttp.send();
			
		
		}*/
		//Forward and reply
		$scope.forward = function(){
			$scope.isPopupVisible = false;
			$scope.composeEmail = {};
			// copy the data from selectedEmail into composeEmail
			angular.copy($scope.selectedEmail, $scope.composeEmail);

			// edit the body to prefix it with a line and the original email information
			$scope.composeEmail.body = 
				"\n-------------------------------\n" 
				+ "from: " + $scope.composeEmail.from + "\n"
				+ "sent: " + $scope.composeEmail.date + "\n"
				+ "subject: " + $scope.composeEmail.subject + "\n"
				+ $scope.composeEmail.body;

			// prefix the subject with “RE:”
			$scope.composeEmail.subject = "FW: " + $scope.composeEmail.subject;
			// the email is going to the person who sent it to us 
			// so populate the to with from
			$scope.composeEmail.to = "";
			// it’s coming from us
			$scope.composeEmail.from = "me";
			// show the compose email popup
			$scope.isComposePopupVisible = true;
		}
		
		$scope.reply = function(){
			$scope.isPopupVisible = false;
			$scope.composeEmail = {};
			// copy the data from selectedEmail into composeEmail
			angular.copy($scope.selectedEmail, $scope.composeEmail);

			// edit the body to prefix it with a line and the original email information
			$scope.composeEmail.body = 
				"\n-------------------------------\n" 
				+ "from: " + $scope.composeEmail.from + "\n"
				+ "sent: " + $scope.composeEmail.date + "\n"
				+ "to: " + $scope.composeEmail.to
				+ "subject: " + $scope.composeEmail.subject + "\n"
				+ $scope.composeEmail.body;

			// prefix the subject with “RE:”
			$scope.composeEmail.subject = "RE: " + $scope.composeEmail.subject;
			// the email is going to the person who sent it to us 
			// so populate the to with from
			$scope.composeEmail.to = $scope.composeEmail.from;
			// it’s coming from us
			$scope.composeEmail.from = "me";
			// show the compose email popup
			$scope.isComposePopupVisible = true;
		}
	}