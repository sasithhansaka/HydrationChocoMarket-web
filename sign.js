function dovalidate() {  
    var x = document.forms["myform"]["firstname"].value;
    if (x == "") {
        alert("PLEASE PROVIDE YOUR NAME");
        return false;
    } 
    var r = document.forms["myform"]["password"].value;
    if (r == "") {
        alert("PLEASE PROVIDE YOUR PASSWORD");
        return false;
    }
    var e = document.forms["myform"]["email"].value;
    if (e == "") {
        alert("PLEASE PROVIDE YOUR EMAIL ADDRESS");
        return false;
    } 
    var address = document.forms["myform"]["address"].value;
    if (address == "") {
        alert("PLEASE PROVIDE YOUR ADDRESS");
        return false;
    }
    return true;
}
