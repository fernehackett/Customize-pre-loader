<script>
let contentCss = "{{ $loader->contentCSS }}"
let contentHTML = "{{ $loader->contentHTML }}"
let body = document.body || document.getElementsByName('body')

let loaderContainer = document.createElement('div');
loaderContainer.setAttribute('id', 'eop-loader');
loaderContainer.setAttribute('style', 'width: 100%; height: 100%; background-color: {{ $setting->background_hex }}; position: fixed; z-index: 9999999999');
loaderContainer.innerHTML = contentHTML;
body.prepend(loaderContainer);
window.addEventListener('load', () => {
    setTimeout(() => {
        fadeOutEffect();
    }, {{ block.settings.loader_time }});
});
function fadeOutEffect() {
    let fadeTarget = document.getElementById("eop-loader");
    let fadeEffect = setInterval(function () {
        if (!fadeTarget.style.opacity) {
            fadeTarget.style.opacity = 1;
        }
        if (fadeTarget.style.opacity > 0) {
            fadeTarget.style.opacity -= 0.1;
            fadeTarget.remove();
        } else {
            clearInterval(fadeEffect);
        }
    }, 100);
}
console.log('poe');
</script>
