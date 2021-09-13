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