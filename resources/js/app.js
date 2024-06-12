import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

const deleteButtons = document.querySelectorAll('.delete');

const modal = document.getElementById('modal');

const closeElements = document.querySelectorAll('.close');


for(let i = 0; i < deleteButtons.length; i++){

    const deleteButton = deleteButtons[i];

    deleteButton.addEventListener('click', function(){
    
        modal.classList.add('visible');
    });
}


for(let i = 0; i < closeElements.length; i++){

    const close = closeElements[i];

    close.addEventListener('click', function(){
    
        modal.classList.remove('visible');
    });
}