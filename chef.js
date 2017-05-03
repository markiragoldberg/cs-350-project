var itemindex=0;
var currentcustomer;

function start_page(){


var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function(){
	if(xhr.readyState == 4 && xhr.status == 200){
console.log(xhr.response);
        var result = xhr.responseText;
	var pizza =  result.split('.');
	if (pizza[0] == 0){

	} else{
		var row = document.getElementById("orders").rows[document.getElementById("orders").rows.length - 1 ];
		if(itemindex==0)
			row= document.getElementById("orders").insertRow(-1);
		if (pizza[1]!=currentcustomer){
			document.getElementById("orders").insertRow(-1);
			row = document.getElementById("orders").insertRow(-1);
			currentcustomer = pizza[1];
			row.style.margin-top="10px";
		}

		if (row.cells.length==5)
			row = document.getElementById("orders").insertRow(-1);

		var cell=row.insertCell(-1);
		cell.innerHTML = pizza[0];
		itemindex++;
	}

}
}
xhr.open("GET", "chef_Extract.php?pizza="+ itemindex);
xhr.send(null);
}

function execute(){

setInterval(start_page, 3000);

}
















function next_pizza(){
var x = document.getElementById("pizza_count");
var num = x.value;
var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function(){
	if(xhr.readyState == 4 && xhr.status == 200){
        var result = xhr.responseText;
	var pizza =  result.split('.');
	if (pizza[0] == 0){
	document.getElementById("pizza_descriptors").value="No pizzas ordered yet."
	}else{
	
	document.getElementById("pizza_descriptors").value=pizza[0];
	x.value=pizza[1];
	}
}
}
xhr.open("GET", "chef_Recieve.php?pizza="+ num+"&item=0&direction=>");
xhr.send(null);
}


function prev_pizza(){
var x = document.getElementById("pizza_count");
var num = x.value;
var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function(){
	if(xhr.readyState == 4 && xhr.status == 200){
        var result = xhr.responseText;
	var pizza =  result.split('.');
	if (pizza[0] == 0){
	document.getElementById("pizza_descriptors").value="No pizzas ordered yet."
	}else{
	
	document.getElementById("pizza_descriptors").value=pizza[0];
	x.value=pizza[1];
	}
}
}
xhr.open("GET", "chef_Recieve.php?pizza="+ num+"&item=0&direction=<");
xhr.send(null);
}

function next_calzone(){
var x = document.getElementById("calzone_count");
var num = x.value;
var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function(){
	if(xhr.readyState == 4 && xhr.status == 200){
        var result = xhr.responseText;
	var calzone =  result.split('.');
	if (calzone[0] == 0){
	document.getElementById("calzone_descriptors").value="No calzones ordered yet."
	}else{
	
	document.getElementById("calzone_descriptors").value=pizza[0];
	x.value=pizza[1];
	}
}
}
xhr.open("GET", "chef_Recieve.php?pizza="+ num+"&item=1&direction=>");
xhr.send(null);
}


function prev_calzone(){
var x = document.getElementById("calzone_count");
var num = x.value;
var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function(){
	if(xhr.readyState == 4 && xhr.status == 200){
        var result = xhr.responseText;
	var pizza =  result.split('.');
	if (pizza[0] == 0){
	document.getElementById("calzone_descriptors").value="No calzones ordered yet."
	}else{
	
	document.getElementById("calzone_descriptors").value=pizza[0];
	x.value=pizza[1];
	}
}
}
xhr.open("GET", "chef_Recieve.php?pizza="+ num+"&item=1&direction=<");
xhr.send(null);
}


function next_salad(){
var x = document.getElementById("salad_count");
var num = x.value;
var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function(){
	if(xhr.readyState == 4 && xhr.status == 200){
        var result = xhr.responseText;
	var pizza =  result.split('.');
	if (pizza[0] == 0){
	document.getElementById("salad_descriptors").value="No salads ordered yet."
	}else{
	
	document.getElementById("salad_descriptors").value=pizza[0];
	x.value=pizza[1];
	}
}
}
xhr.open("GET", "chef_Recieve.php?pizza="+ num+"&item=2&direction=>");
xhr.send(null);
}


function prev_salad(){
var x = document.getElementById("salad_count");
var num = x.value;
var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function(){
	if(xhr.readyState == 4 && xhr.status == 200){
        var result = xhr.responseText;
	var pizza =  result.split('.');
	if (pizza[0] == 0){
	document.getElementById("salad_descriptors").value="No salads ordered yet."
	}else{
	
	document.getElementById("salad_descriptors").value=pizza[0];
	x.value=pizza[1];
	}
}
}
xhr.open("GET", "chef_Recieve.php?pizza="+ num+"&item=2&direction=<");
xhr.send(null);
}

function next_drink(){
var x = document.getElementById("drink_count");
var num = x.value;
var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function(){
	if(xhr.readyState == 4 && xhr.status == 200){
        var result = xhr.responseText;
	var calzone =  result.split('.');
	if (calzone[0] == 0){
	document.getElementById("drink_descriptors").value="No beverages ordered yet."
	}else{
	
	document.getElementById("drink_descriptors").value=pizza[0];
	x.value=pizza[1];
	}
}
}
xhr.open("GET", "chef_Recieve.php?pizza="+ num+"&item=3&direction=>");
xhr.send(null);
}


function prev_drink(){
var x = document.getElementById("drink_count");
var num = x.value;
var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function(){
	if(xhr.readyState == 4 && xhr.status == 200){
        var result = xhr.responseText;
	var pizza =  result.split('.');
	if (pizza[0] == 0){
	document.getElementById("drink_descriptors").value="No beverages ordered yet."
	}else{
	
	document.getElementById("drink_descriptors").value=pizza[0];
	x.value=pizza[1];
	}
}
}
xhr.open("GET", "chef_Recieve.php?pizza="+ num+"&item=3&direction=<");
xhr.send(null);
}
