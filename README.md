This repo
contains a simple PHP script
to stream my old DVD-quality home movies
via HLS.

The following ffmpeg command 
prepares three versions for streaming.

- 320x240@600kbps
- 480x320@900kbps
- 720x480@1600kps

Max rate is 1.07x the nominal rate,
and buffer size is 1.5x the nominal rate.

```
SLUG=<slug>
mkdir $SLUG
ffmpeg -hide_banner -y -i $SLUG.mp4 \
  -vf scale=w=360:h=240:force_original_aspect_ratio=decrease -c:v h264 -profile:v main -crf 20 -sc_threshold 0 -g 48 -keyint_min 48 -hls_time 4 -hls_playlist_type vod -b:v 600k -maxrate 635k -bufsize 900k -hls_segment_filename $SLUG/240p_%03d.ts $SLUG/240p.m3u8 \
  -vf scale=w=480:h=320:force_original_aspect_ratio=decrease -c:v h264 -profile:v main -crf 20 -sc_threshold 0 -g 48 -keyint_min 48 -hls_time 4 -hls_playlist_type vod -b:v 900k -maxrate 963k -bufsize 1350k -hls_segment_filename $SLUG/320p_%03d.ts $SLUG/320p.m3u8 \
  -vf scale=w=720:h=480:force_original_aspect_ratio=decrease -c:v h264 -profile:v main -crf 20 -sc_threshold 0 -g 48 -keyint_min 48 -hls_time 4 -hls_playlist_type vod -b:v 1600k -maxrate 1712k -bufsize 2400k -hls_segment_filename $SLUG/480p_%03d.ts $SLUG/480p.m3u8
```

Place the generated files in `/opt/player/media/<slug>`,
add a poster at `/opt/player/media/<slug>/poster.jpeg`,
and navigate to `https://{{ player_hostname }}/player?<slug>`

Nginx config in the
[player-deploy](https://github.com/tessercat/player-deploy)
repo proxies requests to PHP via `php-fpm`.
