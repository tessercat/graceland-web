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
header {
  margin: 1rem 0 1rem;
}
header h1 {
  margin: 0;
  font-size: 1.3rem;
  font-weight: normal;
  text-align: center;
}
main {
  max-width: 800px;
  margin: 0 auto 0;
  padding: 2rem;
  background: black;
  border-radius: 10px;
  border-style: solid;
  border-width: thin;
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
  grid-gap: 2rem;
}
main article {
  text-align: center;
}
main article figure {
  height: 0;
  overflow: hidden;
  padding-bottom: 66%;
  position: relative;
  margin: 0;
}
main article figure img {
  width: 100%;
  height: auto;
  border-radius: 10px;
}
footer {
  margin-top: 3rem;
  margin-bottom: 4rem;
  font-size: smaller;
  text-align: center;
}
footer a {
  color: #ced4da;
  text-decoration: none;
}
footer ul {
  list-style: none;
  padding: inherit;
}
footer li {
  margin-bottom: 1rem;
}
    </style>
  </head>
  <body>
    <header>
      <h1>Now Playing</h1>
    </header>
    <main>
<?php
$movies = new Ds\Vector();
if ($handle = opendir('/opt/graceland/media')) {
  while (false !== ($entry = readdir($handle))) {
    if ($entry != "." && $entry != "..") {
      $movie = new Ds\Map();
      $movie->put('title', ucwords(str_replace('-', ' ', $entry)));
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
