function getUrlParameter(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
}

console.log('Script loaded');

document.addEventListener('DOMContentLoaded', () => {
    console.log('DOMContentLoaded event fired');
    var success = getUrlParameter('success');
    console.log('Success:', success);
    if (success === '1') {
        document.querySelector('.message').style.display = 'block';
    } else if (success === '0') {
        document.querySelector('.error').style.display = 'block';
    }
});
