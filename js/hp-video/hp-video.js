$(document).ready(function($) {
		var Video_back = new video_background($("#fearless-video"), {
				"position": "absolute", //Stick within the div
				"z-index": "-1", //Behind everything
				"loop": true, //Loop when it reaches the end
				"autoplay": true, //Autoplay at start
				"muted": true, //Muted at start

				"mp4": "http://ericjohnpc.nmu.edu/responsivenmu/sites/DrupalResponsiveNMU/files/UserFiles/Silent-Fearless.mp4", //mp4 video link
				"webm": "http://ericjohnpc.nmu.edu/responsivenmu/sites/DrupalResponsiveNMU/files/UserFiles/Silent-Fearless.webm", //Path to video webm format

				//"youtube": "JtpUN4_mXhI",
				//"start": 5,					//Start with 6 seconds offset (to pass the introduction in this case for example)
				"video_ratio": 1.7777778, // width/height -> If none provided sizing of the video is set to adjust

				"fallback_image": "testImage.png", //Fallback image path
		});


		$("#playYoutube").click(function() {
				$("#fearless-video").empty();
				$(".video-overlay").hide();
				$("#togglePlay").show();
				var Video_back = new video_background($("#fearless-video"), {
						"position": "absolute", //Stick within the div
						"z-index": "-1", //Behind everything

						"loop": false, //Not looping
						"autoplay": true, //Autoplay at start
						"muted": false, //Not Muted
						"youtube": "JtpUN4_mXhI",
						//"start": 5,					//Start with 6 seconds offset (to pass the introduction in this case for example)
						"video_ratio": 1.7777778, // width/height -> If none provided sizing of the video is set to adjust

						"fallback_image": "testImage.png", //Fallback image path
				});
				$("#togglePlay").click(function() {
						Video_back.toggle_play();
				});
		});
});