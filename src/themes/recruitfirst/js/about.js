import {gsap} from 'gsap'
import {ScrollTrigger} from "gsap/ScrollTrigger"
import Plyr from 'plyr'
import Swiper, {Pagination} from "swiper"

gsap.registerPlugin(ScrollTrigger)
Swiper.use([Pagination])

const player = new Plyr('#about-player')

function fixedContent() {

	gsap.defaults({overwrite: 'auto'})

	gsap.set(".about-features__img", {yPercent: -50})

	// gsap.set('.about-features__img--1', {autoAlpha: 1})

// Set up our scroll trigger
	const ST = ScrollTrigger.create({
		trigger: ".about-features__inner",
		start: "top top+=200px",
		end: "bottom bottom",
		onUpdate: getCurrentSection,
		pin: ".about-features__images",
	})

	const contentMarkers = gsap.utils.toArray(".about-features__content-text")

// Set up our content behaviors
	contentMarkers && contentMarkers.forEach(marker => {
		marker.content = document.querySelector(marker.dataset.markerContent)

		gsap.set(marker.content, {transformOrigin: "center"})

		marker.content.enter = function () {
			const bg = marker.content.dataset.bg
			gsap.fromTo(marker.content, {autoAlpha: 0, rotateY: -30}, {duration: 0.3, autoAlpha: 1, rotateY: 0})
			gsap.to('.about-features', {backgroundColor: bg, duration: 0.15})
		}

		marker.content.leave = function () {
			gsap.to(marker.content, {duration: 0.1, autoAlpha: 0})
		}

	})

// Handle the updated position
	let lastContent
	const offset = document.querySelector('.about-features').offsetTop

	function getCurrentSection() {
		let newContent
		const currScroll = scrollY

		// Find the current section
		contentMarkers && contentMarkers.forEach(marker => {
			if (currScroll + 200 > marker.offsetTop + offset) {
				newContent = marker.content
			}
		})

		// If the current section is different than that last, animate in
		if (newContent
			&& (lastContent == null
				|| !newContent.isSameNode(lastContent))) {
			// Fade out last section
			if (lastContent) {
				lastContent.leave()
			}

			// Animate in new section
			newContent.enter()

			lastContent = newContent
		}

	}

	const media = window.matchMedia("screen and (max-width: 600px)")
	ScrollTrigger.addEventListener("refreshInit", checkSTState)
	checkSTState()

	function checkSTState() {
		if (media.matches) {
			ST.disable()
		} else {
			ST.enable()
		}
	}
}

if (!is_mobile) {
	gsap.to(".about-stats__inner", {
		xPercent: -100,
		x: window.innerWidth,
		ease: "none",
		scrollTrigger: {
			trigger: ".about-stats",
			start: "top top",
			end: () => window.innerWidth * 4,
			scrub: true,
			pin: true,
			anticipatePin: 1,
		}
	})

	gsap.set('.about-team__rocket', {
		opacity: 0,
		yPercent: 50,
		xPercent: -50
	})
	gsap.to('.about-team__rocket', {
		opacity: 1,
		duration: 2,
		yPercent: 0,
		xPercent: 0,
		ease: 'power4.out',
		scrollTrigger: {
			trigger: ".about-team",
			start: "top bottom",
		}
	})

	fixedContent()

}

if (is_mobile) {

	const bgColors = ['#9048EB', '#F66F51', '#F9A133']

	const swiper = new Swiper('.about-features__slider', {
		pagination: {
			el: '.swiper-pagination'
		},
	})
	swiper.on('slideChange', function (swiper) {
		gsap.to('.about-features', {
			backgroundColor: bgColors[swiper.activeIndex]
		})
	})
}
