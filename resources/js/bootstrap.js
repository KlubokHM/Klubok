//СИЛА ГУГЛ ПЕРЕВОДЧИКА
window._ = require('lodash');

/**
 * Мы загрузим jQuery и плагин Bootstrap jQuery, который обеспечивает поддержку
 * функций Bootstrap на основе JavaScript, таких как модалы и вкладки. Этот код
 * может быть изменен в соответствии с конкретными потребностями вашего приложения.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

/**
 Мы загрузим HTTP-библиотеку axios, которая позволяет нам легко отправлять запросы
 на наш сервер Laravel. Эта библиотека автоматически обрабатывает отправку токена
 CSRF в виде заголовка на основе значения файла cookie токена "XSRF".
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });
