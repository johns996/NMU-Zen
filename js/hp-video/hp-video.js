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


   if (typeof console === "undefined" || typeof console.log === "undefined") {
     console = {};
     console.log = function() {};
   }
		console.log(	'Greetings from the NMU Web Development team.  \n' +
									' If you\'re reading this message odds are you love poking around in code as much as we do. \n' +
									' Feel free to dig into our work and send any feedback to edesign@nmu.edu. \n' +
									' We also built in some keyboard commands for the HTML5 video loop. \n\n' +
									' stop ==> stop the loop || play ==> play the loop \n\n');


		var typedWord = '';
		window.addEventListener('keypress', function(e){
			var c = String.fromCharCode(e.keyCode || e.charCode);  //Some browsers use keyCode (chrome, IE), others use charCode (ff).
			typedWord += c.toLowerCase();
			if(typedWord.length > 4) typedWord = typedWord.slice(1);
			if(typedWord == 'stop') Video_back.pause();
			if(typedWord == 'play') Video_back.play();
		});

    function timerIncrement() {
        idleTime = idleTime + 1
        if (idleTime > 14) {
            Video_back.pause();
        }
    }

    var Video_back = new video_background($("#fearless-video"), {
        "position": "absolute", //Stick within the div
        "z-index": "-1", //Behind everything
        "loop": true, //Loop when it reaches the end
        "autoplay": true, //Autoplay at start
        "muted": true, //Muted at start

        "mp4": "//dfvhnmfzxdnpm.cloudfront.net/fearless-hp-video/August-Fearless.mp4", //mp4 video link
        "webm": "//dfvhnmfzxdnpm.cloudfront.net/fearless-hp-video/August-Fearless.webm", //Path to video webm format
        "priority": "html5",
        "video_ratio": 1.7777778, // width/height -> If none provided sizing of the video is set to adjust

        "fallback_image": "//www.nmu.edu/sites/default/files/UserFiles/hp-video/August-Fearless.png", //Fallback image path
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
