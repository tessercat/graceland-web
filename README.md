# Graceland

This repo contains
files for the
[graceland.ca](https://graceland.ca)
site.

See the
[graceland-deploy](https://github.com/tessercat/graceland-deploy)
repo for more info.

The icon is from
[Martin on the Noun Project](https://thenounproject.com/martin25044/collection/pear-ui-content/).


## Player

A PHP script
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

Place the generated files in `/opt/graceland/media/<slug>`,
add a poster at `/opt/graceland/media/<slug>/poster.jpeg`,
chown the files to `www-data:www-data`
and navigate to `https://graceland.ca/player?<slug>`
