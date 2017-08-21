<?php
  // https://github.com/oshh94/PlexRedirect/blob/master/index.php
	require('config.php');

	function checkserverport($server, $port) {	
		$fp = @fsockopen($server, $port, $errno, $errstr, 5);
		if ($fp)  {
			//echo "open: $port ";
			$status = TRUE;
			fclose($fp);
		} else {
			//echo "closed: $port ";
			$status = FALSE;
		}
		return $status;
	}
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
		<script type="text/javascript" src="http://<?=$NETDATA_APP_URL?>/dashboard.js"></script>
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
					var server = "$PLEX_SERVER";
					var timeout = 2000; //Milliseconds
					var body = document.getElementsByTagName("body")[0];
					p.ping(server, function(data) {
						var serverMsg = document.getElementById( "server-status-msg" );
						var serverImg = document.getElementById( "server-status-img" );
						if (data < 1000){
							serverMsg.innerHTML ='Online';
							//serverImg.src = "assets/img/ipad-hand-on.png";
							serverImg.src = "assets/img/up.svg";
							body.addClass('online').removeClass("offline");
							NETDATA.start();
						}else{
							serverMsg.innerHTML = 'Offline. Try again later.';
							//serverImg.src = "assets/img/ipad-hand-off.png";
							serverImg.src = "assets/img/down.svg";
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
				<a href="//<?=$PLEX_APP_URL?>" target="_top">
					<img src="assets/img/s01.png" width="180" alt="">
					<h4>Plex</h4>			
					<p>Access the Plex library.</p>
				</a>
			</div><!--/col-lg-4 -->

			<div class="col-lg-4">
				<a href="//<?=$PLEX_REQUESTS_URL?>" target="_top">
					<img src="assets/img/request.svg" width="180" alt="">
					<h4>Requests</h4>
					<p>Want to watch a Movie or TV Show but it's not currently on Plex? Request it here!</p>
				</a>
			</div>

			<div class="col-lg-4">
				<a href="//<?=$PLEXPY_URL?>" target="_top">
					<img src="assets/img/s03.png" width="180" alt="">
					<h4>Stats</h4>
					<p>Powered by PlexPy.</p>
				</a>
			</div>

			
			

	$NETDATA_SERVER: <?=$NETDATA_SERVER?> | $NETDATA_PORT: <?=$NETDATA_PORT?> | $NETDATA_APP_URL: <?=$NETDATA_APP_URL?> | $NETDATA_ENABLED: <?=$NETDATA_ENABLED?>
	<?php if($NETDATA_ENABLED == true) : ?>
		<?php
			//If (checkserverport("pooky.local","19999") === TRUE) {
			If (checkserverport("$NETDATA_SERVER","$NETDATA_PORT") === TRUE) {
				echo "---------- NETDATA - YES ---------- <br>";
			?>	
				<div class="col-lg-4">
					<a href="http://<?=$NETDATA_APP_URL?>" target="_top">
					<div data-netdata="system.cpu"
						data-gauge-max-value="100"
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

<div class="netdata-container" style="margin-right: 10px;" data-netdata="system.cpu"'
	+ ' data-chart-library="gauge"'
	+ ' data-title="CPU"'
	+ ' data-units="%"'
	+ ' data-gauge-max-value="100"'
	+ ' data-width="20%"''
	></div>
			
				<div class="col-lg-4">
					<a href="http://<?=$NETDATA_APP_URL?>" target="_top">
					<div data-netdata="system.io"
						data-gauge-max-value="100"
						data-title="Disk I/O"
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
					<a href="http://<?=$NETDATA_APP_URL?>" target="_top">
					<div data-netdata="system.ram"
						data-dimensions="used|buffers|active|wired"
						data-append-options="percentage"
						data-gauge-max-value="100"
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
					<a href="http://<?=$NETDATA_APP_URL?>" target="_top">
					<div data-netdata="netdata.response_time"
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

				<div class="col-lg-4">
					<a href="http://<?=$NETDATA_APP_URL?>" target="_top">
						<div data-netdata="system.load"
							data-gauge-max-value="100"
							data-title="System Load Average"
							data-chart-library="gauge"
							data-colors="#f8a918"
							data-units="Percent"
							data-width="180px"
							data-height="180px"
							data-after="-300"
							data-points="300"
							></div>
					<p>Current Server System Load Average</p></a>
				</div>

				<div class="col-lg-4">
					<a href="http://<?=$NETDATA_APP_URL?>" target="_top">
						<div data-netdata="netdata.net"
							data-dimensions="in"
							data-common-max="netdata-net-in"
							data-decimal-digits="0"
							data-title="Requests Traffic"
							data-chart-library="easypiechart"
							data-width="180px"
							data-height="180px"
							data-after="-300"
							data-points="300"
						></div>
					<p>Current Server System Netdata In</p></a>
				</div>

				<div class="col-lg-4">
					<a href="http://<?=$NETDATA_APP_URL?>" target="_top">
						<div data-netdata="netdata.net"
							data-dimensions="out"
							data-common-max="netdata-net-out"
							data-decimal-digits="0"
							data-title="Requests Traffic"
							data-chart-library="easypiechart"
							data-width="180px"
							data-height="100%"
							data-after="-300"
							data-points="300"
						></div>
					<p>Current Server System Netdata Out</p></a>
				</div>

				<div class="col-lg-4">
					<a href="http://<?=$NETDATA_APP_URL?>" target="_top">
						<div data-netdata="system.ipv4"
							data-chart-library="sparkline"
							data-width="100%"
							data-height="30px"
							data-after="-300"
							data-dt-element-name="time102"
						></div>
					<p>rendered in <span id="time102">X</span> ms</p></a>
				</div>
			
				<div class="col-lg-4">
					<a href="http://<?=$NETDATA_APP_URL?>" target="_top">
						<div data-netdata="system.ipv4"
							data-chart-library="sparkline"
							data-dimensions="received"'
							data-width="100%"
							data-height="30px"
							data-after="-300"
							data-dt-element-name="time103"
						></div>
					<p>rendered in <span id="time103">X</span> ms</p></a>
					
					<a href="http://<?=$NETDATA_APP_URL?>" target="_top">
						<div data-netdata="system.ipv4"
							data-chart-library="sparkline"
							data-dimensions="sent"'
							data-width="100%"
							data-height="30px"
							data-after="-300"
							data-dt-element-name="time104"
						></div>
					<p>rendered in <span id="time104">X</span> ms</p></a>
				</div>
			


<div class="netdata-container" style="margin-right: 10px;" data-netdata="system.ipv4"'
	+ ' data-dimensions="received"'
	+ ' data-chart-library="easypiechart"'
	+ ' data-title="IPv4 Inbound"'
	+ ' data-width="11%"'
	+ ' data-before="0"'
	+ ' data-after="-' + duration.toString() + '"'
	+ ' data-points="' + duration.toString() + '"'
	+ ' role="application"></div>

<div class="netdata-container" style="margin-right: 10px;" data-netdata="system.ipv4"'
	+ ' data-dimensions="sent"'
	+ ' data-chart-library="easypiechart"'
	+ ' data-title="IPv4 Outbound"'
	+ ' data-width="11%"'
	+ ' data-before="0"'
	+ ' data-after="-' + duration.toString() + '"'
	+ ' data-points="' + duration.toString() + '"'
	+ ' role="application"></div>

<div class="netdata-container" style="margin-right: 10px;" data-netdata="system.ram"'
	+ ' data-dimensions="used|buffers|active|wired"' // active and wired are FreeBSD stats
	+ ' data-append-options="percentage"'
	+ ' data-chart-library="easypiechart"'
	+ ' data-title="Used RAM"'
	+ ' data-units="%"'
	+ ' data-easypiechart-max-value="100"'
	+ ' data-width="9%"'
	+ ' data-after="-' + duration.toString() + '"'
	+ ' data-points="' + duration.toString() + '"'
	+ ' role="application"></div>
</center>
				
				
				
		<?php	
			} else {
				echo "---------- NETDATA - NOO ---------- <br>";
			}
		?>
	<?php else : ?>
		NETDATA_ENABLED-FALSE - 0000000111111112222222
	<?php endif; ?>
			
			
			

		
		</div>
	    
		<div class="row mt centered">
			SERVER_NAME : <?=$SERVER_NAME?> | SERVER_URL : <?=$SERVER_URL?> | PLEX_APP_URL : <?=$PLEX_APP_URL?> | PLEX_SERVER_URL : <?=$PLEX_SERVER_URL?> | PLEX_REQUESTS_URL : <?=$PLEX_REQUESTS_URL?> | SERVER_STATS_URL : <?=$SERVER_STATS_URL?> | SERVER_STATS_DESATURATE : <?=$SERVER_STATS_DESATURATE?> | SLACK_URL : <?=$SLACK_URL?> | SLACK_DESATURATE : <?=$SLACK_DESATURATE?> | PLEXPY_URL : <?=$PLEXPY_URL?> | PLEXPY_API : <?=$PLEXPY_API?><br>
			GOOGLE_CALENDAR_ID : <?=$GOOGLE_CALENDAR_ID?> | GOOGLE_CALENDAR_API_KEY : <?=$GOOGLE_CALENDAR_API_KEY?> | DONATE_URL : <?=$DONATE_URL?> | PAYPAL_BUTTON_ID : <?=$PAYPAL_BUTTON_ID?>
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
