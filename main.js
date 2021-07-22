let camSpec = document.getElementById("formSpeCamion");
let voitSpec = document.getElementById("formSpeVoiture");

window.addEventListener("load", init);

function init() {

    if (document.getElementById('vehicTypeVoit').checked) {
        camSpec.setAttribute('hidden', true);
        voitSpec.removeAttribute('hidden');

    } else {
        voitSpec.setAttribute('hidden', true);
        camSpec.removeAttribute('hidden');
    }
}

let vehicType = document.getElementsByName("vehicType");
for (let radio of vehicType) {
    radio.addEventListener('change', function (ev) {
        camSpec.toggleAttribute('hidden');
        voitSpec.toggleAttribute('hidden');
    })
}
