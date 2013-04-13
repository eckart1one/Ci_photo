<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<title>Galleriffic | Integration with history plugin</title>
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/css gal/basic.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/css gal/galleriffic-3.css" type="text/css" />
		<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-1.3.2.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.history.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.galleriffic.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.opacityrollover.js"></script>
		<!-- We only want the thunbnails to display when javascript is disabled -->
		<script type="text/javascript">
			document.write('<style>.noscript { display: none; }</style>');
		</script>

		<script type="text/javascript">

				<?php
					$php_array = array('abc','def','ghi','uno','dos','tres');
					$js_array = json_encode($php_array);
					echo "var javascript_array = ". $js_array . ";\n";
				?>
	
					
			jQuery(document).ready(function($) {

				var html="";	
				for (var i = 0; i < javascript_array.length; i++) 
					{
						html = '<li>'
									+'<input type="checkbox" name="option1" value="">'+javascript_array[i]+'<br>'
									+'<a class="thumb" name="bigleaf" href="http://farm3.static.flickr.com/2093/2538168854_f75e408156.jpg" title="Title #2">'
										
									+'<img src="http://farm3.static.flickr.com/2093/2538168854_f75e408156_s.jpg" alt="Title #2" />'
									+'</a>'
									+'<div class="caption">'
										+'<div class="download">'
											'<a href="http://farm3.static.flickr.com/2093/2538168854_f75e408156_b.jpg">Download Original</a>'
										+'</div>'
										+'<div class="image-title">Title #2</div>'
										+'<div class="image-desc">Description</div>'
									+'</div>'
								+'</li>';

						$('#thumbs_d').append(html);				
					}		
			
				
				// We only want these styles applied when javascript is enabled
				$('div.navigation').css({'width' : '300px', 'float' : 'left'});
				$('div.content').css('display', 'block');

				// Initially set opacity on thumbs and add
				// additional styling for hover effect on thumbs
				var onMouseOutOpacity = 0.67;
				$('#thumbs ul.thumbs li').opacityrollover({
					mouseOutOpacity:   onMouseOutOpacity,
					mouseOverOpacity:  1.0,
					fadeSpeed:         'fast',
					exemptionSelector: '.selected'
				});
				
				// Initialize Advanced Galleriffic Gallery
				var gallery = $('#thumbs').galleriffic({
					delay:                     2500,
					numThumbs:                 15,
					preloadAhead:              10,
					enableTopPager:            true,
					enableBottomPager:         true,
					maxPagesToShow:            7,
					imageContainerSel:         '#slideshow',
					controlsContainerSel:      '#controls',
					captionContainerSel:       '#caption',
					loadingContainerSel:       '#loading',
					renderSSControls:          true,
					renderNavControls:         true,
					playLinkText:              'Play Slideshow',
					pauseLinkText:             'Pause Slideshow',
					prevLinkText:              '&lsaquo; Previous Photo',
					nextLinkText:              'Next Photo &rsaquo;',
					nextPageLinkText:          'Next &rsaquo;',
					prevPageLinkText:          '&lsaquo; Prev',
					enableHistory:             true,
					autoStart:                 false,
					syncTransitions:           true,
					defaultTransitionDuration: 900,
					onSlideChange:             function(prevIndex, nextIndex) {
						// 'this' refers to the gallery, which is an extension of $('#thumbs')
						this.find('ul.thumbs').children()
							.eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
							.eq(nextIndex).fadeTo('fast', 1.0);
					},
					onPageTransitionOut:       function(callback) {
						this.fadeTo('fast', 0.0, callback);
					},
					onPageTransitionIn:        function() {
						this.fadeTo('fast', 1.0);
					}
				});

				/**** Functions to support integration of galleriffic with the jquery.history plugin ****/

				// PageLoad function
				// This function is called when:
				// 1. after calling $.historyInit();
				// 2. after calling $.historyLoad();
				// 3. after pushing "Go Back" button of a browser
				function pageload(hash) {
					// alert("pageload: " + hash);
					// hash doesn't contain the first # character.
					if(hash) {
						$.galleriffic.gotoImage(hash);
					} else {
						gallery.gotoIndex(0);
					}
				}

				// Initialize history plugin.
				// The callback is called at once by present location.hash. 
				$.historyInit(pageload, "advanced.html");

				// set onlick event for buttons using the jQuery 1.3 live method
				$("a[rel='history']").live('click', function(e) {
					if (e.button != 0) return true;
					
					var hash = this.href;
					hash = hash.replace(/^.*#/, '');

					// moves to a new page. 
					// pageload is called at once. 
					// hash don't contain "#", "?"
					$.historyLoad(hash);

					return false;
				});

				$("#seleccion_envio").click(function(){
					$("#thumbs_d").children().each(function(){						
						alert($(this).is(':checked'));
					});
				});

				/****************************************************************************************/
			});
		</script>
	</head>
	<body>
		<div id="page">
			<div id="container">
				<h1><a href="index.html">Ci fotografia</a></h1>
				<h2>Integration with history plugin</h2>

				<!-- Start Advanced Gallery Html Containers -->
				<div id="gallery" class="content">
					<div id="controls" class="controls"></div>
					<div class="slideshow-container">
						<div id="loading" class="loader"></div>
						<div id="slideshow" class="slideshow"></div>
					</div>
					<div id="caption" class="caption-container"></div>
				</div>
				<form method"POST">
				<div id="thumbs" class="navigation">
					<ul class="thumbs noscript" id="thumbs_d">
						
						<li>
							<div STYLE="background-color:black; color:white">
							<input type="checkbox" name="option1" value="Milk"> Milk<br>
							<a class="thumb" name="leaf" href="http://farm4.static.flickr.com/3261/2538183196_8baf9a8015.jpg" title="Title #0">
								
								<img src="http://farm4.static.flickr.com/3261/2538183196_8baf9a8015_s.jpg" alt="Title #0" />
							</a>
							</div>
							<div class="caption">
								<div class="download">
									<a href="http://farm4.static.flickr.com/3261/2538183196_8baf9a8015_b.jpg">Download Original

									</a>
								</div>
								<div class="image-title">Title #0</div>
								<div class="image-desc">Description</div>
							</div>
						</li>

						<li>
							<input type="checkbox" name="option1" value="Milk"> Milk<br>
							<a class="thumb" name="drop" href="http://farm3.static.flickr.com/2404/2538171134_2f77bc00d9.jpg" title="Title #1">
								
								<img src="http://farm3.static.flickr.com/2404/2538171134_2f77bc00d9_s.jpg" alt="Title #1" />
							</a>
							<div class="caption">
								Any html can be placed here ...
							</div>
						</li>

						<li>
							<input type="checkbox" name="option1" value="Milk"> Milk<br>
							<a class="thumb" name="bigleaf" href="http://farm3.static.flickr.com/2093/2538168854_f75e408156.jpg" title="Title #2">
								
								<img src="http://farm3.static.flickr.com/2093/2538168854_f75e408156_s.jpg" alt="Title #2" />
							</a>
							<div class="caption">
								<div class="download">
									<a href="http://farm3.static.flickr.com/2093/2538168854_f75e408156_b.jpg">Download Original</a>
								</div>
								<div class="image-title">Title #2</div>
								<div class="image-desc">Description</div>
							</div>
						</li>

					</ul>
				</div>
				<input type="button" value="enviar" id="seleccion_envio">					
				</form>
				<!-- End Advanced Gallery Html Containers -->
				<div style="clear: both;"></div>
			</div>
		</div>
		<div id="footer">&copy; 2009 Trent Foley</div>
		
	</body>
</html>