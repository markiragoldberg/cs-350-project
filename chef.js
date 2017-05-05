var num = 1;

function next_pizza(){
var x = document.getElementById("pizza_count");
x.value = ++num;

var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function(){
	if(xhr.readyState == 4 && xhr.status == 200){

}
}
xhr.open("GET", "colten.php?pizza="+ num);
xhr.send(null);
}


function prev_pizza(){
var y = document.getElementById("pizza_count");
y.value = --num;
}
