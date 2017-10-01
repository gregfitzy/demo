function changeColor() {
    var textColor = 'blue';
    var borderColor = 'red';
    
    if (document.getElementById("our_demo_id").style.color === 'blue') {
        textColor = 'red';
        borderColor = 'blue';
    }
    
    document.getElementById("our_demo_id").style.color = textColor;
    document.getElementById("our_demo_id").style.borderColor = borderColor;
}