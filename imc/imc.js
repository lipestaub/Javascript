const calcular = document.getElementById('calcular');

function imc ()
{
    const nome = document.getElementById('nome').value;
    const altura = document.getElementById('altura').value;
    const peso = document.getElementById('peso').value;
    const resultado = document.getElementById('resultado');

    if (nome !== '' && altura !== '' && peso !== '') {
        const imc = (peso / Math.pow(altura, 2)).toFixed(1);
        let classificacao = '';

        if (imc < 18.5) {
            classificacao = 'magreza';
        }
        else if (imc <= 24.9) {
            classificacao = 'normal';
        }
        else if (imc <= 29.9) {
            classificacao = 'sobrepeso';
        }
        else if (imc <= 39.9) {
            classificacao = 'obesidade';
        }
        else {
            classificacao = 'obesidade grave';
        }

        resultado.textContent = `${nome}, o valor do seu IMC é ${imc}, sua classificação está em ${classificacao}`;
    }
    else {
        resultado.textContent = 'Preencha todos os campos!';
    }
}

calcular.addEventListener('click', imc);