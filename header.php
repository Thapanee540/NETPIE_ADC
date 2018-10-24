<style>
.tablink {
    background-color: #555;
    color: white;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    font-size: 17px;
    width: 25%;
    transition: 0.3s;
}

.tablink:hover {
    background-color: #777;
}

/* Style the tab content */
.tabcontent {
    color: white;
    display: none;
    padding: 50px;
    text-align: center;
}

@media (max-width: 500px){
    .tablink{
        font-size: 2vm;
    }
}

#Temperature {background-color:#66ccff;}
#Humidity {background-color:green;}
#Graph {background-color:blue;}
#Report {background-color:#9933ff;}

</style>