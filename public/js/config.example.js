window.config = {
	baseUrl: () => {
		return 'http://eschool.com'
	},
	getApiUrl : () => {
		return 'http://eschool.com/api/v1'
	}
} 

window.getParam = (name,url) => {
	return getParameterByName(name, url)
}

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}