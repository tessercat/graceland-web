<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notes to self</title>
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
  padding: 0 1rem 0;
  border-radius: 10px;
  border-style: solid;
  border-width: thin;
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
    <main>
      <section>
<?php
$file = '/opt/graceland/web/notes.md';
require_once 'Michelf/MarkdownExtra.inc.php';
use Michelf\MarkdownExtra;
echo MarkdownExtra::defaultTransform(file_get_contents($file));
?>
      </section>
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
