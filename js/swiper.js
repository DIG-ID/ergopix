import Swiper from 'swiper/bundle';
// wait until DOM is ready
document.addEventListener("DOMContentLoaded", () => {
	//wait until images, links, fonts, stylesheets, and js is loaded
	window.addEventListener("load", () => {

		if (document.body.classList.contains("page-template-page-zimmer")) {
			var zimmerSwiper = new Swiper(".zimmer-gallery-0", {
				loop: true,
				parallax: true,
				speed: 800,
				autoplay: {
					delay: 3000,
				},
				navigation: {
					nextEl: ".zimmer-gallery-button-next-0",
					prevEl: ".zimmer-gallery-button-prev-0",
				},
			});
		}


	}, false);
});