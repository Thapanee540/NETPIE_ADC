<body>

<button class="tablink" onclick="openCity('Temperature', this, '#66ccff')" id="defaultOpen">Temperature</button>
<button class="tablink" onclick="openCity('Humidity', this, 'green')">Humidity</button>
<button class="tablink" onclick="openCity('Graph', this, 'blue')">Graph</button>
<button class="tablink" onclick="openCity('Report', this, '#9933ff')">Report</button>

<div id="Report" class="tabcontent">
  <h1>Report</h1>
  <p>Report is the capital of Norway.</p>
</div>

<div id="Temperature" class="tabcontent">
  <h1>Temperature</h1>
  <div id="data"></div>
<div id="ADC">
	<div id="name"></div>
	<div id="ADC_Value"></div>
</div>
</div>

<div id="Humidity" class="tabcontent">
  <h1>Humidity</h1>
  <p>Humidity is the capital of France.</p> 
</div>

<div id="Graph" class="tabcontent">
  <h1>Graph</h1>
  <p>Graph is the capital of Japan.</p>
</div>

<script>
function openCity(cityName,elmnt,color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(cityName).style.display = "block";
    elmnt.style.backgroundColor = color;

}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
     
</body>