$(document).ready(function(){

});

function passShow() {
    var pass = document.getElementById("myPassword");
    if (pass.type === "password") {
        pass.type = "text";
    } else {
        pass.type = "password";
    }
  }