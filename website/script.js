try {
  var SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition || window.mozSpeechRecognition || window.msSpeechRecognition;
  var recognition = new SpeechRecognition();
}
catch(e) {
  console.error(e);
  $('.no-browser-support').show();
  $('.app').hide();
}

var noteTextarea = $('#note-textarea');

var noteContent = '';

/*-----------------------------
      Voice Recognition 
------------------------------*/

recognition.continuous = false;

// This block is called every time the Speech APi captures a line. 
recognition.onresult = function(event) {


  var current = event.resultIndex;
  var transcript = event.results[current][0].transcript;

  var mobileRepeatBug = (current == 1 && transcript == event.results[0][0].transcript);

  if(!mobileRepeatBug) {
    noteContent = transcript;
    noteTextarea.val(noteContent);
        const Http = new XMLHttpRequest();
const url='api/update.php?command='+noteContent; //API CALLING
Http.open("GET", url);
Http.send();

Http.onreadystatechange = (e) => {
  console.log(Http.responseText);
  readOutLoud(Http.responseText);
}
  }        
};
/*-----------------------------
      App buttons and input 
------------------------------*/

$('#start-record-btn').click(function() {
  noteContent = ' ';
  noteTextarea.val("");
  recognition.start();
  setTimeout(() => { recognition.stop();}, 3000);
  
});

/*-----------------------------
      Speech Synthesis 
------------------------------*/

function readOutLoud(message) {
	var speech = new SpeechSynthesisUtterance();

  // Set the text and voice attributes.
	speech.text = message;
	speech.volume = 1;
	speech.rate = 1;
	speech.pitch = 1;
  
	window.speechSynthesis.speak(speech);
}


