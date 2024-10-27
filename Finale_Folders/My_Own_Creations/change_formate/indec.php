<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Video Format Converter</title>
  <link rel="stylesheet" href="style.css">
  </head>
<body>
  <header>
    <h1>Video Format Converter</h1>
  </header>
  <main>
    <div class="form-container">
      <form method="post" enctype="multipart/form-data">
        <label for="video-file">Choose a video file to convert:</label>
        <input type="file" name="file" id="video-file">
        <button type="submit" name="submit">Convert to 16:9 MP4</button>
      </form>
    </div>
  

  <?php
// Check if the form has been submitted
if (isset($_POST['submit'])) {
  // Check if a file was selected
  if (!empty($_FILES['file']['name'])) {
    // Get the file name and temporary location
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    // Specify the output file format and name
    $output_format = "mp4";
    $output_name = "output_" . rand(100000,999999) . "." . $output_format;

    // Use FFmpeg to convert and resize the video
    $command = "ffmpeg -i \"$file_tmp\" -vf \"scale=-2:720,pad=1280:720:(ow-iw)/2:color=black\" -c:v libx264 -preset medium -crf 23 -c:a aac -b:a 128k -movflags +faststart \"$output_name\" 2>&1";

    // Execute the FFmpeg command
    $output = shell_exec($command);

    // Check if the output file was created
    if (file_exists($output_name)) {
      // Provide a download link for the converted video
      echo "<div class='conversion-complete'>";
      echo "<p>Conversion complete!</p>";
      echo "<a href=\"$output_name\" download class='download-btn'>Download Converted Video</a>";
      echo "</div>";
      echo "<div class='video-container'>";
      echo "<video controls>";
      echo "<source src='$output_name' type='video/mp4'>";
      echo "Your browser does not support the video tag.";
      echo "</video>";
      echo "</div>";
    } else {
      echo "<div class='conversion-complete'>";
      echo "<p>Conversion failed. Please try again.</p>";
      echo "</div>";
    }
  } else {
    echo "<div class='conversion-complete'>";
    echo "<p>Please select a video file to convert.</p>";
    echo "</div>";
  }
}
?>

</main>
  <footer>
    <p>&copy; 2023 Video Format Converter</p>
  </footer>
</body>
</html>
