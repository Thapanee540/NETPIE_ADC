<!-- <script src="js/microgear.js"></script> -->

<script src="microgear-html5/build/microgear.js"></script>


<script src="js/raphael.2.1.0.min.js"></script>
<script src="js/justgage.1.0.1.min.js"></script>

<!-- <script src="https://netpie.io/microgear.js"></script> -->
<link href="https://fonts.googleapis.com/css?family=Bai+Jamjuree" rel="stylesheet">

<style>
	body {
		text-align: center;
		font-family: 'Bai Jamjuree', sans-serif;
	}


	#ADC_Value {
		width:400px; 
		height:260px;
		display: inline-block;
	}

	#name {
		font-size: 20px;
		color: blue;
		padding-top: 10px;
	}
	#ADC {
		display: none;
		/* border: 1px solid black; */
		border-radius: 10px;
		padding: 5px;
		margin: 10px;
		background: none;
	}
	#nectec {
		padding: 10px;
		width:127px;
		height:30px;
	}
</style>
<?php 
include("header.php"); 
include("tab.php");
?>


<script>
	var ADC_Value;
	window.onload = function(){
		ADC_Value = new JustGage({
			id: "ADC_Value",
			class:"tabcontent",
			value: 0,
			min: 0,
			max: 1024,
			title: " ",
			label: "%",
			levelColors: ["#66ff33","#ffff4d","#ff0000"]
		});
	};
</script>

<script>
	const APPKEY = "q55tF6O03UfRliO";
	const APPSECRET = "B695zEICEtOcKNoFGRegLg9j9";
	const APPID = "TestKit";
	var microgear = Microgear.create({
		gearkey: APPKEY,
		gearsecret: APPSECRET
	});
	var timestamp=0;
	microgear.on('message',function(topic,msg) {
		var split_msg = msg.split(",");
		var timestamp_current = new Date().getTime();
		//console.log(msg);

		if(typeof(split_msg[3])!='undefined' && split_msg[3]=='ADC_Value'){
				document.getElementById("ADC").style.display = "block";
				document.getElementById("name").innerHTML = split_msg[4].toUpperCase();;
				ADC_Value.refresh(split_msg[0]);
				timestamp = timestamp_current;
		}
	});
	microgear.on('connected', function() {
		microgear.setname('webapp');
		// document.getElementById("data").innerHTML = '<p><img src="img/bot2.png" id="tesr" style="width:20% ; height:auto ;" onclick="location.reload()"></p>';
	});
	setInterval(function(){
		var timestamp_current = new Date().getTime();
		if((timestamp_current-timestamp)>10000){
			document.getElementById("ADC").style.display = "none";
		}
	},1000);
	microgear.resettoken(function(err){
		microgear.connect(APPID);
	});
</script>

<!-- <div id="data"></div>
<div id="ADC">
	<div id="name"></div>
	<div id="ADC_Value"></div>
</div> -->
