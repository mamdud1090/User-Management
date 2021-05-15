<!DOCTYPE html>
<html lang="en">
<head>
<title>Users details</title>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="./css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="./css/style.css">

</head>
<body class="bColor">
<div class="container" id="page">
    <div id="header">
      <div id="logo">
        <a href="#">
          <img src="images/logo_hyd.png" height="70" width="75">
        </a>
        House of Youth Dialogue (HYD)
      </div>
      <div id="tag">Online Conference Management System</div>
      <div class="clear"></div>
    </div>

    <div class="container">
      <div class="content">
        <div class="row">
          <div class="col-sm-12">
            <div class="userDetailsHead">
              <h4 class="userDetailsHeadText">USER DETAILS</h4>
            </div>
            <div id="profileImg">
              <img src="images/profile.jpg" height="130" width="120">
            </div>
            <div>
              <a href="update_profile.html"><button class="btn btn-primary updateBtn">Update Profile</button></a>
            </div>
            <div class="progressBar">
              <p class="progressBarText">90%</p>
            </div>
            <div class="dropdown notificationBtn">
              <a href="#" class="btn-lg dropdown-toggle" data-toggle="dropdown">
                <span class="glyphicon glyphicon-bell"></span>
              </a>
              <span class="badge notification">7</span>
            </div>
            <div id="profileImgTag">Name: <br>Email: <br>Phone: </div>
            <div class="UserTable">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Conferrence</th>
                    <th>Country</th>
                    <th>Committee</th>
                    <th>Payment</th>
                    <th>Award</th>
                    <th>Documents</th>
                    <th>Notice</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td></td>
                    <td>Bangladesh</td>
                    <td>Marvel-DC</td>
                    <td>Paid</td>
                    <td>Yes</td>
                    <td>Download</td>
                    <td>Download pdf</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div>
          <button class="btn btn-danger eventBtn">Delegate Registration for LORD MUN DHAKA-2018</button>
        </div>
        <div>
          <button class="btn btn-warning eventBtn">Delegate Registration for SDG MUN INDIA-2018</button>
        </div>
      </div>
    </div>
    <div id="footer">
      Copyright © 2018 House of Youth Dialogue (HYD). <br>
      All Rights Reserved.
    </div>
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript" src="myScript.js"></script>


</body>
</html>
