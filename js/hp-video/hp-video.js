jQuery(document).ready(function($) {
                var idleInterval = setInterval(timerIncrement, 60000); //1 minute intervals
                $(this).mousemove(function(e) {
                    idleTime = 0;
                });
                $(this).keypress(function(e) {
                    idleTime = 0;
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

				"mp4": "http://ericjohnpc.nmu.edu/responsivenmu/sites/DrupalResponsiveNMU/files/UserFiles/Silent-Fearless.mp4", //mp4 video link
				"webm": "http://ericjohnpc.nmu.edu/responsivenmu/sites/DrupalResponsiveNMU/files/UserFiles/Silent-Fearless.webm", //Path to video webm format

				"video_ratio": 1.7777778, // width/height -> If none provided sizing of the video is set to adjust

				"fallback_image": "testImage.png", //Fallback image path
		});
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

						"fallback_image": "testImage.png", //Fallback image path
				});
				});
		});
