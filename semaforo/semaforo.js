const img = document.getElementById('img');
const buttons = document.getElementById('buttons');

let idCor = 0;
let idIntervalo = null;

const semaforo = ( event ) => {
    desligarAutomatico();
    ligar[event.target.id]();
}

const proximoId = () => {
    idCor = idCor < 2 ? idCor + 1 : 0;
}

const alterarCor = () => {
    const cores = ['vermelho', 'amarelo', 'verde']
    const cor = cores[idCor]

    ligar[cor]();

    proximoId();
}

const desligarAutomatico = () => {
    clearInterval(idIntervalo);
}

const ligar = {
    'vermelho': () => img.src = './img/vermelho.png',
    'amarelo': () => img.src = './img/amarelo.png',
    'verde': () => img.src = './img/verde.png',
    'automatico': () => idIntervalo = setInterval(alterarCor, 1000)
}

buttons.addEventListener('click', semaforo)