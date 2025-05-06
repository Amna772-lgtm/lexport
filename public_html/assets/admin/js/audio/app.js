function restore() {
  $("#record, #live").removeClass("disabled");
  $("#pause").replaceWith('<a class="button one" id="pause">Pause</a>');
  $(".one").addClass("disabled");
  Fr.voice.stop();
}

function makeWaveform() {
  var analyser = Fr.voice.recorder.analyser;

  var bufferLength = analyser.frequencyBinCount;
  var dataArray = new Uint8Array(bufferLength);

  /**
   * The Waveform canvas
   */
  var WIDTH = 500,
    HEIGHT = 200;

  var canvasCtx = $("#level")[0].getContext("2d");
  canvasCtx.clearRect(0, 0, WIDTH, HEIGHT);

  function draw() {
    var drawVisual = requestAnimationFrame(draw);

    analyser.getByteTimeDomainData(dataArray);

    canvasCtx.fillStyle = 'rgb(200, 200, 200)';
    canvasCtx.fillRect(0, 0, WIDTH, HEIGHT);
    canvasCtx.lineWidth = 2;
    canvasCtx.strokeStyle = 'rgb(0, 0, 0)';

    canvasCtx.beginPath();

    var sliceWidth = WIDTH * 1.0 / bufferLength;
    var x = 0;
    for (var i = 0; i < bufferLength; i++) {
      var v = dataArray[i] / 128.0;
      var y = v * HEIGHT / 2;

      if (i === 0) {
        canvasCtx.moveTo(x, y);
      } else {
        canvasCtx.lineTo(x, y);
      }

      x += sliceWidth;
    }
    canvasCtx.lineTo(WIDTH, HEIGHT / 2);
    canvasCtx.stroke();
  };
  draw();
}

$(document).ready(function() {
  $(document).on("click", "#record:not(.disabled)", function() {
    Fr.voice.record($("#live").is(":checked"), function() {
      $(".recordButton").addClass("disabled");

      $("#live").addClass("disabled");
      $(".one").removeClass("disabled");

      makeWaveform();
    });
  });

  $(document).on("click", "#recordFor5:not(.disabled)", function() {
    Fr.voice.record($("#live").is(":checked"), function() {
      $(".recordButton").addClass("disabled");

      $("#live").addClass("disabled");
      $(".one").removeClass("disabled");

      makeWaveform();
    });

    Fr.voice.stopRecordingAfter(5000, function() {
      alert("Recording stopped after 5 seconds");
    });
  });

  $(document).on("click", "#pause:not(.disabled)", function() {
    if ($(this).hasClass("resume")) {
      Fr.voice.resume();
      $(this).replaceWith('<a class="button one" id="pause">Pause</a>');
    } else {
      Fr.voice.pause();
      $(this).replaceWith('<a class="button one resume" id="pause">Resume</a>');
    }
  });

  $(document).on("click", "#stop:not(.disabled)", function() {
    restore();
  });

  $(document).on("click", "#play:not(.disabled)", function() {
    if ($(this).parent().data("type") === "mp3") {
      Fr.voice.exportMP3(function(url) {
        $("#audio").attr("src", url);
        $("#audio")[0].play();
      }, "URL");
    } else {
      Fr.voice.export(function(url) {
        $("#audio").attr("src", url);
        $("#audio")[0].play();
      }, "URL");
    }
    restore();
  });

  $(document).on("click", "#download:not(.disabled)", function() {
    if ($(this).parent().data("type") === "mp3") {
      Fr.voice.exportMP3(function(url) {
        $("<a href='" + url + "' download='MyRecording.mp3'></a>")[0].click();
      }, "URL");
    } else {
      Fr.voice.export(function(url) {
        $("<a href='" + url + "' download='MyRecording.wav'></a>")[0].click();
      }, "URL");
    }
    restore();
  });

  $(document).on("click", "#base64:not(.disabled)", function() {
    if ($(this).parent().data("type") === "mp3") {
      Fr.voice.exportMP3(function(url) {
        console.log("Here is the base64 URL : " + url);
        alert("Check the web console for the URL");

        $("<a href='" + url + "' target='_blank'></a>")[0].click();
      }, "base64");
    } else {
      Fr.voice.export(function(url) {
        console.log("Here is the base64 URL : " + url);
        alert("Check the web console for the URL");

        $("<a href='" + url + "' target='_blank'></a>")[0].click();
      }, "base64");
    }
    restore();
  });

  $(document).on("click", "#save:not(.disabled)", function() {
    function upload(blob) {
	  var aid = document.querySelector('.audioocaseid').id;
	  var sessionid = document.querySelector('.sessionid').id;
var type = document.querySelector('.type').id; 
	  var audio_name =$('.audio_name').val();
	  	   var audioid = document.querySelector('.audioid').id;
      var seturl = "https://albarakatilaw.com/front/new_file";
      var formData = new FormData();
      formData.append('file', blob);
      formData.append('aid', aid);
       formData.append('audioid', audioid);
      formData.append('audio_name', audio_name);
      formData.append('type', type);
      formData.append('sessionid', sessionid);
      $.ajax({
        url: seturl,
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(url1) {
        //$("#audio").attr("src", url);
		$(".putaudiores").append(url1);
		$('.audio_name').val('');
		
        //$("#audio")[0].play();
        }
      });
    }
    if ($(this).parent().data("type") === "mp3") {
      Fr.voice.exportMP3(upload, "blob");
    } else {
      Fr.voice.export(upload, "blob");
    }
    restore();
  });
});