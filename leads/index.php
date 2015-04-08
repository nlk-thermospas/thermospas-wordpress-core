<!doctype html>
<html>
	<head>
		<style type="text/css">
			* {
				font-family: Arial, sans-serif
			}
			p {
				font-size: 11px;
				margin-top: 0px;
			}
			li {
				margin-bottom: 6px;
			}
			h2 {
				margin-bottom: 0px;
			}
		</style>
	</head>
	<body>

		<?php

			$pathToLeads = '/var/www/vhosts/thermospas.com/ftp/internet/';

			if(isset($_GET['file'])) {
				$data = file_get_contents ($pathToLeads . $_GET['file']);
				echo "<p><a href='/leads/'>Back to Leads</a></p>";
				echo "<pre>" . $data . "</pre>";
				echo "<p><a href='/leads/'>Back to Leads</a></p>";
			} else {
				$files = array_filter(scandir($pathToLeads), function($item) {
					global $pathToLeads;
					if(strpos($item, '.csv-done') != false && filesize($pathToLeads . $item) > 0) {
						return true;
					} else {
						return false;
					}
				});

				echo "<h2>Leads</h2>";
				echo "<p>Days with no leads are not shown.</p>";

				echo "<ul>";
				foreach ($files as $file) {
					echo "<li><a href='/leads/index.php?file=" . $file . "'>" . substr($file, 5, 10) . "</a></li>";
				}
				echo "</ul>";
			}

		?>

	</body>
</html>