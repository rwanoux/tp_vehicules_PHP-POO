// the two special parts of the form 
let camSpec = document.getElementById("formSpeCamion");
let voitSpec = document.getElementById("formSpeVoiture");

window.addEventListener("load", init);
//once load i init the display of special parts
function init() {

    if (document.getElementById('vehicTypeVoit').checked) {
        camSpec.setAttribute('hidden', true);
        voitSpec.removeAttribute('hidden');

    } else {
        voitSpec.setAttribute('hidden', true);
        camSpec.removeAttribute('hidden');
    }
}
//when we change the vehicule type the special form parts toggles
let vehicType = document.getElementsByName("vehicType");
for (let radio of vehicType) {
    radio.addEventListener('change', function (ev) {
        camSpec.toggleAttribute('hidden');
        voitSpec.toggleAttribute('hidden');
    })
}
