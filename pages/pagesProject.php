<?php
	$html = "";
	$projects_json = json_decode(file_get_contents("pages/project.json"), true);
	$right = false;

	foreach($projects_json as $projects)
	{
		foreach($projects as $titre => $project)
		{
			$images = array_keys($project["images"]);
			$image = "images/".$titre."/".$images[0];
			if(!$right)
				$html .= "<div class='fh5co-portfolio-item'>";
			else
				$html .= "<div class='fh5co-portfolio-item fh5co-img-right'>";
			$html .= "
				<div class='fh5co-portfolio-item'>
					<div class='fh5co-portfolio-figure animate-box'><img class='image_size' src='".$image."' alt=''/></div>
					<div class='fh5co-portfolio-description animate-box'>
						<h2>".$titre."</h2>
						<p>".$project["desc"]."</p>
						<p><a href='pages/projectView.php?titre=".$titre."' class='btn btn-primary'>Suite</a></p>
					</div>
				</div>
			</div>
			";
			$right = !$right;
		}
	}
	$html .= "</div>";
	echo $html;