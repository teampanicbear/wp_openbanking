import {gsap} from "gsap"
import {ScrollTrigger} from 'gsap/ScrollTrigger'
import imagesLoaded from 'imagesloaded'
import $ from 'jquery'
import {checkRequiredFields} from "./utils"
import 'slick-carousel/slick/slick.min'
window.theme = window.theme || {}
gsap.registerPlugin(ScrollTrigger)

function employerCircle() {

	gsap.to('.employer-bubble-1', {rotate: 360, duration: 8, yoyo: true, repeat: -1})
	gsap.to('.employer-bubble-2', {rotate: 360, duration: 12, yoyo: true, repeat: -1})
	gsap.to('.employer-bubble-3', {rotate: 360, duration: 16, yoyo: true, repeat: -1})
	gsap.to('.employer-bubble-4', {rotate: 360, duration: 20, yoyo: true, repeat: -1})

	const icons = document.querySelectorAll('.employer-circle__icon')
	const items = document.querySelectorAll('.employer-circle__content-item')

	const handleChange = (prevSlide, activeSlide) => {
		icons[activeSlide].classList.add('active')
		icons[prevSlide].classList.remove('active')

		const prevItem = items[prevSlide]
		const currentItem = items[activeSlide]

		if (prevItem) {
			gsap.to(prevItem.querySelectorAll('.line'), {
				duration: 0.5,
				y: '-100%',
				stagger: {
					from: "start",
					each: 0.1
				},
				onComplete: function () {
					gsap.set(this._targets, {y: '100%'})
				}
			})
		}
		if (currentItem) {
			gsap.to(currentItem.querySelectorAll('.line'), {
				delay: 0.3,
				duration: 0.5,
				y: '0%',
				stagger: {
					from: "start",
					each: 0.1
				}
			})
		}
	}

	const slider = $('.employer-circle__content').slick({
		infinite: true,
		slidesToShow: 1,
		fade: true,
		arrows: false,
		autoplay: true,
		draggable: false,
		autoplaySpeed: 4000
	})

	gsap.set(items[0].querySelectorAll('.line'), {y: '0%'})
	slider.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
		console.log(currentSlide, 'currentSlide')
		handleChange(currentSlide, nextSlide)
	})

	const handleClick = (evt, index) => {
		evt.preventDefault()
		slider.slick('slickGoTo', index)
	}

	for (let [index, item] of icons.entries()) {
		item.addEventListener('click', (evt) => handleClick(evt, index))
	}

	slider.slick('slickPause')

	ScrollTrigger.create({
		trigger: '.employer-section__header',
		start: 'top center',
		onEnter: () => {
			slider.slick('slickPlay')
		},
		markers: false
	})
}

function expertFields() {
	const cards = $('.field-card')
	const container = $('.experts__field')

	const $grid = $('.experts__field').isotope({
		itemSelector: '.field-card',
		layoutMode: 'fitRows',
		percentPosition: true
	})

	let showThese
	$('.experts__header').on('click', 'a', function (e) {
		e.preventDefault()
		$(this).siblings('a').removeClass('active')
		$(this).addClass('active')
		const target = $(this).attr('href')
		handleChange(target)
	})

	$('.experts__header [name="industries"]').on('change', function () {
		const target = $(this).val()
		handleChange(target)
	})

	function handleChange(target) {
		$grid.isotope({ filter: target });
	}

}

