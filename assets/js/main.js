/* const btnTypeClick = document.querySelectorAll(".btnTypeClick");
for (const button of btnTypeClick) {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        const typeValue = this.querySelector('input');
        if(typeValue.checked == true){
            this.classList.add('buttonTypeActive');
        } else {
            this.classList.add('buttonTypeActive');
        }
    });
} */

function btnSelectType(element){
    var btnTypeClick = document.querySelectorAll(".btnTypeClick");
    for(const elements of btnTypeClick){
        elements.classList.remove('buttonTypeActive');
    }
    if(element.querySelector('input').value == 'people') {
        /* fadeIn(document.querySelector('form.peopleForm')); */
        fade(document.querySelector('form.ongForm'), document.querySelector('form.peopleForm'));
        console.log('esconde ong e mostra people');
    } else {
        /* document.querySelector('form.ongForm').fadeOut();
        document.querySelector('form.peopleForm').fadeIn(); */
        /* fadeIn(document.querySelector('form.ongForm')); */
        fade(document.querySelector('form.peopleForm'), document.querySelector('form.ongForm'));
        console.log('esconde people e mostra ong');
    }
    element.classList.add('buttonTypeActive');
}

function fade(element, secondElement) {
    var op = 1;  // initial opacity
    var timer = setInterval(function () {
        if (op <= 0.1){
            clearInterval(timer);
            element.style.display = 'none';
            fadeIn(secondElement);
        }
        element.style.opacity = op;
        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
        op -= op * 0.1;
    }, 20);
}

function fadeIn(element) {
    var op = 0.1;  // initial opacity
    element.style.display = 'flex';
    var timer = setInterval(function () {
        if (op >= 1){
            clearInterval(timer);
        }
        element.style.opacity = op;
        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
        op += op * 0.1;
    }, 20);
}


    /* console.log('elemento clicado');
    document.querySelectorAll('.btnTypeClick').classList.remove('buttonTypeActive');
    btnTypeClick.classList.add('buttonTypeActive'); */

/* $('.tipoClick').click(function(){
    if($("#pessoaFisica").is(":checked")) {
        $('.btnJuridicaLabel').removeClass('buttonVerde');
        $('.btnFisicaLabel').addClass('buttonVerde');
        $('#inputDado').removeClass('cnpjMask');
        $('#inputDado').addClass('cpfMask');
        $('#labelDado').text('CPF');
        $('#labelNome').text('Nome');
        $('#inputName').attr({placeholder:"Jorge"});
        $('#inputName').attr('name', 'nome');
        $('#inputDado').attr({placeholder:"000.000.000-00"});
        $('#inputDado').attr('name', 'cpf');
    } else {
        $('.btnFisicaLabel').removeClass('buttonVerde');
        $('.btnJuridicaLabel').addClass('buttonVerde');
        $('#inputDado').removeClass('cpfMask');
        $('#inputDado').addClass('cnpjMask');
        $('#labelNome').text('Razão Social');
        $('#inputName').attr({placeholder:"Maria Inc"});
        $('#labelDado').text('CNPJ');
        $('#inputDado').attr({placeholder:"00.000.000/0000-00"});
        $('#inputDado').attr('name', 'cnpj');
    }
}); */