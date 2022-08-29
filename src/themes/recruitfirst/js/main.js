import {gsap} from "gsap"
import $ from "jquery"
import {SplitText} from 'gsap/SplitText'
import {DrawSVGPlugin} from 'gsap/DrawSVGPlugin'
import {ScrollTrigger} from 'gsap/ScrollTrigger'
import {enableBodyScroll, disableBodyScroll} from "body-scroll-lock"

window.$ = $

gsap.registerPlugin(SplitText, DrawSVGPlugin, ScrollTrigger)


if (!is_mobile) {
	const mySplitLine = new SplitText(".splitting-line", {type: "lines", linesClass: 'line line++'})

	$('.splitting-line .line').wrap('<div class="line-wrapper"></div>')
	gsap.set('.line', {y: '100%'})
	gsap.set('.line-button', {y: '100%', opacity: 0})
}

const initMenu = () => {
	if (!document.querySelector('.site-nav')) return
	$('.menu-item a').wrap('<div class="menu-item-wrapper"></div>')

	const toggleBtn = document.querySelector('.site-nav__toggle')
	const TL = gsap.timeline({paused: true})
	let opened = false

	TL.to('.site-nav__bg', {
		duration: 0.8,
		width: 1090,
		height: 1200,
		ease: 'power4.inOut',
		onComplete: function () {
			// gsap.to(this._targets, {duration: 0.5, backdropFilter: 'blur(30px)'})
		},
		onReverseComplete: function () {
			// gsap.set(this._targets, {backdropFilter: 'none'})
		}
	}, 0)
	TL.to('.site-nav__bg--front', {
		duration: 0.8,
		delay: 0.08,
		width: 1040,
		height: 1150,
		ease: 'power4.inOut'
	}, 0)

	TL.to('.site-nav .menu-item-wrapper, .site-nav__language-switcher-inner', {
		y: 0,
		duration: 0.5,
		ease: 'power2.inOut',
		delay: 0.3,
		stagger: {
			each: 0.05,
			from: 'start'
		}
	}, '>-0.8')

	TL.to('.site-nav__toggle-icon svg', {
		scale: 0,
		transformOrigin: 'center',
		duration: 0.4
	}, 0)
	TL.to('.site-nav__toggle--open', {
		y: '-100%',
		duration: 0.4,
		ease: 'power4.out'
	}, 0)
	TL.to('.site-nav__toggle--close', {
		y: 0,
		duration: 0.4,
		ease: 'power4.in'
	}, 0)

	toggleBtn.addEventListener('click', () => {
		const headerSticky = document.body.classList.contains('header-sticky')
		if (!opened) {
			disableBodyScroll(document.body)
			if (headerSticky) {
				gsap.to('.logo-black', {opacity: 0})
				gsap.to('.site-header', {backgroundColor: 'transparent', borderBottomWidth: '0px', duration: .3, delay: 0.05})
			}
			window.disabledWheel = true
			document.body.classList.add('open-nav')
			TL.play()
		} else {
			document.body.classList.remove('open-nav')
			TL.reverse()
			enableBodyScroll(document.body)

			if (headerSticky) {
				gsap.to('.logo-black', {opacity: 1})
				gsap.to('.site-header', {backgroundColor: '#fff', borderBottomWidth: '1px', duration: .3, delay: 0.8})
			}

			window.disabledWheel = false
		}
		opened = !opened
	})

}

function initPopup() {
	let open = false
	let target
	$('[data-open-popup]').click(function (e) {
		e.preventDefault()
		target = $(this).attr('href') || $(this).data('popup')

		if (target) {
			$(target).addClass('open')
			open = true
			document.body.classList.add('popup-open')
			if (!is_mobile) disableBodyScroll(document.body)
		}

		const event = new CustomEvent('openPopup', {
			detail: {
				popupName: target.replace('#', '')
			}
		});
		document.dispatchEvent(event)
	})

	$('.rf-popup__close, .rf-popup__overlay').click(function (e) {
		e.preventDefault()

		if (open && target) {
			if (!is_mobile) enableBodyScroll(document.body)
			document.body.classList.remove('popup-open')
			$(target).removeClass('open')
			const event = new CustomEvent('closePopup', {
				detail: {
					popupName: target.replace('#', '')
				}
			});
			document.dispatchEvent(event)
		}
	})
}

