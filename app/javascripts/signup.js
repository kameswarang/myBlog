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

var form = document.getElementById("signupForm")

form.addEventListener('submit', function(e) {
    e.preventDefault();
    
    var postSignup = new XMLHttpRequest()
    
    postSignup.addEventListener('readystatechange', function() {
        if(postSignup.readyState == 4) {
            if(postSignup.status == 200) {
                var res = JSON.parse(postSignup.responseText);
                if(res.status == 'success') {
                    var temp
                    if(temp = document.getElementById("prompt")) {
                        temp.parentNode.removeChild(temp)
                    }
                    window.location.href = "home.php"
                }
                else if(res.status == 'username exists') {
                    if(!document.getElementById("prompt")) {
                        var prompt = document.createElement('p')
                        prompt.id="prompt"
                        prompt.className = "pInMiddle"
                        prompt.innerText = 'Username already exists. Try with a different username.'
                        form.insertBefore(prompt, document.getElementById("submit"))
                    }
                }
                else if(res.status ==  'fail') {
                    var prompt = document.createElement('p')
                    prompt.className = "pInMiddle"
                    prompt.innerText = 'Failed to signup. Try after sometime.'
                    form.insertBefore(prompt, document.getElementById("submit"))
                }
            }
            else {
                console.log("There was a problem: " + postSignup.responseText)
            }
        }
    })
    
    postSignup.open('POST', 'addUser.php')  
    postSignup.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    postSignup.send(encode(form))
})