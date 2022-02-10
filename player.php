<?php
parse_str($_SERVER['QUERY_STRING'], $query);
$target = array_key_first($query);
$title = ucwords(str_replace('-', ' ', $target));
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="<?php echo $title; ?>"/>
    <meta property="og:type" content="video.other"/>
    <meta property="og:image" content="https://graceland.ca/media/<?php echo $target; ?>/thumb.jpg"/>
    <meta property="og:image:width" content="300"/>
    <meta property="og:image:height" content="300"/>
    <meta property="og:url" content="https://graceland.ca/player?<?php echo $target; ?>"/>
    <title><?php echo $title; ?></title>
    <style>
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
    <script src="/hls-v114.js"></script>
    <script>
      const player = document.getElementById('player');
      if (!player.canPlayType('application/vnd.apple.mpegurl') && Hls.isSupported()) {
        const hls = new Hls();
        hls.loadSource(player.src);
        hls.attachMedia(player);
      }
    </script>
  </body>
</html>
