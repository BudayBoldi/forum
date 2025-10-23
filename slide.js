let image = document.getElementById("banner");
let link = document.getElementById("bannid");
const banners = ["banners/hungarikum.jpg", "banners/draga.jpg", "banners/tamogatas.jpg", "banners/ado1sz.jpg"];
const bannids = ["#", "#", "#", "#"];
let i = 0;

setInterval(function() {
	if (i < banners.length - 1) {
	    image.src = banners[i];
	    link.href = bannids[i];
	    i++;
	} else {
	    image.src = banners[i];
	    link.href = bannids[i];
	    i = 0;
	}
}, 5000);
