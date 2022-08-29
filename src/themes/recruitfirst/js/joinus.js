import {gsap} from "gsap"
import {ScrollTrigger} from "gsap/ScrollTrigger"
import {DrawSVGPlugin} from "gsap/DrawSVGPlugin"
import Grid from "./grid"
import Swiper from "swiper"
import {checkRequiredFields} from "./utils"
import 'slick-carousel/slick/slick.min'

gsap.registerPlugin(DrawSVGPlugin, ScrollTrigger)

function whyTimeline() {
	const content = document.querySelectorAll('.joinus-why__info')

	if (content.length < 1) return
	const items = document.querySelectorAll('.joinus-why__list-item')

	const handleChange = (prevSlide, activeSlide) => {
		items[activeSlide].classList.add('active')
		items[prevSlide].classList.remove('active')

		const prevItem = content[prevSlide]
		const currentItem = content[activeSlide]

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
			gsap.to(prevItem.querySelectorAll('.joinus-why__icon'), {
				duration: 0.5,
				y: -30,
				opacity: 0,
				stagger: {
					from: "start",
					each: 0.1
				},
				onComplete: function () {
					gsap.set(this._targets, {y: 30})
				}
			})
		}
		if (currentItem) {
			gsap.to(currentItem.querySelectorAll('.line'), {
				delay: 0.5,
				duration: 0.5,
				y: '0%',
				stagger: {
					from: "start",
					each: 0.1
				}
			})
			gsap.to(currentItem.querySelectorAll('.joinus-why__icon'), {
				delay: 0.5,
				duration: 0.5,
				y: 0,
				opacity: 1
			})
		}
	}

	const slider = $('.joinus-why__main').slick({
		infinite: true,
		slidesToShow: 1,
		fade: true,
		arrows: false,
		autoplay: true,
		draggable: false,
		autoplaySpeed: 7000
	})

	gsap.set(content[0].querySelectorAll('.line'), {y: '0%'})
	gsap.set(content[0].querySelectorAll('.joinus-why__icon'), {y: '0%', opacity: 1})

	slider.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
			console.log(currentSlide, 'currentSlide')
			handleChange(currentSlide, nextSlide)
	})

	const handleClick = (evt, index) => {
		evt.preventDefault()
		slider.slick('slickGoTo', index)
	}

	for (let [index, item] of items.entries()) {
		// item.addEventListener('click', (evt) => handleClick(evt, index))
		item.addEventListener('mouseenter', (evt) => {
			slider.slick('slickPause')
			handleClick(evt, index)
		})
		item.addEventListener('mouseleave', () => {
			slider.slick('slickPlay')
		})
	}

	slider.slick('slickPause')

	ScrollTrigger.create({
		trigger: '.joinus-why',
		onEnter: () => {
			slider.slick('slickPlay')
		}
	})
}

function galleryParallax() {
	if (!document.querySelector('.joinus-header__banner')) return
	const galleryGrid = new Grid(document.querySelector('.joinus-header__banner'), '.parallax-element')
	gsap.from('.joinus-header__gallery', {
		duration: 1,
		ease: 'expo.out',
		scale: 0,
		opacity: 0,
		delay: 2.5,
		stagger: {
			amount: 0.1,
			grid: 'auto',
			from: 'center'
		}
	})

	ScrollTrigger.create({
		trigger: '.joinus-first',
		end: document.querySelector('.joinus-header').clientHeight + 200,
		onLeave: () => {
			galleryGrid.destroy()
		},
		onToggle: () => {
			galleryGrid.init()
		}
	})
}

function bannerSlider() {
	const mySwiper = new Swiper('.joinus-header__slider', {
		slidesPerView: 'auto',
		spaceBetween: 16,
		centeredSlides: true,
		loop: true
	})
}

if (!is_mobile) {
	gsap.set('.joinus-application__plane', {
		opacity: 0,
		yPercent: 50,
		xPercent: -50
	})
	gsap.to('.joinus-application__plane', {
		opacity: 1,
		duration: 2,
		yPercent: 0,
		xPercent: 0,
		ease: 'power4.inOut',
		scrollTrigger: {
			trigger: ".joinus-application",
			start: "top-=400 top"
		}
	})

	whyTimeline()
	galleryParallax()
}
let fileUploaded
let myDropzone
function initForm() {

	// Init dropzone
	Dropzone.autoDiscover = false
	const removeText = $('#dropzone').attr('data-remove-text') || 'Remove file'
	myDropzone = new Dropzone("div#dropzone", {
		url: '/upload',
		paramName: 'attachFile',
		maxFilesize: 5,
		maxFiles: 1,
		parallelUploads: 1,
		autoQueue: false,
		uploadMultiple: false,
		addRemoveLinks: true,
		acceptedFiles: 'image/*,application/pdf, application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, .csv, application/vnd.openxmlformats-officedocument.wordprocessingml.document',
		autoProcessQueue: false,
		dictRemoveFile: removeText,
		maxfilesexceeded: function(file) {
			this.removeAllFiles();
			this.addFile(file);
		}
	})
	myDropzone.on("addedfile", function(file) {
		console.log(file, 'added file')
		fileUploaded = file
		$('[name="fileUploaded"]').val(1)
	})
}

window.theme = window.theme || {}
theme.submitJoinUsForm = function () {
	const form = $('#join-us-form')
	const btnSubmit = form.find('.btn-submit')
	const requiredFields = ['EmailAddress', 'fileUploaded']

	const canSubmit = checkRequiredFields(requiredFields, form)
	if (!canSubmit) return

	btnSubmit.addClass('loading')
	const message = form.data('message-success')
	let form_data = new FormData(document.querySelector('#join-us-form'))
	if (fileUploaded) form_data.append('AttachFile', fileUploaded, fileUploaded.name)

	$.ajax({
		url: AJAX_URL,
		type: 'post',
		data: form_data,
		processData: false,
		mimeType: "multipart/form-data",
		contentType: false
	}).done(function (response) {
		response = JSON.parse(response)
		const messageEl = form.find('.form__message')
		if (response && response.success) {
			messageEl.removeClass('form__message--error-inline').html('<p>' + message + '</p>')
		} else {
			messageEl.addClass('form__message--error-inline').html('<p>Unsuccessful, please try again!</p>')
		}
	})
		.always(function () {
			btnSubmit.removeClass('loading')
			$('[name="FullName"]').val('')
			$('[name="EmailAddress"]').val('')
			$('[name="Content"]').val('')
			$('[name="Location"]').val('')
			$('[name="PhoneNumber"]').val('')
			$('[name="fileUploaded"]').val('')
			myDropzone.removeAllFiles()
			$('.form__field.form__field--active').removeClass('form__field--active')
		})
}

initForm()
if (is_mobile) {
	bannerSlider()
}
