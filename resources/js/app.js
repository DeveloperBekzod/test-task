import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

if(document.getElementById('x')){
    document.getElementById('x').addEventListener('click', (e)=>{e.target.parentElement.remove()})
}
