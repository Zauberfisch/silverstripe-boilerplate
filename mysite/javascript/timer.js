/**
 * Lightweight timer to wrap around setTimeout and setInterval
 *
 * @example var timer = new Timer(function() { console.log('yay'); }, 2000, true);
 * @param function callback
 * @param int delay
 * @param boolean interval
 */
function Timer(callback, delay, interval) {
	var timerId, startDate, remaining = delay, that = this;
	this.stop = function () {
		window.clearTimeout(timerId);
		remaining -= new Date() - startDate;
		return this;
	};
	this.start = function () {
		window.clearTimeout(timerId);
		startDate = new Date();
		if (remaining > delay) remaining = delay;
		timerId = window.setTimeout(function () {
			callback();
			if (typeof interval != 'undefined' && interval === true) {
				that.start();
			}
		}, remaining);
		return this
	};
	this.reset = function () {
		remaining = delay;
		this.start();
		return this;
	};
	this.start();
}
