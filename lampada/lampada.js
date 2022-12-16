const btn = document.getElementById('btn');

const lampada = document.getElementById('lampada');

function isBroken ()
{
    return lampada.src.indexOf('quebrada') > -1;
}

function isOff ()
{
    return lampada.src.indexOf('desligada') > -1;
}

function ligar ()
{
    if (!isBroken()) {
        lampada.src = './img/ligada.jpg';
        btn.textContent = 'Desligar';
    }
}

function desligar ()
{
    if (!isBroken()) {
        lampada.src = './img/desligada.jpg';
        btn.textContent = 'Ligar';
    }
}

function quebrar () {
    lampada.src = './img/quebrada.jpg'
}

function alterar ()
{
    if (!isOff()) {
        desligar();
    }
    else {
        ligar();
    }
}

lampada.addEventListener('mouseover', ligar);
lampada.addEventListener('mouseleave', desligar);
lampada.addEventListener('dblclick', quebrar);

btn.addEventListener('click', alterar);