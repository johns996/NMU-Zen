(function() {
    function h() {
        var a = navigator.userAgent.toLowerCase();
        return -1 != a.indexOf("msie") ? parseInt(a.split("msie")[1]) : !1
    }
    if (void 0 == jQuery) console.log("Jquery not included!");
    else if (void 0 == Modernizr.video) console.log("Modernizr not included!");
    else {
        var b = jQuery,
            k = h(),
            g = 0,
            e = 0;
        jQuery.fn.extend({
            ensureLoad: function(a) {
                return this.each(function() {
                    this.complete || 4 === this.readyState ? a.call(this) : "uninitialized" === this.readyState && 0 === this.src.indexOf("data:") ? (b(this).trigger("error"), a.call(this)) :
                        (b(this).one("load", a), k && (void 0 != this.src && -1 == this.src.indexOf("?")) && (this.src = this.src + "?" + (new Date).getTime()))
                })
            }
        });
        video_background = function(a, f) {
            this.hidden = !1;
            this.$holder = a;
            this.id = "video_background_video_" + g;
            g++;
            this.parameters = {
                position: "absolute",
                "z-index": "-1",
                video_ratio: !1,
                loop: !0,
                autoplay: !0,
                muted: !1,
                mp4: !1,
                webm: !1,
                ogg: !1,
                flv: !1,
                youtube: !1,
                priority: "html5",
                fallback_image: !1,
                sizing: "fill",
                start: 0
            };
            b.each(f, b.proxy(function(a, b) {
                this.parameters[a] = b
            }, this));
            this.$video_holder = b('<div id="' +
                this.id + '"></div>').appendTo(a).css({
                "z-index": this.parameters["z-index"],
                position: this.parameters.position,
                top: 0,
                left: 0,
                right: 0,
                bottom: 0,
                overflow: "hidden"
            });
            this.ismobile = navigator.userAgent.match(/(iPad)|(iPhone)|(iPod)|(android)|(webOS)/i);
            this.supports_flash = 9 < swfobject.getFlashPlayerVersion().major && (!1 !== this.parameters.mp4 || !1 !== this.parameters.flv);
            this.supports_video = Modernizr.video && (Modernizr.video.h264 && !1 !== this.parameters.mp4 || Modernizr.video.ogg && !1 !== this.parameters.ogg || Modernizr.video.webm &&
                !1 !== this.parameters.webm);
            this.decision = "image";
            this.ismobile || !this.supports_flash && !this.supports_video && !1 === this.parameters.youtube || (this.decision = this.parameters.priority, !1 !== this.parameters.youtube ? this.decision = "youtube" : "flash" == this.parameters.priority && this.supports_flash ? this.decision = "flash" : "html5" == this.parameters.priority && this.supports_video ? this.decision = "html5" : this.supports_flash ? this.decision = "flash" : this.supports_video && (this.decision = "html5"));
            "image" == this.decision ? this.make_image() :
                "youtube" == this.decision ? this.make_youtube() : "html5" == this.decision ? this.make_video() : this.make_flash();
            return this
        };
        video_background.prototype = {
            make_video: function() {
                var a = '<video width="100%" height="100%" ' + ((this.parameters.autoplay ? "autoplay " : "") + (this.parameters.loop ? 'loop onended="this.play()" ' : "")) + ">";
                !1 !== this.parameters.mp4 && (a += '<source src="' + this.parameters.mp4 + '" type="video/mp4"></source>');
                !1 !== this.parameters.webm && (a += '<source src="' + this.parameters.webm + '" type="video/webm"></source>');
                !1 !== this.parameters.ogg && (a += '<source src="' + this.parameters.ogg + '" type="video/ogg"></source>');
                this.$video = b(a + "</video>").css({
                    position: "absolute"
                });
                this.$video_holder.append(this.$video);
                this.video = this.$video.get(0);
                !1 !== this.parameters.video_ratio && (this.resize_timeout = !1, b(window).resize(b.proxy(function() {
                    clearTimeout(this.resize_timeout);
                    this.resize_timeout = setTimeout(b.proxy(this.video_resize, this), 10)
                }, this)), this.video_resize());
                this.parameters.muted && this.mute()
            },
            video_resize: function() {
                var a =
                    this.$video_holder.width(),
                    b = this.$video_holder.height(),
                    c = a,
                    d = a / this.parameters.video_ratio;
                d < b && (d = b, c = b * this.parameters.video_ratio);
                d = Math.ceil(d);
                c = Math.ceil(c);
                b = Math.round(b / 2 - d / 2);
                a = Math.round(a / 2 - c / 2);
                this.$video.attr("width", c);
                this.$video.attr("height", d);
                this.$video.css({
                    top: b + "px",
                    left: a + "px"
                })
            },
            make_youtube: function() {
                var a = b("html");
                this.$video = b('<div id="' + this.id + '_yt"></div>').appendTo(this.$video_holder).css({
                    position: "absolute"
                });
                this.youtube_ready = !1;
                if (0 == e) {
                    var f = document.createElement("script");
                    f.src = "https://www.youtube.com/iframe_api";
                    var c = document.getElementsByTagName("script")[0];
                    c.parentNode.insertBefore(f, c);
                    e = 1;
                    window.onYouTubeIframeAPIReady = b.proxy(function() {
                        a.trigger("yt_loaded");
                        this.build_youtube();
                        e = 2
                    }, this)
                } else 1 == e ? a.bind("yt_loaded", b.proxy(this.build_youtube, this)) : 2 == e && this.build_youtube()
            },
            build_youtube: function() {
                /* NMU - Makes Nav visible again when youtube video stops */
                function onStateChanged(event){
                    if (event.data == YT.PlayerState.PLAYING){
                    	jQuery(".region-main-navigation nav").addClass("nav-transparent")
                    }
                    if (event.data == YT.PlayerState.ENDED || event.data == YT.PlayerState.PAUSED){
                        jQuery(".region-main-navigation nav").removeClass("nav-transparent")
                    }
                }
                var a = {
                    loop: this.parameters.loop ? 1 : 0,
                    start: this.parameters.start,
                    autoplay: this.parameters.autoplay ? 1 : 0,
                    controls: 0,
                    showinfo: 0,
                    wmode: "transparent",
                    iv_load_policy: 3,
                    modestbranding: 1,
                    rel: 0
                };
                this.parameters.loop && (a.playlist = this.parameters.youtube);
                this.player = new YT.Player(this.id + "_yt", {
                    height: "100%",
                    width: "100%",
                    playerVars: a,
                    videoId: this.parameters.youtube,
                    events: {
                        onReady: b.proxy(this.youtube_ready_fun, this),
                        onStateChange: onStateChanged
                    }
                });

            },
            youtube_ready_fun: function(a) {
                this.youtube_ready = !0;
                this.$video = b("#" + this.id + "_yt");
                !1 !== this.parameters.video_ratio && (this.resize_timeout = !1, b(window).resize(b.proxy(function() {
                    clearTimeout(this.resize_timeout);
                    this.resize_timeout = setTimeout(b.proxy(this.video_resize,
                        this), 10)
                }, this)), this.video_resize());
                this.parameters.muted && this.mute()
            },
            /*youtube_add_event_listener: function(a, b) {
            	this.player.addEventListener(a,b)
            },*/
            make_flash: function() {
                var a = {
                    url: !1 != this.parameters.mp4 ? this.parameters.mp4 : this.parameters.flv,
                    loop: this.parameters.loop,
                    autoplay: this.parameters.autoplay,
                    muted: this.parameters.muted
                };
                this.$video_holder.append('<div id="' + this.id + '_flash"></div>');
                swfobject.embedSWF("flash/video.swf", this.id + "_flash", "100%", "100%", "9.0", null, a, {
                        allowfullscreen: !0,
                        allowScriptAccess: "always",
                        wmode: "transparent"
                    }, {
                        name: "background-video-swf"
                    },
                    b.proxy(this.flash_callback, this))
            },
            flash_callback: function(a) {
                this.video = b(a.target).get(0);
                this.parameters.muted && this.mute()
            },
            make_image: function() {
                !1 !== this.parameters.fallback_image && (this.$img = b('<img src="' + this.parameters.fallback_image + '" alt=""/>').appendTo(this.$video_holder).css({
                    position: "absolute"
                }), this.$img.ensureLoad(b.proxy(this.image_loaded, this)))
            },
            image_loaded: function() {
                this.original_width = this.$img.width();
                this.original_height = this.$img.height();
                this.resize_timeout = !1;
                b(window).resize(b.proxy(function() {
                    clearTimeout(this.resize_timeout);
                    this.resize_timeout = setTimeout(b.proxy(this.image_resize, this), 10)
                }, this));
                this.image_resize()
            },
            image_resize: function() {
                var a = this.$video_holder.width(),
                    b = this.$video_holder.height(),
                    c = a,
                    d = this.original_height / (this.original_width / a);
                if ("adjust" == this.parameters.sizing && d > b || "fill" == this.parameters.sizing && d < b) d = b, c = this.original_width / (this.original_height / b);
                d = Math.ceil(d);
                c = Math.ceil(c);
                b = Math.round(b / 2 - d / 2);
                a = Math.round(a / 2 - c / 2);
                this.$img.css({
                    width: c + "px",
                    height: d + "px",
                    top: b + "px",
                    left: a + "px"
                })
            },
            isPlaying: function() {
                return "html5" == this.decision ? !this.video.paused : "flash" == this.decision ? video.isPlaying() : "youtube" == this.decision && this.youtube_ready ? 1 === this.player.getPlayerState() : !1
            },
            play: function() {
                "html5" == this.decision ? this.video.play() : "flash" == this.decision ? this.video.resume() : "youtube" == this.decision && this.youtube_ready && this.player.playVideo()
            },
            pause: function() {
                "html5" == this.decision || "flash" == this.decision ? this.video.pause() : "youtube" == this.decision && this.youtube_ready && this.player.pauseVideo()
            },
            toggle_play: function() {
                this.isPlaying() ? this.pause() : this.play()
            },
            isMuted: function() {
                return "html5" == this.decision ? !this.video.volume : "flash" == this.decision ? video.isMute() : "youtube" == this.decision && this.youtube_ready ? this.player.isMuted() : !1
            },
            isStopped: function() {
            	return "youtube" == this.decision && this.youtube_ready ? this.player.onStateChange() : 1
            },
            mute: function() {
                "html5" == this.decision ? this.video.volume = 0 : "flash" == this.decision ? this.video.mute() : "youtube" == this.decision && this.youtube_ready && this.player.mute()
            },
            unmute: function() {
                "html5" == this.decision ? this.video.volume = 1 : "flash" == this.decision ? this.video.unmute() :
                    "youtube" == this.decision && this.youtube_ready && this.player.unMute()
            },
            toggle_mute: function() {
                this.isMuted() ? this.unmute() : this.mute()
            },
            hide: function() {
                this.pause();
                this.$video_holder.stop().fadeTo(700, 0);
                this.hidden = !0
            },
            show: function() {
                this.play();
                this.$video_holder.stop().fadeTo(700, 1);
                this.hidden = !1
            },
            toogle_hidden: function() {
                this.hidden ? this.show() : this.hide()
            },
            rewind: function() {
                "html5" == this.decision ? this.video.currentTime = 0 : "flash" == this.decision ? this.video.rewind() : "youtube" == this.decision && this.youtube_ready &&
                    this.player.seekTo(0)
            }
        }
    }
})(void 0);
