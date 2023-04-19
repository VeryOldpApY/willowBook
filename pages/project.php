<?php
	$html = "";
	$titre = $_GET["titre"];
	$projects_json = json_decode(file_get_contents("project.json"), true);

	$project = $projects_json["projects"][$titre];

	$html .= "
		<div id='fh5co-main'>
			<div class='fh5co-intro text-center'>
				<div class='container'>
					<div class='row'>
						<div class='col-md-8 col-md-offset-2'>
							<h1 class='intro-lead'>".$titre."</h1>
						</div>
					</div>
				</div>
			</div>
	";
	foreach($project["images"] as $image => $desc)
	{
		$image = "../images/".$titre."/".$image;
		$html .= "
			<div class='col-sm-6 col-md-4'>
				<div class='thumbnail'>
					<img src=\"".$image."\" alt=''>
					<div class='caption'>
						<p>
							".$desc."
						</p>
					</div>
				</div>
			</div>
		";
	}
	$html .= "
			</div>
		</div>
	";

	echo $html;
