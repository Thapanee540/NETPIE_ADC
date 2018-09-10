<script src="js/microgear.js"></script>
<script src="js/raphael.2.1.0.min.js"></script>
<script src="js/justgage.1.0.1.min.js"></script>

<script src="https://netpie.io/microgear.js"></script>

<style>
	body {
		text-align: center;
	}
      
	#ADC_Value {
		width:200px; height:160px;
		display: inline-block;
	}
	#name {
		font-size: 20px;
		color: blue;
	}
	#ADC {
		display: none;
		border: 1px solid black;
		border-radius: 10px;
		padding: 5px;
		margin: 10px;
		background: aliceblue;
	}
	#nectec {
		
		padding: 10px;
		width:127px; 
		height:30px;
	}
</style>

<script>
	var ADC_Value;
	window.onload = function(){
		ADC_Value = new JustGage({
			id: "ADC_Value", 
			value: 0, 
			min: 0,
			max: 1024,
			title: "ADC Testing",
			label: "%",
			levelColors: ["#00fff6","#ff00fc","#1200ff"]
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
		document.getElementById("data").innerHTML = '<p><img src="img/tesr_logo.png" id="tesr" onclick="location.reload()"></p>';
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

<div id="data"></div>
<div id="ADC">
	<div id="name"></div>
	<div id="ADC_Value"></div>
</div>