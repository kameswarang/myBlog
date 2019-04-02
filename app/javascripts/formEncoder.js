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
