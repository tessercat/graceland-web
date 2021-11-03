<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Now Playing</title>
    <style type="text/css" media="screen">
html {
  font: normal normal normal 1rem/1.6 sans-serif;
  font-size: 1rem;
}
body {
  color: #ced4da;
  background: #1f2022;
  font-size: 1rem;
}
main {
  max-width: 800px;
  margin: 0 auto 0;
}
main section {
  background: black;
  margin-bottom: 1rem;
  padding: 0 1rem 2.5rem;
  border-radius: 10px;
  border-style: solid;
  border-width: thin;
}
main section h1 {
  margin: 0;
  padding-top: 1rem;
  font-size: 1.3rem;
  font-weight: normal;
  text-align: center;
}
main section article {
  text-align: center;
}
main section article figure {
  height: 0;
  overflow: hidden;
  padding-bottom: 50%;
  position: relative;
}
main section article figure img {
  width: 100%;
  height: auto;
}
    </style>
  </head>
  <body>
    <main>
      <section>
        <h1>Now Playing</h1>
<?php
$movies = new Ds\Vector();
if ($handle = opendir('/opt/graceland/media')) {
  while (false !== ($entry = readdir($handle))) {
    if ($entry != "." && $entry != "..") {
      $movie = new Ds\Map();
      $movie->put('title', ucfirst($entry));
      $movie->put("player", "/player?$entry");
      $movie->put('poster', "/media/$entry/poster.jpg");
      $movies->push($movie);
    }
  }
  closedir($handle);
}
foreach ($movies as $movie) {
  echo "<article>\n";
  echo "  <figure>\n";
  echo '    <a href="' . $movie->get('player') . "\">\n";
  echo '      <img src="' . $movie->get('poster') . "\">\n";
  echo "    </a>\n";
  echo "  </figure>\n";
  echo '  <figcaption>' . $movie->get('title') . "</figcaption>\n";
  echo "</article>\n";
}
?>
      </section>
    </main>
  </body>
</html>
