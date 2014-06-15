(function () {
	// Avoid `console` errors in browsers that lack a console.
	var method,
		noop = function () {
		},
		methods = [
			'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
			'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
			'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
			'timeStamp', 'trace', 'warn'
		],
		length = methods.length,
		console = (window.console = window.console || {});
	while (length--) {
		method = methods[length];
		// Only stub undefined methods.
		if (!console[method]) {
			console[method] = noop;
		}
	}
}());
(function ($) {
	// pollyfill for placeholder attribute on form inputs
	var usePollyfill = !('placeholder' in (document.createElement('input')));
	$('form').entwine({
		onsubmit: function (e) {
			this.find('[placeholder]').hidePlaceholder();
			this._super(e);
		}
	});
	$('input, textarea').entwine({
		onmatch: function () {
			if (usePollyfill && this.attr('placeholder')) {
				this.addClass('placeholder-fallback');
			}
			this._super();
		}
	});
	$('.placeholder-fallback').entwine({
		onmatch: function () {
			this.showPlaceholder();
			this._super();
		},
		onclick: function () {
			this.hidePlaceholder();
			this._super();
		},
		onfocusin: function () {
			this.hidePlaceholder();
			this._super();
		},
		onfocusout: function () {
			this.showPlaceholder();
			this._super();
		},
		showPlaceholder: function () {
			if (this.val() == '' || this.val() == this.attr('placeholder')) {
				this.addClass('placeholder').val(this.attr('placeholder'));
			}
		},
		hidePlaceholder: function () {
			if (this.val() == this.attr('placeholder')) {
				this.val('').removeClass('placeholder');
			}
		}
	});
}(jQuery));