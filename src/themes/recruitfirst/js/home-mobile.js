import Swiper, {Pagination} from 'swiper'
import {gsap} from "gsap"
import {DrawSVGPlugin} from "gsap/DrawSVGPlugin"
import {ScrollTrigger} from "gsap/ScrollTrigger"

gsap.registerPlugin(DrawSVGPlugin, ScrollTrigger)
Swiper.use([Pagination])

// gsap.utils.toArray('.video-container video').forEach(video => {
// 	const id = video.getAttribute('id')
// 	// videojs(id, {autoplay: true});
// 	// seeThru.create(id);
// 	$(id).seeThru().seeThru('play');
// })

// document.addEventListener('DOMContentLoaded', function() {
// 	seeThru.create('#staticAlphaDemo', {
// 		mask: '#staticAlphaMask'
// 	});
// });

const handleScrollDown = () => {
	gsap.to('.home-s1__scroll', {
		opacity: 0,
		scrollTrigger: {
			trigger: '.home-s1',
			start: 'top top',
			end: 'bottom center',
			scrub: true,
			markers: false
		}
	})
}

const jobsSlider = () => {
	const mySwiper = new Swiper('.job-list__container', {
		slidesPerView: 'auto',
		spaceBetween: 16,
		pagination: {
			el: '.swiper-pagination',
			clickable: true
		}
	})
}

const homes2Slider = () => {
	const icons = document.querySelectorAll('.home-s2__steps-icon')
	let prevIndex = 0
	const mySwiper = new Swiper('.home-s2__content-wrapper', {
		slidesPerView: 'auto',
		on: {
			slideChange: (swiper => {
				icons[swiper.activeIndex].classList.add('active')
				icons[prevIndex].classList.remove('active')
				prevIndex = swiper.activeIndex
			}),
			activeIndexChange: (swiper) => {
				console.log(swiper.activeIndex, 'swiper')
			}
		}
	})

	$('.home-s2__steps-icon').click(function (e) {
		e.preventDefault()
		const index = $(this).data('index')
		$(this).addClass('active')
		$(this).siblings('span').removeClass('active')


		mySwiper.slideTo(index)
	})
}

const testimonial = () => {
	const mySwiper = new Swiper('.home-s4__testimonial-slider', {
		slidesPerView: 'auto',
		spaceBetween: 16,
		pagination: {
			el: '.swiper-pagination',
			clickable: true
		}
	})
}

handleScrollDown()
homes2Slider()
jobsSlider()
testimonial()
