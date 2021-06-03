require('./about_me.css');
import {Ant} from './components/slider/slider.js';

const updateBtn = document.getElementById('updateBtn');

updateBtn.addEventListener('click', async () => {
    const request = await fetch('update', {
        method: 'POST',
        body: JSON.stringify({})
    });
    
    let result = await request;

    if (result.status === 200) {
        location.reload();
    } else {
        alert("Ошибка");
    }
});

var items = document.getElementsByClassName("ant-carousel");
var slider = [];

items.forEach(element => {
	slider.push(new Ant(element.id));
});