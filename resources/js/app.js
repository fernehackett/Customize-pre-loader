require('./bootstrap');
window.$ = window.Jquery = require('jquery');
import 'egalink-toasty.js/src/toasty';
let options = {
    classname: "toast",
    transition: "pinItDown",
    insertBefore: true,
    duration: 4200,
    enableSounds: false,
    autoClose: true,
    progressBar: true,
    sounds: {
        // path to sound for informational message:
        info: "/vendor/toasty/sounds/info/1.mp3",
        // path to sound for successfull message:
        success: "/vendor/toasty/sounds/success/2.mp3",
        // path to sound for warn message:
        warning: "/vendor/toasty/sounds/warning/3.mp3",
        // path to sound for error message:
        error: "/vendor/toasty/sounds/info/3.mp3",
    },
    onShow: function (type) {},
    onHide: function (type) {},
    prependTo: document.body.childNodes[0]
};
window.myToast = new Toasty(options);
