function dovalidate(){  
    var x=document.forms["myform"]["firstname"].value;
    if(x=="" ){
        alert("PLEASE PROVIDE YOUR NAME");
        return false;
    } 
    var r = document.forms["myform"]["password"].value;
      if (r == "") {
        alert("PLEASE PROVIDE YOUR PASSWORD");
        return false;
    }
    return true;

}