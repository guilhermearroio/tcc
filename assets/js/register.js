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