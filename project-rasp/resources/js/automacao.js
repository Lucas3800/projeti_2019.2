function activeRele1() {
    const estado = document.getElementById('estado').innerHTML
    if(estado === '0') {
        document.getElementById('estado').innerHTML='1'
        document.getElementById('rele').innerHTML="<div class='rele1_ativado'></div>"
            document.getElementById('botao').innerHTML="<a href='/?desligar' class='botao'>Desliga</a>"
    } else {
        document.getElementById("estado").innerHTML="0";
        document.getElementById("rele").innerHTML="<div class='rele1_desligado'></div>";
        document.getElementById("botao").innerHTML="<a href='/?ligar' class='botao'>Liga</a>";
    }
}

function activeRele2() {
    const estado_2 = document.getElementById('estado_2').innerHTML
    if(estado_2 === '1') {
        document.getElementById('estado_2').innerHTML='1'
        document.getElementById('rele_2').innerHTML="<div class='rele2_ativado'></div>"
            document.getElementById('botao_2').innerHTML="<a href='/desligar_2' class='botao_2'>Desliga</a>"
    } else {
        document.getElementById("estado").innerHTML="0";
        document.getElementById("rele_2").innerHTML="<div class='rele2_desligado'></div>";
        document.getElementById("botao_2").innerHTML="<a href='/?ligar_2' class='botao_2'>Liga</a>";
    }
}