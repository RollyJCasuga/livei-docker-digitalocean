<!DOCTYPE html>
<html>
        <head>
                <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
        </head>

<!-- START OF STYLES -->

<style type="text/css">
    #video {
        position: fixed;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        object-fit: fill;
    }
</style>
<!-- END FOF STYLES -->

<body>
    <video id="video" muted autoplay playsinline></video>
</body>

<script type="text/javascript">
    var video = document.getElementById('video');
    var videoId = "stream03";
    if (Hls.isSupported()) {
        var hls = new Hls();
        hls.loadSource('http://165.227.7.5:8080/hls/'+videoId+'/.m3u8');
        hls.attachMedia(video);
        hls.on(Hls.Events.MANIFEST_PARSED, function() {
            video.play();
        });
    }
    else if (video.canPlayType('application/vnd.apple.mpegurl')) {
        video.src = 'http://165.227.7.5:8080/hls/'+videoId+'.m3u8';
        video.addEventListener('loadedmetadata', function() {
            video.play();
        });
    }
</script>