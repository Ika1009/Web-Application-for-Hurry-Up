
let ime;
document.getElementById("dugme").onclick = function()
{
    ime = document.getElementById("textBox").value;
    document.getElementById("paragraf").innerHTML = ime;

}
