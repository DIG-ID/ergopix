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
			var zimmer02Swiper = new Swiper(".zimmer-gallery-1", {
				loop: true,
				parallax: true,
				speed: 800,
				autoplay: {
					delay: 3000,
				},
				navigation: {
					nextEl: ".zimmer-gallery-button-next-1",
					prevEl: ".zimmer-gallery-button-prev-1",
				},
			});
			var zimmer03Swiper = new Swiper(".zimmer-gallery-2", {
				loop: true,
				parallax: true,
				speed: 800,
				autoplay: {
					delay: 3000,
				},
				navigation: {
					nextEl: ".zimmer-gallery-button-next-2",
					prevEl: ".zimmer-gallery-button-prev-2",
				},
			});
			var zimmer04Swiper = new Swiper(".zimmer-gallery-3", {
				loop: true,
				parallax: true,
				speed: 800,
				autoplay: {
					delay: 3000,
				},
				navigation: {
					nextEl: ".zimmer-gallery-button-next-3",
					prevEl: ".zimmer-gallery-button-prev-3",
				},
			});
		}


	}, false);
});