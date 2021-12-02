<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bagstopia</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
      @import "https://use.fontawesome.com/releases/v5.5.0/css/all.css";

  
body{
  font-family: sans-serif;
  width:100%;
  height:100%;
  background-image:url(bg1.jpg);
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
}

    </style>
</head>
<body topmargin="0">

<table align="center" cellpadding="0" cellspacing="2" width="990">
<tr><td>
<table align="center" cellpadding="0" cellspacing="2">
<tr align="center">
<td><img src="bg.jpg" width="1150" height="175"></td>
</tr>

<tr align="center" bgcolor="#CC6666" class="font12putih"  height="25">
<td><b><marquee class="font10" scrollAmount="4">Welcome to Bagstopia!</marquee></b></td>
</tr>
</table>

<table align="center" width="98%" bgcolor="#FFFFFF" cellpadding="0" cellspacing="5">
<tr bgcolor="#f4f4f4" class="font12bold" height="35">
<td><td><td align="left" bgcolor="#e2e8ef">&nbsp; Bagstopia </td>
</tr>
</table>
<table align="right">
<tr class="font12">
<td>

			
</td>        
<td>
<font class="font12bold">
<p align="center">
<SCRIPT language="JavaScript">  
	var mydate=new Date()
	var year=mydate.getYear()
	if (year < 1000)
	year+=1900
	var day=mydate.getDay()
	var month=mydate.getMonth()
	var daym=mydate.getDate()
	if (daym<10)
	daym="0"+daym
	var dayarray=new Array("Ahad","Isnin","Selasa","Rabu","Khamis","Jumaat","Sabtu")
	var montharray=new Array("Januari","Februari","Mac","April","Mei","Jun","Julai","Ogos","September","Oktober","November","Disember")
	document.write(dayarray[day]+", "+daym+" "+montharray[month]+" "+year)     
</SCRIPT></font>
&nbsp;&nbsp;&nbsp;<span class="font12bold" id="clock">
<SCRIPT LANGUAGE="JavaScript">
	var dayarray=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday")
	var montharray=new Array("January","February","March","April","May","June","July","August","September","October","November","December")
	function getthedate(){
	var mydate=new Date()
	var year=mydate.getYear()
	if (year < 1000)
	year+=1900
	var day=mydate.getDay()
	var month=mydate.getMonth()
	var daym=mydate.getDate()
	if (daym<10)
	daym="0"+daym
	var hours=mydate.getHours()
	var minutes=mydate.getMinutes()
	var seconds=mydate.getSeconds()
	var dn="am"
	if (hours>=12)
	dn="pm"
	if (hours>12){
	hours=hours-12
	}
	{
 	d = new Date();
 	Time24H = new Date();
 	Time24H.setTime(d.getTime() + (d.getTimezoneOffset()*60000) + 3600000);
 	InternetTime = Math.round((Time24H.getHours()*60+Time24H.getMinutes()) / 1.44);
 	if (InternetTime < 10) InternetTime = '00'+InternetTime;
 	else if (InternetTime < 100) InternetTime = '0'+InternetTime;
	}
	if (hours==0)
	hours=12
	if (minutes<=9)
	minutes="0"+minutes
	if (seconds<=9)
	seconds="0"+seconds

	var cdate=hours+":"+minutes+":"+seconds+" "+dn+""
	if (document.all)
	document.all.clock.innerHTML=cdate
	else if (document.getElementById)
	document.getElementById("clock").innerHTML=cdate
	else
	document.write(cdate)
	}
	if (!document.all&&!document.getElementById)
	getthedate()
	function goforit(){
	if (document.all||document.getElementById)
	setInterval("getthedate()",1000)
	}
	window.onload=goforit
</SCRIPT>
</span>
<br><br>
<div class="container">    

    <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3"> 
        <div class="panel panel-default" >
            <div class="panel-heading">
               <div class="panel-title text-center"> Login</div>
            </div>     

            <div class="panel-body" >

                <form class="form-horizontal" id="login-form" action="login.php" method="POST"> 
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input class="form-control" placeholder="Staff ID" name="id" type="text"  autocomplete="off" required/> 
                </div>
                <div class="bg-danger" style="display:none"></div><br />
                
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input class="form-control" placeholder="Password" name="pass" type="password" required/></div><br>
                    
                    <div class="input-group">
                    
                    <select name="role" required>
            <option value="" selected="selected"> Select role </option>
            <option value="admin">Admin</option>
            <option value="supervisor">Supervisor</option>
            <option value="staff">Staff</option>
          </select></div><br>                                                                  
                <div class="bg-danger" style="display:none"></div>                
                <div class="form-group">
                    <!-- Button -->
                    <div class="col-sm-12 controls">                      
                        <button class="btn btn-info pull-right" style="margin-top: 10px;" type="submit" name="btn_login">Login <i class="glyphicon glyphicon-log-in"></i></button>                        
                    </div>
                </div>
                </form>  

            </div>                     
        </div>  
    </div>
</div>



    
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
