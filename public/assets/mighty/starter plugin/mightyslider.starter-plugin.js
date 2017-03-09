/**
 * mightySlider starter plugin
 * http://mightyslider.com/
 * 
 * @version:  1.0.0
 * @released: April 22, 2014
 * 
 * @author:   Hemn Chawroka
 *            http://iprodev.com/
 * 
 */
(function ($, window, undefined) {
	'use strict';

	// Global variables
	var $win = $(window),
		isTouch = !!('ontouchstart' in window),
		clickEvent = isTouch && $.event.special.tap ? 'tap' : 'click';

	// Begin the plugin
	$.fn.mSStarterPlugin = function(options) {
		// Default settings. Play carefully.
		options = jQuery.extend({}, {
			speed: 1500,
			startAt: 0,
			arrows: 1,
			timeBar: 1,
			slideSize: '70%'
		}, options);

		// Apply to all elements
		return this.each(function (i, element) {

			// Global slider's DOM elements and variables
			var $frame = $(element),
				$parent = $frame.parent(),
				$slidesElement = $frame.children().eq(0),
				$slides = $slidesElement.children(),
				slideSize = options.slideSize,
				lastIndex = -1, $timerEL, ctx, $prevButton, $nextButton, $thumbnailsBar;

			$parent.addClass('mSStarterPlugin');

			// Append time bar
			if (options.timeBar) {
				$timerEL = $('<canvas class="timeBar" width="160" height="160"></canvas>');
				$parent.append($timerEL);
				ctx = $timerEL[0] && $timerEL[0].getContext("2d");
			}

			// Append arrows
			if (options.arrows) {
				$prevButton = $('<a class="mSButtons mSPrev"></a>'),
				$nextButton = $('<a class="mSButtons mSNext"></a>');
				$frame.append($prevButton).append($nextButton);
			}

			// Append thumbnails bar
			$parent.append('<div class="mSStarterPluginThumbnails"><div><ul></ul></div></div>');
			$thumbnailsBar = $('div.mSStarterPluginThumbnails ul', $parent)


			// Calling new mightySlider class
			var slider = new mightySlider($frame, {
				speed: options.speed,
				startAt: options.startAt,
				autoScale: 1,
				easing: 'easeOutExpo',
				
				// Navigation options
				navigation: {
					slideSize: slideSize,
					keyboardNavBy: 'slides',
					activateOn: clickEvent
				},
				
				// Thumbnails options
				thumbnails: {
					thumbnailsBar: $thumbnailsBar,
					thumbnailNav: 'forceCentered',
					activateOn: clickEvent,
					scrollBy: 0
				},

				// Dragging
				dragging: {
					onePage: 1,
					mouseDragging: 0
				},

				// Buttons
				buttons: !isTouch ? {
					prev: $prevButton,
					next: $nextButton
				} : {},

				// Cycling
				cycling: {
					cycleBy: 'slides'
				}
			}, {
				active: function(name, index) {
					if (lastIndex !== index) {
						// Hide the timer
						if (options.timeBar) {
							$timerEL.stop().css({ opacity: 0 });
						}

						// Remove next and previous classes from the slides
						$slides.removeClass('next_1 next_2 prev_1 prev_2');

						// Detect next and prev slides
						var next1 = this.slides[index + 1],
							next2 = this.slides[index + 2],
							prev1 = this.slides[index - 1],
							prev2 = this.slides[index - 2];

						// Add next and previous classes to the slides
						next1 && $(next1.element).addClass('next_1');
						next2 && $(next2.element).addClass('next_2');
						prev1 && $(prev1.element).addClass('prev_1');
						prev2 && $(prev2.element).addClass('prev_2');
					}

					lastIndex = index;
				},
				moveEnd: function() {
					// Reset cycling progress time elapsed
					this.progressElapsed = 0;
					// Fade in the timer
					if (options.timeBar) {
						$timerEL.animate({ opacity: 1 }, 800);
					}
				},
				progress: options.timeBar ? function(name, progress) {
					// Draw circle bar timer based on progress
					drawArc(ctx, 360 - (360 / 1 * progress));
				} : null,
				'initialize resize': function(name) {
					var self = this,
						frameSize = self.relative.frameSize,
						slideSizePixel = percentToValue(slideSize.replace('%', ''), frameSize),
						remainedSpace = (frameSize - slideSizePixel),
						margin = (slideSizePixel - remainedSpace / 3) / 2;

					// Sets slides margin
					$slides.css('margin', '0 -' + margin + 'px');
					// Reload immediate
					self.reload(1);
				}
			});

			// Initiate the mightySlider
			slider.init();

			// Reload the mightySlider
			slider.reload();
		});
	};

    /**
     * Return value from percent of a number.
     *
     * @param {Number} percent
     * @param {Number} total
     *
     * @return {Number}
     */
    function percentToValue(percent, total) {
        return parseInt((total / 100) * percent);
    }

    /**
     * Convert degree to radian
     *
     * @param {Number}   degree
     *
     * @return {Number}
     */
    function degreeToRadian(degree) {
        return ((degree - 90) * Math.PI) / 180;
    }

	/**
	 * Draw arc on canvas element
	 *
	 * @param {Number}   angle
	 *
	 * @return {Void}
	 */
	function drawArc(ctx, angle) {
		var startingAngle = degreeToRadian(0),
			endingAngle = degreeToRadian(angle),
			size = 160,
			center = size / 2;

		//360Bar
		ctx.clearRect(0, 0, size, size);
		ctx.beginPath();
		ctx.arc(center, center, center-4, startingAngle, endingAngle, false);
		ctx.lineWidth = 8;
		ctx.strokeStyle = "#aaa";
		ctx.lineCap = "round";
		ctx.stroke();
		ctx.closePath();
	}

})(jQuery, this);