function Show_HidePassword() {
        var element = document.getElementById('password');
        if(element.value!="") {
            if (element.type == 'password') {
                var inp = document.createElement("input");
                inp.id = "password";
                inp.type = "text";
                inp.value = element.value;
                inp.name = "password";
                inp.class = "input ";
                element.parentNode.replaceChild(inp, element);
            }
            else {
                var inp = document.createElement("input");
                inp.id = "password";
                inp.type = "password";
                inp.value = element.value;
                inp.name = "password";
                inp.class = "input ";
                element.parentNode.replaceChild(inp, element);
            }
            inp.focus();
            inp.selectionEnd = inp.value.length;
        }
    }
