# Graceland

This repo contains
files for the
[graceland.ca](https://graceland.ca)
site.

See the
[graceland-deploy](https://github.com/tessercat/graceland-deploy)
repo for more info.

The favicon is from
[Martin](https://thenounproject.com/martin25044/) and the marquee icon is from
[Ilham Fitrotul Hayat](https://thenounproject.com/fhilham/).


## Player

A PHP script
to stream home movies
via HLS.

Chunk files for HLS
and place the files in `/opt/graceland/media/<slug>`
and add `poster.jpg` (640x426),
`thumb.jpg` (300x300)
and `playlist.m3u8`.
Chown the files to `www-data:www-data`
and navigate to `https://graceland.ca/marquee`
or `https://graceland.ca/player?<slug>`.
