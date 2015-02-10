<?php 
session_start();
if(!isset($_SESSION['username']))
	header('Location:index.php');

?>

<!DOCTYPE html>
<html>
<head>
    <script src="jquery.min.js"></script>
    <script  src="bootstrap.min.js"></script>
    <script src="angular.min.js"></script>
	<script src="controller.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap-combined.min.css"/>
    <style type="text/css">
      .container {
			margin-top: 20px;
			border: 1px black solid
      }
	  tr{
	  cursor:pointer;
	  }
    </style>
	<script>
	
	</script>
</head>
<body>
<h1>Hello <?php echo $_SESSION['username']; ?></h1>

<form name="form" method="POST" action="logout.php">
<button class="btn btn-primary">Logout</button>
</form>





    <div class="container" ng-app ng-controller="EmailController">
		<!-- ----------------------Navbar ---------------------- -->
		<ul class="nav nav-tabs">
			<li ng-class="{active:activeTab=='inbox'}"><a ng-click="activeTab='inbox'" >Inbox</a></li>
			<li ng-class="{active:activeTab=='sent'}"><a ng-click="activeTab='sent'">Sent</a></li>
		</ul>
	
		<!-- ----------------------Inbox ---------------------- -->
		<table  class="table table-bordered table-condensed" ng-show="activeTab == 'inbox'">
			<tbody>
			
				<tr ng-repeat="email in emails" ng-click="showPopup(email)">
					<td>{{email.from}}</td>
					<td>{{email.subject}}</td>
					<td>{{email.date}}</td>
				</tr>
				
			</tbody>
		</table>
		<!-- ---------------------- Sent ---------------------- -->
		<table  class="table table-bordered table-condensed" ng-show="activeTab == 'sent'">
			<tbody>
			
				<tr ng-repeat="email in sentEmails" ng-click="showPopup(email)">
					<td>{{email.to}}</td>
					<td>{{email.subject}}</td>
					<td>{{email.date | date:'MMM d'}}</td>
				</tr>
				
			</tbody>
		</table>
		
		<!-- ---------------------- View Email ---------------------- -->
		<button class="btn btn-primary" ng-click="showComposePopup()">Compose</button>
		
		<div class="modal" ng-show="isPopupVisible">
			<div class="modal-header">
				<button type="button" class="close" ng-click="closePopup()"> X </button>
				<h3>{{selectedEmail.subject}}</h3>
			</div>
			<div class="modal-body">
				<strong>From:</strong> {{selectedEmail.from}} <br />
				<strong>Date:</strong> {{selectedEmail.date}} <br />
				<br />
				<p>
					{{selectedEmail.body}}
				</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" ng-click="forward()">Forward</a>
				<a href="#" class="btn" ng-click="reply()" ng-show="activeTab == 'inbox'">Reply</a>
				<a href="#" class="btn btn-primary" ng-click="closePopup()">Close</a>
			</div>
		</div>
		<!-- ---------------------- Compose ---------------------- -->
		<div class="modal" ng-show="isComposePopupVisible">
			<div class="modal-header">
				<button type="button" class="close" ng-click="closeComposePopup()">X</button>
				<h3>Compose Email</h3>
			</div>
			<form method="POST" action="istoreemail.php">
			<div class="modal-body">
				
					<input name=to type="text" placeholder="To" style="width:95%;" ng-model="composeEmail.to"><br />
					<input name=sub type="text" placeholder="Subject" style="width:95%;" ng-model="composeEmail.subject"><br />
					<input  type="hidden" name="uid" value=<?php echo $_SESSION['uid']; ?>>
					<textarea name=body style="width:95%;" rows="10" ng-model="composeEmail.body"></textarea>
				
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" ng-click="closeComposePopup()">Close</a>
				<input type="submit" class="btn btn-primary" value="Send" >
			</div>
			</form>
		</div>
	</div>

	</body>
</html>