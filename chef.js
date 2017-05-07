var itemindex = 0;
var currentcustomer;

function start_page()
{


    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
	if (xhr.readyState == 4 && xhr.status == 200) {
	    var result = xhr.responseText;
	    var pizza = result.split('.');
	    if (pizza[0] == 0) {

	    } else {
		var row =
		    document.getElementById("orders").rows[document.
							   getElementById
							   ("orders").rows.
							   length - 1];
		if (itemindex == 0)
		    row = document.getElementById("orders").insertRow(-1);
		if (pizza[1] != currentcustomer) {
		    row = document.getElementById("orders").insertRow(-1);
		    row = document.getElementById("orders").insertRow(-1);
		    row.style.verticalAlign = "bottom";
		    row.style.height = "50px";
		    var cell = row.insertCell(-1);
		    cell.innerHTML = "Order #" + pizza[1];

		    currentcustomer = pizza[1];
		    cell = row.insertCell(-1);
		    var btn = document.createElement("BUTTON");
		    btn.setAttribute("id", pizza[1] + " order");
		    btn.innerHTML = "Order #" + pizza[1];
		    btn.onclick = function() {

			var del =
			    document.getElementById(pizza[1] +
						    " order").parentNode.
			    parentNode;
			var index = del.rowIndex;
			if (document.getElementById("orders").
			    rows[index + 1].innerHTML.length == "") {
			    document.getElementById("orders").
				deleteRow(del.rowIndex - 1);
			    document.getElementById("orders").
				deleteRow(del.rowIndex);
			} else
			    alert("Items are not yet finished.");
		    }
		    cell.appendChild(btn);
		}

		row = document.getElementById("orders").insertRow(-1);

		var cell = row.insertCell(-1);
		cell.innerHTML = pizza[2];
		cell = row.insertCell(-1);
		cell.innerHTML = pizza[0];
		cell = row.insertCell(-1);
		var btn = document.createElement("BUTTON");
		btn.setAttribute("id", itemindex);
		btn.innerHTML = "Remove Item";
		btn.onclick = function() {
		    var x = document.getElementById(itemindex).value;
		    itemremove(x);
		    document.getElementById("orders").deleteRow(row.
								rowIndex);
		}
		cell.appendChild(btn);
		itemindex++;
	    }

	}
    }
    xhr.open("GET", "chef_Extract.php?pizza=" + itemindex);
    xhr.send(null);
}

function removeRow(x)
{
    var row = x.parentNode.parentNode;

}


function execute()
{

    setInterval(start_page, 300);

}

function itemremove(y)
{

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
	if (xhr.readyState == 4 && xhr.status == 200) {
	    var result = xhr.responseText;



	}
    }
    xhr.open("GET", "item_Remove.php?item=" + y);
    xhr.send(null);
}
