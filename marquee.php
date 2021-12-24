<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Now Playing</title>
    <style>
<?php include 'marquee.css'; ?>
    </style>
  </head>
  <body>
    <header>
      <h1>Now Playing</h1>
    </header>
    <main>
<?php
$file = '/opt/graceland/media/marquee.json';
$movies = json_decode(file_get_contents($file));
foreach ($movies as $movie) {
  $title = ucwords(str_replace('-', ' ', $movie->slug));
  echo "<article>\n";
  echo "  <figure>\n";
  echo "    <a href=\"/player?$movie->slug\" title=\"$title\">\n";
  echo "      <img src=\"/media/$movie->slug/poster.jpg\">\n";
  echo "    </a>\n";
  echo "  </figure>\n";
  echo "  <figcaption>$movie->description</figcaption>\n";
  echo "</article>\n";
}
?>
    </main>
    <footer>
      <nav>
        <ul>
          <li><a href="/" title="Graceland">Home</a></li>
        </ul>
      </nav>
    </footer>
  </body>
</html>
