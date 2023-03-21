var numberOftext01 = document.getElementById('counter_text').innerHTML;
var numberOftext02 = document.getElementById('counter_text02').innerHTML;

// STARTING NUMBER
var counter_number = [0];
// HOW QUICKLY YOU COUNT IN MS
var counter_duration = 100;

var myCounter = setInterval(myTimer, counter_duration);

function myTimer() {
	counter_number++;
	if (counter_number <= numberOftext01) {
		document.getElementById('counter_text').innerHTML = counter_number;
	}
	if (counter_number <= numberOftext02) {
		document.getElementById('counter_text02').innerHTML = counter_number;
	}
	if(counter_number >= numberOftext01 && counter_number >= numberOftext02){
		return myStopFunction();
	}
}

function myStopFunction() {
	clearInterval(myCounter);
}