<?php
			// define times to countdown to and the time now
			$time1  = strtotime(gmdate("02:00:00"));
			$time2  = strtotime(gmdate("08:00:00"));
			$time3  = strtotime(gmdate("14:00:00"));
			$time4  = strtotime(gmdate("20:00:00"));
			$timeNow = strtotime("now");

?>


<script type="text/javascript">
			// parse the PHP variables to javascript (because I don't know how to do equivalent in js yet)
			var time1 = parseInt("<?php echo $time1;?>");
			var time2 = parseInt("<?php echo $time2;?>");
			var time3 = parseInt("<?php echo $time3;?>");
			var time4 = parseInt("<?php echo $time4;?>");
			var timeNow = parseInt("<?php echo $timeNow;?>");
			
			// difference in seconds between highest PM time and lowest AM time
			var highLowDif = 21600;
			
			// create an array to store times in
			var timeInSeconds = [ time1, time2, time3, time4 ];
			
			// initiate the target hour variable
			var targetHour = 0;
			
			// loop through each element and retrieve the next time to countdown to
				for(var i = 0; i < timeInSeconds.length; i++) {
						
						// if this time is greater than the current time assign it to targetHour variables and break out of
						// the loop because we only want the next highest
						if(timeInSeconds[i] > timeNow) { 
						
							targetHour = timeInSeconds[i]; 
							break; 
						}
						// If there is no higher time than get the next lowest time 
						var temp = timeInSeconds[i];
						if(timeInSeconds[i] > temp){
							temp = TimeInSeconds[i];
						}
				}
				// If no higher time could be found then its really late at night and the next time is in the am
				if(targetHour == 0){
				
					// get difference between time now and the earliest am time
					var highDif = timeNow - temp;
					
					// to count down from late pm to early am we find out how many seconds it is between now and the next 
					// time, subtract the difference from this number and then add the remainder to the time now
					targetHour = timeNow + (highLowDif - highDif);
				}
				
				// get the difference between the next time and the time now to work out how long there is to go in seconds
				var dif = targetHour - timeNow;

			// run the timer
			var counter=setInterval(timer, 1000); //1000 will  run it every 1 second
			
			function timer()
			{
				
				// if we reach the target time then restart the timer for the next time we want to count down to
				if(dif == 0){
					clearInterval(counter);
					var announce = setInterval(announcement, 1000);
					
				}else{
					
					// work out how many hours, minutes and seconds there are
					var dh1 = Math.floor(dif/3600) % 24;
					var	dm1 = Math.floor(dif/60) % 60;
					var ds1 = dif % 60; 
					
					// countdown one second
					dif=dif-1;
					// show current time left on the countdown timer
					//document.getElementById("timer").innerHTML="<span id=\"countdown\">"+dh1+"h "+dm1+"m "+ds1+"s</span>";
				}
			}
	
			// How long the announcement will last when time is reached in seconds
			var announceTime = 5;
			
			function announcement()
			{
				if(announceTime == 0){
					
					clearInterval(announce);
				}else{
					announceTime = announceTime - 1;
					document.getElementById("timer").innerHTML="<span id=\"countdown\">Time reached, reload page for next timer!</span>";
				}	
			}
			
</script>
