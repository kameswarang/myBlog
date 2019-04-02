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

var form = document.getElementById("addForm")

form.addEventListener('submit', function(e) {
    e.preventDefault();
    
    var postAdd = new XMLHttpRequest()
    
    postAdd.addEventListener('readystatechange', function() {
        if(postAdd.readyState == 4) {
            if(postAdd.status == 200) { 
                var res = JSON.parse(postAdd.responseText);
                if(res.status == 'success') {
                    var temp
                    if(temp = document.getElementById("prompt")) {
                        temp.parentNode.removeChild(temp)
                    }
                    window.location.href = "home.php"
                }
                else if(res.status == 'slug exists') {
                    if(!document.getElementById("prompt")) {
                        var prompt = document.createElement('p')
                        prompt.id = "prompt"
                        prompt.innerText = 'Slug already exists. Try with a different slug.'
                        prompt.className = "pInMiddle"
                        form.insertBefore(prompt, document.getElementById("submit"))
                    }
                }
                else if(res.status ==  'fail') {
                    if(!document.getElementById("prompt")) {
                        var prompt = document.createElement('p')
                        prompt.className = "pInMiddle"
                        prompt.innerText = 'Failed to create story. Try after sometime.'
                        form.insertBefore(prompt, document.getElementById("submit"))
                    }
                }
            }
            else {
                console.log("There was a problem: " + postAdd.responseText)
            }
        }
    })
    
    postAdd.open('POST', 'addPost.php')  
    postAdd.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    postAdd.send(encode(form))
})