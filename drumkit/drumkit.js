'use strict';

const sons = {
    'A': 'boom.wav',
    'S': 'clap.wav',
    'D': 'hihat.wav',
    'F': 'kick.wav',
    'G': 'openhat.wav',
    'H': 'ride.wav',
    'J': 'snare.wav',
    'K': 'tink.wav',
    'L': 'tom.wav'
}

const criarDiv = (texto) => {
    const div = document.createElement('div');

    div.classList.add('key');
    div.textContent = texto;
    div.id = texto;

    document.getElementById('container').appendChild(div);
}

const exibir = (sons) => {
    Object.keys(sons).forEach(criarDiv);
}

const tocarSom = (letra) => {
    const audio = new Audio(`./sounds/${sons[letra]}`);
    audio.play();
}

const ativarEfeito = (letra) => {
    document.getElementById(letra).classList.toggle('active');
}

const desativarEfeito = (letra) => {
    const div = document.getElementById(letra);
    div.addEventListener('transitionend', () => {div.classList.remove('active');})
}

const executar = (event) => {
    let letra = '';

    if (event.type == 'click') {
        letra = event.target.id;
    }
    else {
        letra = event.key.toUpperCase();
    }

    if (sons.hasOwnProperty(letra)) {
        ativarEfeito(letra);
        tocarSom(letra);
        desativarEfeito(letra);
    }
}

exibir(sons);

document.getElementById('container').addEventListener('click', executar);

window.addEventListener('keydown', executar);