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
    var getNextStep = element.getAttribute('data-next');
    var getThisStep = element.getAttribute('data-step');
    /* var getAllSteps = document.querySelectorAll('.step'); */
    fade( document.querySelector('.'+getThisStep), document.querySelector('.'+getNextStep), 'flex');
}

function fade(element, secondElement, displayStyle) {
    var op = 1;  // initial opacity
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
    var op = 0.1;  // initial opacity
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