function initFormField() {
	const formFields = document.querySelectorAll('.form__field')
	for (let field of formFields) {
		const inputEl = field.querySelector('.form__control')
		if (!inputEl) continue
		if (inputEl.value.trim() !== '') {
			field.classList.add('form__field--active')
		}
		inputEl.addEventListener('focus', () => onInputFocus(inputEl))
		inputEl.addEventListener('blur', () => onInputBlur(inputEl))

	}

	function onInputFocus(field) {
		field.parentNode.classList.add('form__field--active')
	}

	function onInputBlur(field) {
		if (field.value.trim() === '') {
			field.parentNode.classList.remove('form__field--active')
		}
	}
}

function tabContentActive() {
	$('body').on('click', '[data-tab-nav]', function (e) {
		e.preventDefault()
		let target = $(this).attr('href')
		let content = $(target)
		content.siblings('[data-tab-content]').removeClass('active').css('display', 'none')
		content.css('display', 'block').addClass('active')
		$(this).siblings('[data-tab-nav]').removeClass('active')
		$(this).addClass('active')
	})

	$(document).on('change', '[data-tab-nav-select]', function (e) {
		e.preventDefault()
		let target = $(this).val();
		let content = $(target);
		content.siblings('[data-tab-content]').removeClass('active').css('display', 'none');
		content.css('display', 'block').addClass('active');
	})
}

function loadingScreen() {

	const TL = gsap.timeline()
	TL.to('.loading-screen__inner-progress circle', {
		delay: 0.2,
		duration: 2,
		drawSVG: '100%',
		ease: 'none',
		onUpdate: () => {
			document.querySelector('.loading-screen__progress').innerHTML = Math.floor(TL.progress() * 100)
		},
		onComplete: () => {
			gsap.to('.loading-screen__inner, .loading-screen__progress', {
				y: -100,
				opacity: 0,
				duration: 0.5
			})
			gsap.to('.loading-screen', {
				delay: 0.3,
				y: '-100%',
				pointerEvents: 'none',
				onComplete: function () {
					gsap.set(this._targets, {y: '0%', autoAlpha: 0})
				}
			})
		}
	})

	// $(window).on("pageshow", function (e) {
	// 	if (e.originalEvent !== undefined && e.originalEvent.persisted) {
	// 		// $('body').css('opacity', 1)
	// 	}
	// })
	window.addEventListener('beforeunload', (event) => {
		gsap.to('.loading-screen', {autoAlpha: 1})
	})

}

function scrollToAnchor() {
	$(document).on('click', '.anchor[href^="#"]', function (evt) {
		evt.preventDefault()
		const offset = $(this).data('offset') || 0
		$('html, body').animate({
			scrollTop: $($.attr(this, 'href')).offset().top - offset
		}, 500)
	})
}

function stickyHeader() {
	const mainHeader = document.querySelector('.site-header')
	const headerV2 = document.querySelector('.header-v2')

	if (headerV2) {
		const showAnim = gsap.from(headerV2, {
			yPercent: -100,
			paused: true,
			duration: 0.2
		}).progress(1);

		ScrollTrigger.create({
			start: "top +=80px",
			end: 99999,
			onUpdate: (self) => {
				self.direction === -1 ? showAnim.play() : showAnim.reverse()
				if (self.direction === -1 && scrollY <= 72) showAnim.reverse()
			}
		})
	}
	if (is_mobile && mainHeader) {
		window.addEventListener('scroll', function () {
			if (scrollY > 50) {
				document.body.classList.add('header-sticky')
				mainHeader.classList.add('sticky')
			} else {
				document.body.classList.remove('header-sticky')
				mainHeader.classList.remove('sticky')
				gsap.to(mainHeader, {backgroundColor: '', borderBottomWidth: ''})
			}
		})
	}
}

function validEmail(email) {
	return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)
}
window.validEmail = validEmail

loadingScreen()
tabContentActive()
initMenu()
initFormField()
scrollToAnchor()
stickyHeader()
initPopup()
