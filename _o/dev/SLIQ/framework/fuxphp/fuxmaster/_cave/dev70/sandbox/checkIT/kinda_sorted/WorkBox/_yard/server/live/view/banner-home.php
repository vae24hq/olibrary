    <!-- Caption Style -->
    <style> 
	   .captionOrange, .captionBlack
        {
            color: #fff;
			text-shadow:1px 1px 0 #000;
            font-size: 1em;
            line-height: 30px;
            text-align: left;
        }
        .captionOrange
        {
            background: #EB5100;
            background-color: rgba(235, 81, 0, 0.4);
        }
		.captionBlack
        {
            color: #fff;
            font-size: 1.2em;
            line-height: 30px;
            text-align: center;
        }
        .captionBlack
        {
        	font-size:16px;
            background: #000;
            background-color: rgba(0, 0, 0, 0.4);
        }

    .style1 {
	color: #FF0000;
	font-weight: bold;
}
    </style>
    <script type="text/javascript" src="script/js/jquery.js"></script>
    <!-- use jssor.slider.mini.js (39KB) or jssor.sliderc.mini.js (31KB, with caption, no slideshow) or jssor.sliders.mini.js (26KB, no caption, no slideshow) instead for release -->
    <!-- jssor.slider.mini.js = jssor.sliderc.mini.js = jssor.sliders.mini.js = (jssor.core.js + jssor.utils.js + jssor.slider.js) -->
    <script type="text/javascript" src="script/js/jssor.core.js"></script>
    <script type="text/javascript" src="script/js/jssor.utils.js"></script>
    <script type="text/javascript" src="script/js/jssor.slider.js"></script>
    <script>

        jQuery(document).ready(function ($) {
            var _SlideshowTransitions = [{$Duration:4000,$Opacity:2,$Brother:{$Duration:200,$Opacity:2}}];
            var _CaptionTransitions = [];
            _CaptionTransitions["FADE"] = { $Duration: 900, $Opacity: 2 };
            var options = {
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                $AutoPlayInterval: 2000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                                   //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, default value is 1

                $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideEasing: $JssorEasing$.$EaseOutQuint,          //[Optional] Specifies easing for right to left animation, default value is $JssorEasing$.$EaseOutQuad
                $SlideDuration: 1200,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
                $DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

                $SlideshowOptions: {                                //[Optional] Options to specify and enable slideshow or not
                    $Class: $JssorSlideshowRunner$,                 //[Required] Class to create instance of slideshow
                    $Transitions: _SlideshowTransitions,            //[Required] An array of slideshow transitions to play slideshow
                    $TransitionsOrder: 1,                           //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
                    $ShowLink: true                                    //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
                },

                $CaptionSliderOptions: {                            //[Optional] Options which specifies how to animate caption
                    $Class: $JssorCaptionSlider$,                   //[Required] Class to create instance to animate caption
                    $CaptionTransitions: _CaptionTransitions,       //[Required] An array of caption transitions to play caption, see caption transition section at jssor slideshow transition builder
                    $PlayInMode: 1,                                 //[Optional] 0 None (no play), 1 Chain (goes after main slide), 3 Chain Flatten (goes after main slide and flatten all caption animations), default value is 1
                    $PlayOutMode: 3                                 //[Optional] 0 None (no play), 1 Chain (goes before main slide), 3 Chain Flatten (goes before main slide and flatten all caption animations), default value is 1
                },

                $ArrowNavigatorOptions: {                       //[Optional] Options to specify and enable arrow navigator or not
                    $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 1,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 2,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
                },

                $BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
                    $Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 1,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                    $Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                    $SpacingX: 4,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
                    $SpacingY: 4,                                   //[Optional] Vertical space between each item in pixel, default value is 0
                    $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                }
            };

            var jssor_slider1 = new $JssorSlider$("slidercontainer", options);
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                if (parentWidth)
                    jssor_slider1.$SetScaleWidth(Math.max(Math.min(parentWidth, 996), 320));
                else
                    window.setTimeout(ScaleSlider, 30);
            }

            ScaleSlider();

            if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
                $(window).bind('resize', ScaleSlider);
            }
        });
    </script>
    <div id="slidercontainer" style="position: relative;  height: 350px; overflow: hidden; background:pink;">
        <style>
            .slider1 div { position: relative; margin: 0px; padding: 0px; }
        </style>
 
        <!-- Loading Screen --> 
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block; background: #000; top: 0px; left: 0px;width: 100%; height:100%;"></div> 
            <div style="position: absolute; display: block; background: url(media/icon/loading.gif) no-repeat center center; top: 0px; left: 0px;width: 100%;height:100%;"></div> 
        </div> 
 
        <!-- Slides Container --> 
        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 996px; height: 350px; overflow: hidden;">
            <div><img u="image" src="media/slider/01.jpg"></div>
            <div><img u="image" src="media/slider/02.jpg"></div>
             <div><img u="image" src="media/slider/03.jpg"></div>
            <div><img u="image" src="media/slider/04.jpg"></div>  
 			<div><img u="image" src="media/slider/05.jpg"></div>
			<div><img u="image" src="media/slider/06.jpg"></div> 
			<div><img u="image" src="media/slider/07.jpg"></div>  
			<div><img u="image" src="media/slider/08.jpg"></div> 
       		<div><img u="image" src="media/slider/09.jpg"></div> 
			<div><img u="image" src="media/slider/10.jpg"></div> 
			<div><img u="image" src="media/slider/11.jpg"></div> 
			<div><img u="image" src="media/slider/12.jpg"></div>
			<div><img u="image" src="media/slider/13.jpg"></div>
			<div><img u="image" src="media/slider/14.jpg"></div>

       <div u="any" class="captionBlack" style="position: absolute; display: block; top: 0; right: 0; width: 258px; height: 350px; padding:40px 6px 10px;">
       <p><b>OUR VISION </b><br>
To be one of the leading companies that is technologically driven in science, medical equipment and educational facilities in Nigeria.</p>
     
<p>&nbsp;</p>
<p><span class="style1">Full Products Catalog</span><br>
  For a complete overview of all our products, please <a href="./?link=gallery" title="" class="footer-link">visit the gallery</a></p>
       </div>
       
       
            <div u="any" class="captionOrange" style="position: absolute; display: block; bottom: 0; left: 0; width: 706px; padding:5px 10px;">
       <p><b>OUR MISSION:</b>
Breaking down technology and health care costs in Nigeria</p>       </div>
          
        </div> 
 
        <style>			
			.navbullet div, .navbullet div:hover, .navbullet .av  {filter: alpha(opacity=80); opacity: .8; overflow:hidden; cursor: pointer; border:1px solid  #76141A;}
            .navbullet div {background:#EF4149;}
            .navbullet div:hover, .navbullet .av:hover {background: #CB242B;}
            .navbullet .av {background:#80171B;}
            .navbullet .dn, .navbullet .dn:hover {background:#F00;}						
        </style>
        <div u="navigator" class="navbullet" style="position: absolute; bottom: 50px; right: 10px; display:block;">
            <div u="prototype"  style="position: absolute; width: 20px; height: 20px; text-align:center; line-height:20px; color:#FFF;" ></div>
        </div>      
    </div> 