function howItWorks() {
	let offsetTop = 0

	if (!is_mobile) {
		imagesLoaded(document.querySelector('.how__rocket'), function () {
			offsetTop = window.outerHeight - document.querySelector('.how__rocket').clientHeight - 150
			gsap.set('.how__rocket-wrapper', {top: offsetTop})
		})

		gsap.to('.how__nav', {
			opacity: 1,
			scrollTrigger: {
				trigger: '.how',
				start: 'top-=100px',

				end: '+=100px',
				scrub: true
			}
		})

		const steps = gsap.utils.toArray('.how__step')
		const navItems = document.querySelectorAll('.how__nav a')
		steps.forEach(function (step, index) {
			gsap.to(step, {
				opacity: 1,
				scrollTrigger: {
					trigger: step,
					start: 'top top+=' + (window.outerHeight - 100) + 'px',
					end: '+=' + (step.clientHeight + 100),
					scrub: true,
					onToggle: ({isActive}) => {
						if (isActive) {
							$(navItems[index]).siblings('a').removeClass('active')
							$(navItems[index]).addClass('active')
						}
					}
				}
			})
		})
	}

	const circles = gsap.utils.toArray('.how__rocket-circle span')
	gsap.set(circles, {scale: 0, opacity: 0.5})

	circles.forEach(function (circle, index) {
		const TL = gsap.timeline({paused: false, repeat: -1, repeatDelay: 0, delay: index * 0.5})
		TL.to(circle, {
			scale: 1.5,
			opacity: 0,
			duration: 4
		})
	})
}

function parallaxBtn() {
	const $parallaxBtn = $('.parallax-btn')
	const circle1 = document.querySelector('.employer-cta__inner .first')
	const circle2 = document.querySelector('.employer-cta__inner .second')
	const circle3 = document.querySelector('.employer-cta__inner .third')
	const circle4 = document.querySelector('.employer-cta__inner .fourth')
	const btn = document.querySelector('.parallax-btn')
	const btnIcon = document.querySelector('.parallax-btn img')

	$parallaxBtn.mousemove(function (e) {
		parallaxIt(e, circle1, 35)
		parallaxIt(e, circle2, 45)
		parallaxIt(e, circle3, 55)
		parallaxIt(e, circle4, 65)
		parallaxIt(e, btn, 75)
		parallaxIt(e, btnIcon, 10)
	})

	$parallaxBtn.mouseleave(function () {
		setTimeout(() => {
			gsap.to('.employer-cta__inner span, .parallax-btn, .parallax-btn img', {x: '0px', y: '0px', duration: 0.2})
		}, 200)
	})

	function parallaxIt(e, target, movement) {
		let boundingRect = target.getBoundingClientRect()
		let relX = e.clientX - boundingRect.left
		let relY = e.clientY - boundingRect.top

		gsap.to(target, {
			duration: 0.3,
			x: (relX - boundingRect.width / 2) / boundingRect.width * movement,
			y: (relY - boundingRect.height / 2) / boundingRect.height * movement,
			ease: 'power2.out'
		})
	}
}

function howStepMobile() {
	if (!is_mobile) return
	$('.how__step-header').click(function (e) {
		e.preventDefault()
		$(this).closest('.how__content-inner').toggleClass('active')
		$(this).closest('.how__step').toggleClass('active')
		$(this).next('.how__step-list').slideToggle('fast')
	})
}

if (window.innerWidth > 1024) {
	parallaxBtn()
	employerCircle()
	// window.onscroll = function () {
	// 	window.scrollTo(0, window.scrollY)
	// }
}

function initForm() {
	$('.service-card__footer a').click(function (e) {
		const fieldIndex = $(this).data('field')
		document.querySelectorAll('[name="Subject"]')[parseInt(fieldIndex)].checked = true
	})
}

theme.submitServiceForm = function () {
	const form = $('#register-package')
	const btnSubmit = form.find('.btn-submit')
	const requiredFields = ['EmailAddress', 'CountryCode', 'Content']

	const canSubmit = checkRequiredFields(requiredFields, form)

	if (!canSubmit) return
	btnSubmit.addClass('loading')
	const message = form.data('message-success')
	let form_data = form.serializeArray()

	$.ajax({
		url: AJAX_URL,
		type: 'post',
		data: form_data
	}).done(function (response) {
		console.log(response)
		if (response.success) {
			form.find('.form__message').html('<p>' + message + '</p>')
		}
	})
		.always(function () {
			btnSubmit.removeClass('loading')
			$('[name="FullName"]').val('')
			$('[name="EmailAddress"]').val('')
			$('[name="PhoneNumber"]').val('')
			$('[name="Content"]').val('')
			$('[name="CountryCode"]').val('')
			$('.form__field.form__field--active').removeClass('form__field--active')
		})
}

howStepMobile()
howItWorks()
expertFields()
initForm()

