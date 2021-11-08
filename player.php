<!DOCTYPE html>
<?php
parse_str($_SERVER['QUERY_STRING'], $query);
$target = array_key_first($query);
$title = ucwords(str_replace('-', ' ', $target));
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <style type="text/css" media="screen">
      #player {
        background-color: black;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: contain;
      }
    </style>
  </head>
  <body>
    <video id="player"
           preload="none"
           src="/media/<?php echo $target; ?>/playlist.m3u8"
           poster="/media/<?php echo $target; ?>/poster.jpg"
           controls>
    </video>
    <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
    <script>
      let player = document.getElementById('player');
      if (!player.canPlayType('application/vnd.apple.mpegurl') && Hls.isSupported()) {
        let hls = new Hls();
        hls.loadSource(player.src);
        hls.attachMedia(player);
      }
    </script>
  </body>
</html>
