function flipCard(element){
    if(element.classList.contains('animate__flipInY')){
        /* element.classList.remove('animate__flipInY');
        element.classList.add('animate__flipOutY'); */
    } else {
        /* element.classList.add('animate__flipInY');
        element.classList.remove('animate__flipOutY'); */
    }
    element.classList.toggle('is-flipped');
}