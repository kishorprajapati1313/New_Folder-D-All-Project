<!DOCTYPE html>
<html>
<head>
	<title>Video Upload and Combine</title>
	<style>
		.container {
			margin: auto;
			width: 50%;
			padding: 10px;
			text-align: center;
			background-color: #f2f2f2;
			border-radius: 5px;
		}
		.button {
			background-color: #4CAF50;
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			font-size: 16px;
		}
		.button:hover {
			background-color: #3e8e41;
		}
		.input-field {
			margin: 10px 0;
			padding: 10px;
			border-radius: 5px;
			border: 1px solid #ccc;
			width: 90%;
		}
		h2 {
			font-size: 24px;
			margin-bottom: 10px;
		}
		.video-preview {
			max-width: 100%;
			height: auto;
			margin-bottom: 10px;
		}
		.success-message {
			background-color: #dff0d8;
			color: #3c763d;
			padding: 10px;
			margin-top: 10px;
			border-radius: 5px;
		}
	</style>
</head>
<body>
	<div class="container">
		<h2>Upload and Combine Videos</h2>
		<form method="post" enctype="multipart/form-data">
			<input type="file" name="video1" accept="video/*" class="input-field">
			<input type="file" name="video2" accept="video/*" class="input-field">
			<button type="submit" name="submit" class="button">Upload and Combine Videos</button>
		</form>
		<?php
		if(isset($_POST["submit"])) {
			$video1 = $_FILES["video1"]["tmp_name"];
			$video2 = $_FILES["video2"]["tmp_name"];
			if($video1 && $video2) {
				$video1_name = $_FILES["video1"]["name"];
				$video2_name = $_FILES["video2"]["name"];
				$video1_ext = pathinfo($video1_name, PATHINFO_EXTENSION);
				$video2_ext = pathinfo($video2_name, PATHINFO_EXTENSION);
				if($video1_ext == "mp4" && $video2_ext == "mp4") {
					$combined_name = "combined_" . rand(1000, 9999) . ".mp4";
					$combined_path = "./video/".$combined_name;
					$command = "ffmpeg -i \"".$video1."\" -i \"".$video2."\" -filter_complex \"[0:v]pad=iw*2:ih[int];[int][1:v]overlay=W/2:0[vid]\" -map [vid] -c:v libx264 -crf 23 -preset veryfast ".$combined_path;					exec($command, $output, $status);
					if($status == 0) {
						echo '<div class="success-message">The videos have been uploaded successfully.<br>The videos have been combined successfully.<br>Combined video: <a href="'.$combined_path.'">'.$combined_name.'</a></div>';
					} else {
						echo "Error: Failed to combine videos. Please try again.";
					}
				} else {
                    echo "Error: Please upload only MP4 videos.";
                  }
                } else {
                  echo "Error: Please upload both videos.";
                }
              }
          ?>
          </div>
          <?php
                 
              ?>
            </div>
          </body>
          </html>