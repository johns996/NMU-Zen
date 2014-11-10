jQuery(document).ready(function($) {
    ismobile = navigator.userAgent.match(/(iPad)|(iPhone)|(iPod)|(android)|(webOS)/i);
    var ua = navigator.userAgent.toLowerCase();
    var isAndroid = ua.indexOf("android") > -1;
    var idleTime = 0;
    var idleInterval = setInterval(timerIncrement, 60000); //1 minute intervals
    $(this).mousemove(function(e) {
        idleTime = 0;
    });
    $(this).keypress(function(e) {
        idleTime = 0;
    });

    function androidVideoHandler() {
        var ua = navigator.userAgent.toLowerCase();
        if (ua.indexOf("android") > -1) {
            $("#playYoutube").click(function() {
                console.log("Your playYoutube click was detected!")
                window.open("https://www.youtube.com/watch?v=JtpUN4_mXhI");
            });
        }
    }

    function timerIncrement() {
        idleTime = idleTime + 1
        if (idleTime > 14) {
            Video_back.pause();
        }
    }
    enquire.register("screen and (max-width:768px)", {
        match: function() {
            androidVideoHandler();
        }
    });
    var Video_back = new video_background($("#fearless-video"), {
        "position": "absolute", //Stick within the div
        "z-index": "-1", //Behind everything
        "loop": true, //Loop when it reaches the end
        "autoplay": true, //Autoplay at start
        "muted": true, //Muted at start

        "mp4": "/responsivenmu/sites/DrupalResponsiveNMU/files/UserFiles/hp-video/Silent-Fearless.mp4", //mp4 video link (splash-video.mp4 to see unl's video)
        "webm": "/responsivenmu/sites/DrupalResponsiveNMU/files/UserFiles/hp-video/Silent-Fearless.webm", //Path to video webm format
        "priority": "html5",
        "video_ratio": 1.7777778, // width/height -> If none provided sizing of the video is set to adjust

        "fallback_image": "/responsivenmu/sites/DrupalResponsiveNMU/files/UserFiles/hp-video/Silent-Fearless.png", //Fallback image path
    });
    if (!isAndroid) {
        $("#playYoutube").click(function() {
            $("#fearless-video").empty();
            $(".video-overlay").hide();
            var Video_back = new video_background($("#fearless-video"), {
                "position": "absolute", //Stick within the div
                "z-index": "-1", //Behind everything

                "loop": false, //Not looping
                "autoplay": true, //Autoplay at start
                "muted": false, //Not Muted

                "youtube": "JtpUN4_mXhI",
                "start": 0, //Start with X seconds offset
                "video_ratio": 1.7777778, // width/height -> If none provided sizing of the video is set to adjust
            });
        });
    }
});
