console.log('Hello, world');
import axios from 'axios';

window.addEventListener('load', () => {
    if (document.querySelector('#users')) {
        axios.get('https://jsonplaceholder.typicode.com/users')
            .then(res => {
                let html = '';
                res.data.forEach(user => {
                    '<li>' + user.name + '</li>';
                });
                document.querySelector('#users').innerHTML = html;
            })
    }
});