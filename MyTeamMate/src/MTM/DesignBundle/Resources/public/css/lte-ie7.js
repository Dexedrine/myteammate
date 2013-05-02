/* Load this script using conditional IE comments if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'icomoon\'">' + entity + '</span>' + html;
	}
	var icons = {
			'icon-mail' : '&#xe000;',
			'icon-key' : '&#xe001;',
			'icon-locked' : '&#xe002;',
			'icon-user' : '&#xe003;',
			'icon-home' : '&#xe004;',
			'icon-checkmark' : '&#xe005;',
			'icon-camera' : '&#xe006;',
			'icon-location' : '&#xe007;',
			'icon-trashcan' : '&#xe008;',
			'icon-list' : '&#xe009;',
			'icon-trophy' : '&#xe00b;',
			'icon-star' : '&#xe00c;',
			'icon-star-2' : '&#xe00d;',
			'icon-cog' : '&#xe00a;',
			'icon-enter' : '&#xe00e;',
			'icon-accessibility' : '&#xe00f;',
			'icon-heart' : '&#xe010;',
			'icon-heart-2' : '&#xe011;'
		},
		els = document.getElementsByTagName('*'),
		i, attr, html, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		attr = el.getAttribute('data-icon');
		if (attr) {
			addIcon(el, attr);
		}
		c = el.className;
		c = c.match(/icon-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
};