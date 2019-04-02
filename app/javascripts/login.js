function encode(form) {
    var elements = Array.from(form.elements)
    var encodedData = ""
    
    elements.forEach(function(el) {
        if(el.type == 'submit' || el.type == 'button') {
            return
        }
        encodedData += encodeURI(el.name + '=' + el.value + '&')
    })
    
    return encodedData
}   

var form = document.getElementById("loginForm")

form.addEventListener('submit', function(e) {
    e.preventDefault();
    
    var postLogin = new XMLHttpRequest()
    
    postLogin.addEventListener('readystatechange', function() {
        if(postLogin.readyState == 4) {
            if(postLogin.status == 200) {
                try {
                    var res = JSON.parse(postLogin.responseText)
                }
                catch(e) {
                    console.log(e);
                    console.log("Bad Response: " + postLogin.responseText);
                    return;
                }
                
                if(res.status == 'success') {
                    var temp
                    if(temp = document.getElementById("prompt")) {
                        temp.parentNode.removeChild(temp)
                    }
                    window.location.href = "home.php"
                }
                else if(res.status == 'fail') {
                    if(!document.getElementById("prompt")) {
                        var prompt = document.createElement('p')
                        prompt.id = "prompt"
                        prompt.className = "pInMiddle"
                        prompt.innerText = 'Incorrect username or password. Try again.'
                        form.insertBefore(prompt, document.getElementById("submit"))
                    }
                }
            }
            else {
                var prompt = document.createElement('p')
                prompt.className = "pInMiddle"
                prompt.innerText = 'Unable to login. Try after sometime.'
                form.insertBefore(prompt, document.getElementById("submit"))
            }
        }
    })
    
    postLogin.open('POST', 'authUser.php')  
    postLogin.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    postLogin.send(encode(form))
})