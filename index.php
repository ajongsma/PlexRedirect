<?php
  require('config.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />`
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body.offline #link-bar {
            display:none;
        }

        body.online  #link-bar{
            display:block;
        }
    </style>
	
	<script>var netdataTheme = 'slate';</script>
	<script>var netdataDontStart = true;</script>
	<script>var netdataNoBootstrap = true;</script>
	<script type="text/javascript" src="/dashboard.js"></script>	
<script>
// destroy charts not shown (lowers memory on the browser)
NETDATA.options.current.destroy_on_hide = false;

// set this to false, to always show all dimensions
NETDATA.options.current.eliminate_zero_dimensions = true;

// always update the charts, even if focus is lost. THIS IS NOT ON BY DEFAULT AND CAN BE RESOURCE INTENSIVE
NETDATA.options.current.stop_updates_when_focus_is_lost = false;

// This will reload the page every 10 mins
var RELOAD_EVERY = 10;
setTimeout(function(){
    location.reload();
}, RELOAD_EVERY * 60 * 1000);
</script>
	
    <script src="assets/js/ping.js"></script>
    <script type='text/javascript'>
        HTMLElement.prototype.hasClass = function (className) {
            if (this.classList) {
                return this.classList.contains(className);
            } else {
                return (-1 < this.className.indexOf(className));
            }
        };

        HTMLElement.prototype.addClass = function (className) {
            if (this.classList) {
                this.classList.add(className);
            } else if (!this.hasClass(className)) {
                var classes = this.className.split(" ");
                classes.push(className);
                this.className = classes.join(" ");
            }
            return this;
        };

        HTMLElement.prototype.removeClass = function (className) {
            if (this.classList) {
                this.classList.remove(className);
            } else {
                var classes = this.className.split(" ");
                classes.splice(classes.indexOf(className), 1);
                this.className = classes.join(" ");
            }
            return this;
        };

        function checkServer() {
            var p = new Ping();
            var server = "YOUR SERVER URL HERE (PLEX.DOMAIN.COM)" //Try to get it automagically, but you can manually specify this
            var timeout = 2000; //Milliseconds
            var body = document.getElementsByTagName("body")[0];
            p.ping(server, function(data) {
                var serverMsg = document.getElementById( "server-status-msg" );
                var serverImg = document.getElementById( "server-status-img" );
                if (data < 1000){
                    serverMsg.innerHTML ='Online';
                    serverImg.src = "assets/img/ipad-hand-on.png";
                    body.addClass('online').removeClass("offline");
					NETDATA.start();
                }else{
                    serverMsg.innerHTML = 'Offline. Try again later.';
                    serverImg.src = "assets/img/ipad-hand-off.png";
                } 
            }, timeout);
        }
    </script>
	
<title><?=ucfirst($SERVER_NAME)?></title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles -->
    <link href="assets/css/main.css" rel="stylesheet">
    <!-- Fonts from Google Fonts -->
	<link href='//fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>
  </head>

  <body bgcolor="#000000" onload="checkServer()" class="offline">
    <div class="container" id="link-bar">
		<div class="row mt centered">
			<div class="col-lg-4">
				<a href="YOUR PLEX GUI" target="_top">
				<img src="assets/img/s01.png" width="180" alt="">
				<h4>Plex</h4>			
				<p>Powered by PMS Pass Branch by Plex Team. Docker by Plex Team</p></a>
			</div><!--/col-lg-4 -->

			<div class="col-lg-4">
				<a href="YOUR REQUESTS GUI" target="_top">
				<img src="assets/img/s02-WORK.png" width="180" alt="">
				<h4>Requests</h4>
				<p>Powered by PlexRequests by lokenx. Docker by LinuxServer.io</p></a>
			</div>

			<div class="col-lg-4">
				<a href="YOUR STATS GUI" target="_top">
				<img src="assets/img/s03.png" width="180" alt="">
				<h4>Stats</h4>
				<p>Powered by PlexPy by JonnyWong16. Docker by LinuxServer.io</p></a>
			</div>
			
						
			<div class="col-lg-4">
			<a href="YOUR URL" target="_top">
				<div data-netdata="system.cpu"
						data-gauge-max-value="100"
						data-host="YOUR NETDATA HOST"
                        data-title="CPU Usage"
                        data-chart-library="gauge"
						data-colors="#f8a918"
						data-units="Percent"
						data-width="180px"
						data-height="180px"
                        data-after="-300"
                        data-points="300"
                        ></div>
			<p>Current Server CPU Usage</p></a>
			</div>
			
			<div class="col-lg-4">
			<a href="YOUR URL" target="_top">
				<div data-netdata="system.ram"
						data-dimensions="used|buffers|active|wired"
						data-append-options="percentage"
						data-gauge-max-value="100"
						data-host="YOUR NETDATA HOST"
                        data-title="RAM Usage"
                        data-chart-library="gauge"
						data-colors="#f8a918"
						data-units="Percent"
						data-width="180px"
						data-height="180px"
                        data-after="-300"
                        data-points="300"
                        ></div>
			<p>Current Server RAM Usage</p></a>
			</div>
			
			<div class="col-lg-4">
			<a href="YOUR URL" target="_top">
				<div data-netdata="netdata.response_time"
						data-host="YOUR NETDATA HOST"
                        data-title="Response Time"
                        data-chart-library="gauge"
						data-colors="#f8a918"
						data-units="Milliseconds"
						data-width="180px"
						data-height="180px"
                        data-after="-300"
                        data-points="300"
                        ></div>
			<p>Current Server Response Time</p></a>
			</div>	
		</div>
	</div>
	<p>

	<div id="headerwrap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<h1><br/>
					<center>Plex Status</h1></center>
					<center><h4 id="server-status-msg"><img src="assets/img/puff.svg">   Checking...</h4></center><br/>
					<br/>

					<form class="form-inline" role="form">
					  <div class="form-group">

					  </div>
				</div>
				<div class="col-lg-6">
					<img id="server-status-img"  class="img-responsive" src="assets/img/ipad-hand.png" style="width:282px" alt="">
				</div>


			</div><!-- /row -->
		</div><!-- /row -->
		</div><!-- /container -->
	
	</div><!-- /headerwrap -->
  </body>
</html>
