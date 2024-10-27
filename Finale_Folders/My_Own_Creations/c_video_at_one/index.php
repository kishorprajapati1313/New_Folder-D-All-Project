<!DOCTYPE html>
<html>
  <head>
    <title>Combine Videos</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header>
      <h1>Combine Videos</h1>
    </header>
    <main>
      <form action="#" method="post" enctype="multipart/form-data">
        <h2>Upload Videos</h2>
        <div class="form-group">
          <label for="video1">Video 1:</label>
          <input type="file" id="video1" name="video1" accept="video/mp4,video/x-m4v,video/*" required>
        </div>
        <div class="form-group">
          <label for="video2">Video 2:</label>
          <input type="file" id="video2" name="video2" accept="video/mp4,video/x-m4v,video/*" required>
        </div>
        <div class="form-group">
          <button type="submit" class="btn">Combine Videos</button>
        </div>
     
    <?php
    // Check for FFmpeg installation
    $ffmpeg_path = "E:/New/ffmpeg-6.0-essentials_build/bin/ffmpeg.exe"; // change to the correct path for your server
    if (!file_exists($ffmpeg_path)) {
      echo "<p>Error: FFmpeg is not installed on the server or the path to the executable is incorrect. Please install FFmpeg or update the path and try again.</p>";
      exit();
    }
    if (isset($_FILES['video1']) && isset($_FILES['video2'])) {
      $target_dir = "./video/"; // directory to store the uploaded videos
      $target_file1 = $target_dir . basename($_FILES['video1']['name']);
      $target_file2 = $target_dir . basename($_FILES['video2']['name']);
      $uploadOk = 1;
      $videoFileType1 = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
      $videoFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
      // Check if file already exists
      if (file_exists($target_file1) || file_exists($target_file2)) {
        echo "<p>Error: One or both files already exist. Please rename and try again.</p>";
        $uploadOk = 0;
      }
      // Allow certain file formats
      if ($videoFileType1 != "mp4" && $videoFileType1 != "m4v" && $videoFileType1 != "mov" && $videoFileType2 != "mp4" && $videoFileType2 != "m4v" && $videoFileType2 != "mov") {
        echo "<p>Error: Only MP4 and MOV files are allowed.</p>";
        $uploadOk = 0;
      }
      if ($uploadOk == 0) {
        echo "<p>Error: One or both files were not uploaded. Please try again.</p>";
      } else {
        // Upload videos
        if (move_uploaded_file($_FILES['video1']['tmp_name'], $target_file1) && move_uploaded_file($_FILES['video2']['tmp_name'], $target_file2)) {
          echo "<p><div class='success-message'>The videos have been uploaded successfully.</p>";
          // Combine the videos using FFmpeg
          $video1 = $target_file1;
          $video2 = $target_file2;
          $output = "output.mp4";
          $cmd = "$ffmpeg_path -i \"$video1\" -i \"$video2\" -filter_complex \"[0:v] [0:a] [1:v] [1:a] concat=n=2:v=1:a=1 [v] [a]\" -map \"[v]\" -map \"[a]\" \"$output\"";
          exec($cmd);
          // Check if the output file was created successfully
          if (file_exists($output)) {
          echo "<p>The videos have been combined successfully.</p>";
          // Display the output video
          echo "<p>Combined video:</p>";
          echo "<video width='320' height='240' controls >";
          echo "<source src='$output' type='video/mp4'>";
          echo "</video></div>";

          // Delete the original videos
          unlink($target_file1);
          unlink($target_file2);
          } else {
          echo "<p>Error: Failed to combine the videos. Please try again.</p>";
          }
          } else {
          echo "<p>Error: Failed to upload one or both videos. Please try again.</p>";
          }
          }
          }
          
          ?>
           </form>
    </main>
          
            </body>
          </html>
          
          
          
          
          
          
