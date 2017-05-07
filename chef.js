var itemindex = 0;
var currentcustomer;

function start_page()
{
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
	if (xhr.readyState == 4 && xhr.status == 200) {
            var result = xhr.responseText;
            var pizza = result.split('.');
            // Second check prevents race condition from having an impact
            // JS may request same item from PHP 2+ times before receiving response
            // But itemindex will be higher than DB id (pizza[3]) if this occurs
            if (pizza[0] != 0 && pizza[3] >= itemindex) {
                // If itemindex != the id of the row in the DB,
                // assign it to be that so the button id assigned later is correct
                itemindex = pizza[3];

                row = document.getElementById("orders").insertRow(-1);

                // Phone #
                var cell = row.insertCell(-1);
                cell.innerHTML = pizza[4];
                // Item type
                cell = row.insertCell(-1);
                cell.innerHTML = pizza[2];
                // Item descriptors
                cell = row.insertCell(-1);
                cell.innerHTML = pizza[0];
                // Delete button
                cell = row.insertCell(-1);
                var btn = document.createElement("BUTTON");
                
                // Can't set to itemindex here, has to be actual DB id of item
                
                btn.setAttribute("id", itemindex);
                btn.innerHTML = "Remove Item";
                btn.onclick = function() {
                    let id = this.id;
                    itemremove(id);
                    let row = this.parentNode.parentNode;
                    // DOM4 feature
                    row.remove();
                    if(orders.lastChild.innerHTML == "") {
                        document.getElementById("empty_message").style.display = "inline";
                    }
                }
                cell.appendChild(btn);
                document.getElementById("empty_message").style.display = "none";
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
