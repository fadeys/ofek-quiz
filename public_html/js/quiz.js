function Wizard() {

	var defaults = {
		stepSelector: '.step',
		wrapperSelector: '#quiz-form',
		submitSelector: '.wizard-submit',
		nextButtonSelector: '.wizard-next',
		previousButtonSelector: '.wizard-prev',
		submitButtonSelector: '.wizard-submit',
		formSelector: '#quiz-form',
		legendSelector: '.wizard-question-index-item'
	};

	var currentStep = 0;

	var stepHeights = [];

	var stepElements = $(defaults['stepSelector']);

	var wrapperElement = $(defaults['wrapperSelector']);

	var nextButton = $(defaults['nextButtonSelector']);

	var prevButton = $(defaults['previousButtonSelector']);

	var legendElements = $(defaults['legendSelector']);

	this.init = function() {
		var self = this;
		wrapperElement.css({
			display: 'block',
			width: '100%'
		});
		for (var i = 0; i < stepElements.length; i++) {
			stepHeights[i] = $(stepElements[i]).css('height');
		}
		this.setStep();
		prevButton.hide();
		$(legendElements[currentStep]).addClass('active');

		nextButton.on('click', function() {
			self.next();
			self.setStep();
		});
		prevButton.on('click', function() {
			self.previous();
			self.setStep();
		});

	};

	this.setStep = function() {
		wrapperElement.css({ height: stepHeights[currentStep] });
		stepElements.hide();
		$(stepElements[currentStep]).fadeIn();
		if (legendElements.length > 0) {
			legendElements.removeClass('active');
			$(legendElements[currentStep]).addClass('active');
		}
	};

	this.next = function() {
		currentStep++;
		if (currentStep == stepElements.length - 1) {
			nextButton.hide();
			prevButton.show();
		} else {
			nextButton.show();
		}
	};

	this.previous = function() {
		currentStep--;
		if (currentStep == 0) {
			prevButton.hide();
			nextButton.show();
		}
	};
}


$(document).on('ready', function() {
	var wizard = new Wizard();
	wizard.init();
	wizard.setStep(1);
});