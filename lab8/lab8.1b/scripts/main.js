butt.onclick = function() {
    var a_ = document.getElementById('first').value;
    var b_ = document.getElementById('second').value;
    var c_ = document.getElementById('third').value;
    
    let a = Number(a_);
    let b = Number(b_);
    let c = Number(c_)

    var p = (a + b + c) / 2;
    var S = Math.sqrt(p * (p - a) * (p - b) * (p - c));
    document.getElementById('str').innerHTML="Площадь равна "+ S;
};