<!--
	adct - index.php
	https://github.com/ArtiomL/adct
	Artiom Lichtenstein
	v3.0.5, 13/03/2019
-->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Real Server <?php echo substr(substr(strrchr($_SERVER["SERVER_ADDR"],'.'),1),-1); echo " " . $_SERVER["REQUEST_URI"]; ?></title>
	<meta name="author" content="Artiom Lichtenstein">
	<script language="JavaScript" type="text/javascript">
		function funColExpand(obj, link) {
			var elobj = document.getElementById(obj);
			var elink = document.getElementById(link);
			if ( (!elobj) || (!elink) ) return false;
			if ( elobj.style.display === 'none' ) {
				elobj.style.display = 'block';
				elink.innerHTML = '<b>- Less Raw Data</b>';
			}
			else {
				elobj.style.display = 'none';
				elink.innerHTML = '<b>+ More Raw Data</b>';
			}
		}
	</script>
	<script type="text/javascript" src="/js/custom.js"></script>
	<link href="/css/skeleton.min.css" rel="stylesheet" type="text/css">
	<link href="/css/fonts.css" rel="stylesheet" type="text/css">
	<link href="/css/custom.css" rel="stylesheet" type="text/css">
	<link rel="icon" href="data:,">
</head>
<body>
	<div class="container">
		<div class="docs-section" style="margin-top: 30px">
			<?php if ($node = getenv("NODE")) echo $node . "<br>"; ?>
			hello, <?php if ($user = $_SERVER["PHP_AUTH_USER"]) echo $user; else echo "world"; ?><br>
			ip.src: <?php echo $_SERVER["REMOTE_ADDR"]; ?><br>
			tcp.srcport: <?php echo $_SERVER["REMOTE_PORT"]; ?><br>
			ip.dst: <?php echo $_SERVER["SERVER_ADDR"]; ?><br>
			tcp.dstport: <?php echo $_SERVER["SERVER_PORT"]; ?><br>
		</div>
		<div class="docs-section" style="margin-top: 30px; color:#ff0000;">
			<?php echo $_SERVER["REQUEST_METHOD"] . " "; echo $_SERVER["REQUEST_URI"] . " "; echo $_SERVER["SERVER_PROTOCOL"] . "<br>";
				$arrHeaders = apache_request_headers();
				foreach ($arrHeaders as $header => $value)
					echo "$header: $value <br />\n";
			?>
		</div>
		<div class="docs-section" style="margin-top: 30px; color:#0000ff;">
			<?php echo $_SERVER["SERVER_PROTOCOL"] . " 200 OK<br>";
				echo "Server: " . $_SERVER["SERVER_SOFTWARE"] . "<br>";
				flush();
				$arrHeaders = apache_response_headers();
				foreach ($arrHeaders as $header => $value)
					echo "$header: $value <br />\n";
			?>
			<div style="cursor:hand; cursor:pointer; margin-top: 3%;" onClick="funColExpand('RawData','RawLink');" id="RawLink"><b>+ More Raw Data</b></div>
			<div id="RawData" style="display:none">
				<ol>
					<?php
						foreach($_SERVER as $header => $value)
							echo "<li>$header = $value</li>\n";
					?>
				</ol>
			</div>
		</div>
		<div class="docs-section" style="margin-top: 30px; float:right;">
			Artiom Lichtenstein<br>Solutions Architect<br>Amazon Web Services<br><a href="https://artioml.net/" target="_blank">https://artioml.net</a>
			<p style="margin-top: 10px;">
				<a href="https://github.com/ArtiomL/adct" target="_blank"><img src="https://img.shields.io/maintenance/yes/2019.svg"></a>
				<a href="https://hub.docker.com/r/artioml/adct/" target="_blank"><img src="https://img.shields.io/docker/pulls/artioml/adct.svg?label=docker"></a>
			</p>
		</div>
	</div>
</body>
</html>
