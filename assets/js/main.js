function btnSelectType(element){
    var btnTypeClick = document.querySelectorAll(".btnTypeClick");
    for(const elements of btnTypeClick){
        elements.classList.remove('buttonTypeActive');
    }
    if(element.querySelector('input').value == 'people') {
        /* fadeIn(document.querySelector('form.peopleForm')); */
        fade(document.querySelector('form.ongForm'), document.querySelector('form.peopleForm'), 'flex');
    } else {
        /* document.querySelector('form.ongForm').fadeOut();
        document.querySelector('form.peopleForm').fadeIn(); */
        /* fadeIn(document.querySelector('form.ongForm')); */
        fade(document.querySelector('form.peopleForm'), document.querySelector('form.ongForm'), 'block');
    }
    element.classList.add('buttonTypeActive');
}

function nextStep(element){
    var nextStep = element.getAttribute('data-next');
    var thisStep = element.getAttribute('data-step');
    var nextProgresStep = document.querySelector('[data-step="'+nextStep+'"]');
    var thisProgresStep = document.querySelector('[data-step="'+thisStep+'"]');
    var nextProgressElement = nextProgresStep.querySelector('.progress-bar');
    var thisProgressElement = thisProgresStep.querySelector('.progress-bar');
    nextProgressElement.setAttribute('style', 'width: 100%');
    nextProgressElement.setAttribute('aria-valuenow', '100');
    nextProgressElement.setAttribute('aria-valuemax', '100');
    thisProgressElement.setAttribute('style', 'width: 0%');
    thisProgressElement.setAttribute('aria-valuenow', '0');
    thisProgressElement.setAttribute('aria-valuemax', '0');
    setTimeout(function(){thisProgresStep.classList.remove('progressActived')}, 700);
    nextProgresStep.classList.add('progressActived');

    fade( document.querySelector('.'+thisStep), document.querySelector('.'+nextStep), 'flex');
}

function fade(element, secondElement, displayStyle) {
    var op = 1;
    var timer = setInterval(function () {
        if (op <= 0.1){
            clearInterval(timer);
            element.style.display = 'none';
            fadeIn(secondElement, displayStyle);
        }
        element.style.opacity = op;
        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
        op -= op * 0.1;
    }, 20);
}

function fadeIn(element, displayStyle) {
    var op = 0.1;
    element.style.display = displayStyle;
    var timer = setInterval(function () {
        if (op >= 1){
            clearInterval(timer);
        }
        element.style.opacity = op;
        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
        op += op * 0.1;
    }, 20);
}

function inputHandler(masks, max, event) {
	var c = event.target;
	var v = c.value.replace(/\D/g, '');
	var m = c.value.length > max ? 1 : 0;
	VMasker(c).unMask();
	VMasker(c).maskPattern(masks[m]);
	c.value = VMasker.toPattern(v, masks[m]);
}

var telMask = ['(99) 9999-99999', '(99) 99999-9999'];
var tel = document.querySelectorAll('.phoneNumber');
for(const elements of tel){
    VMasker(elements).maskPattern(telMask[0]);
    elements.addEventListener('input', inputHandler.bind(undefined, telMask, 14), false);
}

var doc = document.getElementById('cnpjLabel');
/* var docMask = ['999.999.999-999', '99.999.999/9999-99']; */
var docMask = ['99.999.999/9999-99', '99.999.999/9999-99'];
VMasker(doc).maskPattern(docMask[0]);
doc.addEventListener('input', inputHandler.bind(undefined, docMask, 14), false);

var cep = document.getElementById('cepLabel');
VMasker(cep).maskPattern('99999-999');
doc.addEventListener('input', inputHandler.bind(undefined, docMask, 9), false);

function setInputFilter(textbox, inputFilter) {
    ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
        textbox.addEventListener(event, function() {
            if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
            } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            } else {
                this.value = "";
            }
        });
    });
}

setInputFilter(document.getElementById("numeroLabel"), function(value) {
    return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
});

/* $.ajax({
    'url': 'https://www.receitaws.com.br/v1/cnpj/39336273000147',
    'type': "GET",
    'dataType': 'jsonp',
    'success': function(dado){
        console.log(dado);
    }
}); */

function jsonp(url, callback) {
    var callbackName = 'jsonp_callback_' + Math.round(100000 * Math.random());
    window[callbackName] = function(data) {
        delete window[callbackName];
        document.body.removeChild(script);
        callback(data);
    };

    var script = document.createElement('script');
    script.src = url + (url.indexOf('?') >= 0 ? '&' : '?') + 'callback=' + callbackName;
    document.body.appendChild(script);
}

function checkCnpj(cnpj) {
    jsonp('https://www.receitaws.com.br/v1/cnpj/' + cnpj.replace(/[^0-9]/g, ''), function(data) {
        console.log(data);
        document.getElementById('razaoLabel').value = data['nome'];
        document.getElementById('fantasiaLabel').value = data['fantasia'];
        document.getElementById('cepLabel').value = data['cep'];
        document.getElementById('logradouroLabel').value = data['logradouro'];
        document.getElementById('numeroLabel').value = data['numero'];
        document.getElementById('complementoLabel').value = data['complemento'];
        document.getElementById('bairroLabel').value = data['bairro'];
        document.getElementById('cidadeLabel').value = data['municipio'];
        document.getElementById('estadoLabel').value = data['uf'];
    });
}