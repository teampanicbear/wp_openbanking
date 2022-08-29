import Swiper, {Pagination, Navigation} from 'swiper'
import {gsap} from "gsap"
// import {GSDevTools} from 'gsap/GSDevTools'
import {SplitText} from 'gsap/SplitText'
import {DrawSVGPlugin} from "gsap/DrawSVGPlugin"
import Grid from './grid';

gsap.registerPlugin(SplitText, DrawSVGPlugin)
Swiper.use([Pagination, Navigation])

// let scrolled = false
let currentActive = 1
let lastActive = 1
let s2Visited = false


let s5Grid

const S2Config = {
	currentStep: 0,
	lastStep: 1,
	duration: 5,
	clickable: false
}

const S4Config = {
	duration: 7,
	currentStep: 0,
	lastStep: 0,
	played: false
}
const S4Data = [
	{
		width: '83px',
		height: '83px',
		left: '319px',
		top: '-119px',
		background: '#5393FF',
	},
	{
		width: '79px',
		height: '79px',
		left: '477px',
		top: '77px',
		background: '#61A573'
	},
	{
		width: '56px',
		height: '56px',
		left: '500px',
		top: '312px',
		background: '#BD60D5'
	},
	{
		width: '61px',
		height: '61px',
		left: '353px',
		top: '445px',
		background: '#FFBD6B'
	},
	{
		width: '71px',
		height: '71px',
		left: '-28px',
		top: '430px',
		background: '#FF6AA0'
	},
	{
		width: '49px',
		height: '49px',
		left: '-79px',
		top: '300px',
		background: '#6066FB'
	},
	{
		width: '87px',
		height: '87px',
		left: '-167px',
		top: '133px',
		background: '#61A573'
	},
	{
		width: '56px',
		height: '56px',
		left: '-76px',
		top: '-15px',
		background: '#D56072'
	},
	{
		width: '61px',
		height: '61px',
		left: '48px',
		top: '-124px',
		background: '#33A7A0'
	}
]

const backgroundColors = ['#7525DB', '#6518C7', '#44088F', '#29165F', '#150938']


let passiveIfSupported = false
try {
	window.addEventListener("test", null,
		Object.defineProperty(
			{},
			"passive",
			{
				get: function () {
					passiveIfSupported = {passive: false}
				}
			}
		)
	)
} catch (err) {
}

const videoBefore = document.querySelector('.home-s1__video--before')
const videoTransNext = document.querySelector('.home-s1__video--trans-next')
const videoTransBack = document.querySelector('.home-s1__video--trans-back')
const videoAfter = document.querySelector('.home-s1__video--after')

const videoTransNextHandler = () => {
	gsap.set(videoTransNext, {display: 'none'})
	gsap.set(videoAfter, {display: 'block'})
	videoAfter.play()
	videoTransNext.removeEventListener('ended', videoTransNextHandler,false)
}

const videoTransBackHandler = () => {
	console.log('back ended')
	gsap.set(videoTransBack, {display: 'none'})
	gsap.set(videoBefore, {display: 'block'})
	videoBefore.play()
	scrolled = false
	videoTransBack.removeEventListener('ended', videoTransBackHandler,false)
}

let reverted = false
const videoAfterHandler = () => {
	console.log('after ended')
	if (!reverted) {
		videoAfter.play()
	} else {
		gsap.set(videoAfter, {display: 'none'})
		gsap.set(videoTransBack, {display: 'block'})
		videoTransBack.play()
		videoAfter.pause()
		videoAfter.removeEventListener('ended', videoAfterHandler,false)
	}
}
videoAfter.addEventListener('ended', videoAfterHandler,false)

const timeline1 = gsap.timeline({
	paused: false,
	delay: 2.5
})
const timeline2 = gsap.timeline({
	paused: true,
})

const timeline3 = gsap.timeline({
	paused: true,
	onComplete: () => {
		scrolled = false
	},
	onReverseComplete: () => {
		scrolled = false
	}
})
const timeline4 = gsap.timeline({
	paused: true,
	onReverseComplete: () => {
		scrolled = false
	}
})
const timeline5 = gsap.timeline({
	paused: true,
	onComplete: () => {
		scrolled = false
		if (s5Grid) s5Grid.init()
	},
	onReverseComplete: () => {
		scrolled = false
		if (s5Grid) s5Grid.destroy()
	}})

// Timeline out
const TL1Out = gsap.timeline()
const TL2Out = gsap.timeline()
const TL3Out = gsap.timeline()
const TL4Out = gsap.timeline()

const TL1Back = gsap.timeline({
	paused: true,
	onComplete: () => {
		// scrolled = false
		StepTimeLine.pause()
		timeline2.pause()
	},
	onReverseComplete: () => {
		scrolled = false
		timeline2.resume()
		StepTimeLine.resume()
		videoTransNext.addEventListener('ended', videoTransNextHandler, false)

		gsap.set('.home-s1__video--before', {display: 'none'})
		gsap.set('.home-s1__video--trans-next', {
			display: 'block',
			onComplete: () => {
				videoTransNext.play()
				videoBefore.pause()
				reverted = false
			}
		})
	}
})

const globalTimelines = [timeline1, timeline2, timeline3, timeline4, timeline5]

const StepTimeLine = gsap.timeline({paused: true, delay: 1})

const CircleTimeLine = gsap.timeline({delay: 1, repeatDelay: 0.1, paused: true})

const sections = document.querySelectorAll('.home-section')

TL1Back.to('.home-s2__title, .home-s2__subtitle, .home-s2__steps, .home-s2__content-wrapper', {
	opacity: 0,
	y: -30,
	duration: 1.2,
	ease: 'power4.out'
})

const TL1Obj = gsap.timeline({paused: true})
for (let [index, obj] of document.querySelectorAll('.home-s1__obj').entries()) {
	const distance = index % 2 === 0 ? 15 : -15
	TL1Obj.to(obj, {
		duration: 3,
		repeat: -1,
		yoyo: true,
		y: distance,
		delay: index * 0.5,
		ease: 'power1.inOut'
	}, index)
}

const nextBtn = document.querySelector('.scroll-down__btn[data-action="next"]')
const backBtn = document.querySelector('.scroll-down__btn[data-action="back"]')

let scrolled = false
window.disabledWheel = false

const handleScrollWheel = evt => {
	evt.preventDefault()
	if (!evt) evt = event
	if (scrolled || disabledWheel) return

	const isScrollingDown = Math.sign(evt.deltaY) === 1
	const isScrollingUp = Math.sign(evt.deltaY) === -1

	if (currentActive >= 5 && isScrollingDown) return
	if (currentActive <= 1 && isScrollingUp) return

	scrolled = true
	lastActive = currentActive

	if (isScrollingDown) currentActive++
	if (isScrollingUp) currentActive--

	const direction = isScrollingDown ? 'down' : 'up'

	handleChangeSection(direction)

}

const handleChangeSection = (direction) => {
	const progress = currentActive * 20

	sections[lastActive - 1].classList.remove('home--current')
	sections[currentActive - 1].classList.add('home--current')

	const changeProgress = () => {
		gsap.to('.home-progress__value', {
			duration: 0.8,
			height: progress + '%',
		})
		document.querySelector('.home-progress--current').innerHTML = currentActive
	}

	if (currentActive === 2) s2Visited = true

	if (currentActive !== 1) {
		TL1Back.pause()
		timeline1.pause()
	}

	if (currentActive !== 4) {
		CircleTimeLine.pause()
	}

	if (direction === 'down') {
		globalTimelines[currentActive - 1].play()

		if (currentActive === 4) {
			gsap.to('.home-s4__rocket', {
				opacity: 1,
				duration: 2.5,
				y: '0',
				x: '0',
				ease: 'power4.inOut',
				delay: 1.2
			})
		}

		if (s2Visited && currentActive === 2) {
			TL1Back.reverse()
		} else {
			TL1Back.pause()
		}

	} else {

		if (currentActive === 1 && lastActive === 2) {
			TL1Back.play()
			timeline1.resume('translateY')
		}

		if (currentActive === 2 && lastActive === 3) {
			timeline3.reverse()
			if (StepTimeLine.paused()) StepTimeLine.resume()
		}

		if (currentActive === 3 && lastActive === 4) {
			timeline4.reverse()
			gsap.to('.home-s4__rocket', {
				opacity: 0,
				delay: 0.5,
				duration: 1.2,
				ease: 'power4.inOut',
				onComplete: () => {
					gsap.set('.home-s4__rocket', {
						y: '200px',
						x: '-300px'
					})
				}
			})

		}

		if (currentActive === 4 && lastActive === 5) {
			timeline5.reverse()
			if (CircleTimeLine.paused()) CircleTimeLine.resume()
		}
	}

	if (currentActive >= 5) {
		nextBtn.setAttribute('disabled', true)
	} else {
		nextBtn.removeAttribute('disabled')
	}

	if (currentActive === 1) {
		backBtn.setAttribute('disabled', true)
	} else {
		backBtn.removeAttribute('disabled')
	}

	handleChangeBg()
	changeProgress()
}

document.body.addEventListener('wheel', handleScrollWheel, passiveIfSupported)

const handleChangeBg = () => {
	const bg = backgroundColors[currentActive - 1]
	gsap.to('body', {duration: 1.5, backgroundColor: bg})
}

const s2TimeLine = () => {
	const items = document.querySelectorAll('.home-s2__content')
	const circles = document.querySelectorAll('.home-s2__steps-icon-border')
	const path = '.home-s2__steps-path--fill'

	StepTimeLine.from(circles[0], {drawSVG: '0%', duration: S2Config.duration, ease: 'none', onStart: () => {
			S2Config.lastStep = S2Config.currentStep
			S2Config.currentStep++
			handleChangeS2()
	}},'step-0')

	StepTimeLine.to('.home-s2__subtitle .line', {
		y: '-100%',
		duration: 0.5,
		stagger: {
			from: "start",
			each: 0.1
		},
	}, 'step-0')
	StepTimeLine.to(items[0].querySelectorAll('.line'), {
		duration: 0.5,
		y: '0%',
		delay: 0.2,
		stagger: {
			from: "start",
			each: 0.1
		},
		onComplete: () => {
			S2Config.clickable = true
		}
	}, 'step-0')

	for (let i = 1; i <= 5; i++) {
		const to = i * 20
		StepTimeLine.to(path, {duration: 1.1, drawSVG: to + '%'}, 'step-' + i)
		StepTimeLine.from(circles[i], {
			drawSVG: '0%',
			delay: 0.6,
			duration: S2Config.duration,
			ease: 'none',
			onStart: () => {
				handleChangeS2()
			},
			onComplete: () => {
				if (S2Config.currentStep >= 5) return
				S2Config.lastStep = S2Config.currentStep
				S2Config.currentStep++
			}}, 'step-' + i)
		StepTimeLine.to(items[i - 1].querySelectorAll('.line'), {
			duration: 0.5,
			y: '-100%',
			stagger: {
				from: "start",
				each: 0.1
			},
		}, 'step-' + i)
		StepTimeLine.to(items[i].querySelectorAll('.line'), {
			duration: 0.5,
			delay: 0.2,
			y: '0%',
			stagger: {
				from: "start",
				each: 0.1
			},
		}, 'step-' + i)
	}

	document.querySelector('.home-s2').addEventListener('click', (event) => {
		event.preventDefault()
		if (!S2Config.clickable) return

		const {target} = event
		if (target.classList.contains('home-s2__arrow')) {
			const action = target.dataset.action

			S2Config.lastStep = S2Config.currentStep
			if (action === 'next') {
				S2Config.currentStep++
				StepTimeLine.play(StepTimeLine.nextLabel())
			}
			if (action === 'back') {
				S2Config.currentStep--
				StepTimeLine.play('step-' + S2Config.currentStep)
			}
		}

		if (target.classList.contains('home-s2__steps-icon')) {
			let index = target.dataset.index
			index = parseInt(index)
			// if (S2Config.currentStep === index - 1) return

			S2Config.currentStep = index - 1
			StepTimeLine.play('step-' + S2Config.currentStep)
			StepTimeLine.addPause('step-' + S2Config.currentStep)
		}
	})
}

const s2BtnNext = document.querySelector('.home-s2__arrow-next')
const s2BtnBack = document.querySelector('.home-s2__arrow-back')

const handleChangeS2 = () => {
	if (S2Config.currentStep >= 6) {
		s2BtnNext.setAttribute('disabled', true)
	} else {
		s2BtnNext.removeAttribute('disabled')
	}
	if (S2Config.currentStep > 0) {
		s2BtnBack.removeAttribute('disabled')
	} else {
		s2BtnBack.setAttribute('disabled', true)
	}
}

const setupAnimation = () => {
	gsap.set('.home-s1__videos', {autoAlpha: 1, delay: 1})
	gsap.set('.home-s1__video--trans-next, .home-s1__video--after, .home-s1__video--trans-back', {display: 'none'})
	timeline1.from('.home-s1__actions', {y: 100, autoAlpha: 0, duration: 0.8, onComplete: () => TL1Obj.play()}, 0)
	timeline1.to('.home-s1 .line', {
			duration: 0.5,
			y: '0%',
			stagger: {
				from: "start",
				each: 0.06
			}
	}, 0)
	TL1Back.add(timeline1Back(), 1)

	// Section 2
	const pathDashed = document.querySelector('.home-s2__steps-path--dashed')
	const pathFill = document.querySelector('.home-s2__steps-path--fill')
	const pathLength = pathFill.getTotalLength()
	const s2Title = document.querySelector('.home-s2__title')

	pathFill.style.strokeDasharray = '0, '+pathLength+'px'

	s2TimeLine()

	timeline2.add(timeline1Out(), 0)
	timeline2.to('.home-s2__subtitle .line', {
		y: '0%',
		duration: 0.5,
		stagger: {
			each: 0.05,
			from: 'start'
		}
	}, 1)

	timeline2.to(s2Title, {
		x: -window.innerWidth * 2,
		ease: 'linear.easNone',
		repeat: -1,
		duration: 20
	}, 1)

	timeline2.from('.home-s2__steps-path', {opacity: 0, duration: 0.1, delay: 0.5}, 1)
	timeline2.from(pathDashed, {
		drawSVG: "0%",
		delay: 0.5, duration: 2, ease: 'none'}, 1)

	timeline2.from('.home-s2__steps-icon', {
		autoAlpha: 0,
		scale: 0,
		duration: 1,
		ease: 'power4.out',
		delay: 0.5,
		stagger: {
			each: 0.38,
			from: 'start'
		},
		onComplete: () => {
			scrolled = false
			StepTimeLine.play()
		}
	}, 1)

	timeline2.from('.home-s2__controls', {
		autoAlpha: 0,
		y: 100,
		delay: 0.2,
		duration: 0.5
	}, 1)


	// GSDevTools.create({animation: timeline2})

	// Section 3
	timeline3.add(timeline2Out(), 0)

	timeline3.to('.home-s3 .line', {
		y: '0%',
		delay: 0.5,
		stagger: {
			each: 0.1,
			from: 'start'
		}
	}, 1)
	timeline3.to('.home-s3 .line-button', {
		duration: 0.5,
		y: '0%',
		delay: 0.55,
		opacity: 1
	}, 1)
	timeline3.from('.home-s3__controls', {
		y: '100%',
		autoAlpha: 0,
		delay: 0.5,
		duration: 1.2,
	}, 1)
	timeline3.from('.home-s3__plane', {
		duration: 1.5,
		delay: 0.8,
		autoAlpha: 0,
	}, 1)
	timeline3.from(document.querySelectorAll('.job-card'), {
		y: 100,
		autoAlpha: 0,
		delay: 0.5,
		stagger: {
			each: 0.1,
			from: 'start'
		}
	}, 1)

	// Section 4
	gsap.set('.home-s4__small-bubbles circle, .satellite', {scale: 0, transformOrigin: 'center center'})
	gsap.set('.home-s4__bg', {opacity: 0})
	gsap.set('.home-s4__rocket', {
		opacity: 0,
		y: '200px',
		x: '-300px'
	})

	s4TimeLine()
	timeline4.add(timeline3Out(), 0)

	timeline4.from('.home-s4__circle', {
		scale: 0,
		duration: 1.2,
		ease: 'power4.inOut',
		delay: 1,
		onStart: () => {
			if (!S4Config.played) {
				gsap.to(document.querySelectorAll('.home-s4__review')[0].querySelectorAll('.line'), {
					duration: 0.5,
					y: '0%',
					delay: 0.6,
					stagger: {
						from: "start",
						each: 0.1
					},
					onStart: () => {
						S4Config.played = true
					}
				})
			}
		},
		onComplete: () => {
			s4AnimationIn()
			setTimeout(() => {
				scrolled = false
			}, 1000)
		}
	}, 0)

	timeline4.to('.home-s4__bg', {
		opacity: 1,
		ease: 'power4.inOut',
		duration: 2.5
	}, 0)

	timeline4.to('.home-s4__small-bubbles circle, .satellite', {
		duration: 1,
		scale: 1,
		delay: 0.5,
		stagger: {
			from: 'random',
			each: 0.05
		}
	},
		0)

	timeline4.to('.home-s4__content .line', {
		y: '0%',
		duration: 0.5,
		delay: 0.8,
		stagger: {
			each: 0.05,
			from: 'start'
		}
	}, 0)

	timeline4.from('.home-s4__content-divider', {
		width: '0%',
		duration: 0.3,
		delay: 0.8
	}, 0)

	timeline4.from('.home-s4__reviews .tooltip', {
		autoAlpha: 0,
		duration: 0.2,
		delay: 0.8
	}, 0)

	// timeline4.from('.home-s4__rocket', {
	// 	opacity: 0,
	// 	duration: 2.5,
	// 	y: '200px',
	// 	x: '-300px',
	// 	ease: 'power4.inOut',
	// 	delay: 0.8
	// }, 1)

	// Section 5
	gsap.set('.home-s5__grid-img', {scale: 0.7, opacity: 0})

	timeline5.add(timeline4Out(), 0)

	timeline5.to('.home-s5__content .line', {
		duration: 0.5,
		y: '0%',
		stagger: {
			each: 0.05,
			from: 'start'
		}
	}, 1)
	timeline5.to('.home-s5__content .line-button', {
		duration: 0.5,
		y: '0%',
		delay: 0.5,
		opacity: 1
	}, 1)
	timeline5.to('.home-s5__grid-img', {
		duration: 1.2,
		ease: 'expo.out',
		scale: 1,
		opacity: 0.4,
		delay: 0.5,
		stagger: {
			amount: 0.1,
			grid: 'auto',
			from: 'center'
		},
		onComplete: () => {
			s5Grid = new Grid(document.querySelector('.home-s5__grid'), '.home-s5__grid-img')
		}
	}, 1)

}

const handleScrollDown = () => {
	document.querySelector('.scroll-down').addEventListener('click', (evt) => {
		const target = evt.target

		console.log(target, 'target')
		if (!target.classList.contains('scroll-down__btn')) return

		if (scrolled) return

		const action = target.dataset.action
		lastActive = currentActive
		if (action === 'back') {
			currentActive--
			handleChangeSection('up')
		}
		if (action === 'next') {
			currentActive++
			handleChangeSection('down')
		}
	})
}

const jobsSlider = () => {
	const mySwiper = new Swiper('.job-list__container', {
		slidesPerView: 6,
		slidesPerGroup: 6,
		loop: false,
		spaceBetween: 20,
		speed: 1200,
		// centeredSlides: true,
		pagination: {
			el: '.swiper-pagination',
			clickable: true
		},

		// Navigation arrows
		navigation: {
			nextEl: '.home-s3__controls-next',
			prevEl: '.home-s3__controls-prev',
		},
		breakpoints: {
			2560: {
				slidesPerView: 10,
				slidesPerGroup: 10,
				loop: false,
				speed: 1200
			},
			1680: {
				slidesPerView: 6,
				slidesPerGroup: 6,
				loop: false,
				speed: 1200
			},
			1200: {
				slidesPerView: 5,
				slidesPerGroup: 5,
				loop: false,
				speed: 1200
			},
			900: {
				slidesPerView: 4,
				slidesPerGroup: 4,
				loop: false,
				speed: 1200
			},
			480: {
				slidesPerView: 2,
				slidesPerGroup: 2,
				loop: false,
				speed: 1200
			}
		},
		on: {
			breakpoint: function (swiper, breakpointParams) {
				const slidesLength = document.querySelectorAll('.job-list__container .job-card').length
				if (breakpointParams.slidesPerView >= slidesLength) {
					document.querySelector('.home-s3__controls').classList.add('hidden')
					document.querySelector('.job-list').classList.add('justify--center')
				} else {
					document.querySelector('.home-s3__controls').classList.remove('hidden')
					document.querySelector('.job-list').classList.remove('justify--center')
				}
			},
		}
	})
}

const s4TimeLine = () => {
	const {duration} = S4Config

	CircleTimeLine.from('.home-s4__circle-progress circle', {
		duration: duration,
		drawSVG: '0%',
		ease: 'none',
		onComplete: () => {
			S4Config.lastStep = S4Config.currentStep
			S4Config.currentStep++

			gsap.to('.home-s4__circle-progress', {
				duration: 0.3,
				opacity: 0,
				onComplete: () => {
					gsap.set('.home-s4__circle-progress', {opacity: 1})
					handleChangeS4()
				}
			})
		}
	})
}

const handleClickS4 = (event) => {
	event.preventDefault()
	const {currentStep} = S4Config
	const target = event.target
	S4Config.lastStep = currentStep
	S4Config.currentStep = target.dataset.index
	handleChangeS4()
}

const handleChangeS4 = () => {
	const bubbles = document.querySelectorAll('.home-s4__bubble')
	const items = document.querySelectorAll('.home-s4__review')
	const {currentStep, lastStep} = S4Config

	const {width, height, top, left, background} = S4Data[lastStep]

	CircleTimeLine.restart()

	console.log(currentStep,  'currentStep', lastStep, 'lastStep')
	const prevItem = items[lastStep]
	const prevBubble = bubbles[lastStep]

	if (currentStep >= 9) S4Config.currentStep = 0

	const currentItem = items[S4Config.currentStep]
	const currentBubble = bubbles[S4Config.currentStep]

	if (prevBubble) {
		gsap.to(prevBubble, {
			left: left,
			top: top,
			duration: 1,
			backgroundColor: background,
			width: width,
			height: height,
			ease: 'power4.out'
		})
	}
	if (currentBubble) {
		const cssTop = currentBubble.dataset.top
		const cssLeft = currentBubble.dataset.left
		gsap.to(currentBubble, {
			left: cssLeft,
			top: cssTop,
			duration: 1,
			backgroundColor: '#fff',
			width: 50,
			height: 50,
			ease: 'power4.inOut'
		})
	}

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
		prevItem.dataset.active = false
	}
	if (currentItem) {
		currentItem.dataset.active = true
		gsap.to(currentItem.querySelectorAll('.line'), {
			delay: 0.5,
			duration: 0.5,
			y: '0%',
			stagger: {
				from: "start",
				each: 0.1
			}
		})
	}
}

const s4AnimationIn = () => {
	const bubbles = document.querySelectorAll('.home-s4__bubble')
	for (let [index, bubble] of bubbles.entries()) {
		const {width, height, top, left, background} = S4Data[index]

		const distance = index % 2 === 0 ? 10 : -10

		bubble.addEventListener('click', handleClickS4)
		if (index > 0) {
			gsap.to(bubble, {
				duration: 1,
				delay: index * 0.08,
				width: width,
				height: height,
				top: top,
				left: left
			})
			gsap.to(bubble, {
				duration: 0.5,
				delay: index * 0.06,
				backgroundColor: background,
				ease: 'power4.in',
				onComplete: () => {
					gsap.to(bubble, {
						y: distance,
						duration: 3,
						repeat: -1,
						yoyo: true,
						delay: index * 0.5,
						ease: 'power1.inOut'
					})

					// Play progress
					CircleTimeLine.play()
				}
			})
		}
	}

}

const timeline1Out = () => {
	TL1Out.to('.home-s1 .home-section__title .line', {
		autoAlpha: 0,
		y: '-100%',
		duration: 1.2,
		ease: 'power3.inOut',
		stagger: {
			each: 0.1,
			from: 'start'
		}
	},0)

	TL1Out.to('.home-s1__actions a', {
		opacity: 0,
		duration: 0.4,
		y: '100%',
		ease: 'power3.inOut'
	},0)

	TL1Out.to('.home-s1__obj', {
		scale: 0,
		autoAlpha: 0,
		duration: 0.5,
		ease: 'power3.inOut',
		stagger: {
			each: 0.02,
			from: 'random'
		},
		onStart: () => {
			TL1Obj.pause()
		}
	},0)

	TL1Out.to('.home-s1__videos', {
		y: '220px',
		duration: 1.5,
		ease: 'power4.inOut'
	},0)
	TL1Out.to('.home-s1__video', {
		width: '70%',
		duration: 1.5,
		ease: 'power4.inOut',
		onComplete: function () {

			console.log('completed')

			videoTransNext.addEventListener('ended', videoTransNextHandler, false)

			gsap.set('.home-s1__video--before', {display: 'none'})
			gsap.set('.home-s1__video--trans-next', {
				display: 'block',
				onComplete: () => {
					videoTransNext.play()
					videoBefore.pause()
				}
			})
		}
	},0)

	return TL1Out
}

const timeline2Out = () => {
	timeline2.pause()
	StepTimeLine.pause()
	videoAfter.pause()

	TL2Out.to('.home-s1__videos', {
		duration: 0.8,
		autoAlpha: 0,
		scale: 0.8,
		y: 200
	}, 0)
	TL2Out.to('.home-s2__steps-path', {
		autoAlpha: 0,
	}, 0)
	TL2Out.to('.home-s2__title, .home-s2__subtitle, .home-s2__content-wrapper, .home-s2__controls', {
		autoAlpha: 0,
		duration: 1,
		delay: 0.3,
	}, 0)
	TL2Out.to('.home-s2__steps-icon', {
		scale: 0,
		autoAlpha: 0,
		duration: 0.5,
		delay: 0.3,
		// ease: 'power4.inOut',
		stagger: {
			each: 0.1,
			from: 'start'
		}
	}, 0)

	return TL2Out
}

const timeline3Out = () => {
	TL3Out.to('.home-s3__controls', {
		opacity: 0,
		y: 100,
		duration: 1,
		ease: 'power3.inOut'
	}, 0)
	TL3Out.to('.job-list__container', {
		autoAlpha: 0,
		y: 200,
		delay: 0.15,
		duration: 1,
		ease: 'power3.inOut'
	}, 0)
	TL3Out.to('.home-s3 .home-section__header', {
		y: 200,
		duration: 1,
		delay: 0.3,
		autoAlpha: 0,
		ease: 'power3.inOut'
	}, 0)
	TL3Out.to('.home-s3__empty', {
		y: 200,
		duration: 0.8,
		delay: 0.2,
		autoAlpha: 0,
		ease: 'power3.inOut'
	}, 0)
	TL3Out.to('.home-s3__plane', {
		duration: 0.6,
		delay: 0.2,
		opacity: 0,
		ease: 'power3.inOut'
	}, 0)
	return TL3Out
}

const timeline4Out = () => {
	TL4Out.to('.home-s4__bg', {
		opacity: 0,
		duration: 1.2,
		ease: 'power4.out'
	}, 0)
	TL4Out.to('.home-s4__rocket', {
		autoAlpha: 0,
		// y: '200px',
		// x: '-300px',
		duration: 1.2,
		ease: 'power4.inOut'
	}, 0)
	TL4Out.to('.home-s4__content .line', {
		y: '-100%',
		autoAlpha: 0,
		duration: 0.5,
		stagger: {
			each: 0.05,
			from: 'start'
		}
	}, 0)
	TL4Out.to('.home-s4__content-divider, .home-s4__reviews .tooltip', {
		y: -30,
		autoAlpha: 0,
		duration: 0.5,
		delay: 0.1,
	}, 0)
	TL4Out.to('.home-s4__circle, .home-s4__small-bubbles', {
		autoAlpha: 0,
		duration: 1,
	}, 0)
	TL4Out.to('.home-s4__bubble', {
		scale: 4,
		autoAlpha: 0,
		duration: 1.5,
		ease: 'expo.out',
		stagger: {
			each: 0.05,
			from: 'random'
		}
	}, 0)
	return TL4Out
}

const timeline1Back = () => {
	const TL = gsap.timeline()

	TL.to('.home-s1 .home-section__title .line', {
		autoAlpha: 1,
		y: '0%',
		duration: 1.2,
		ease: 'power4.in',
		stagger: {
			each: 0.1,
			from: 'end'
		}
	},0)

	TL.to('.home-s1__actions a', {
		opacity: 1,
		duration: 0.6,
		y: '0%',
		ease: 'power4.in'
	},0)

	TL.to('.home-s1__obj', {
		scale: 1,
		autoAlpha: 1,
		duration: 0.7,
		ease: 'power4.in',
		stagger: {
			each: 0.02,
			from: 'random'
		},
		onComplete: () => {
			TL1Obj.play()
		}
	},0)

	TL.to('.home-s1__videos', {
		y: 0,
		duration: 1.2,
		ease: 'power4.inOut',
	},0)
	TL.to('.home-s1__video', {
		width: '100%',
		duration: 1.2,
		ease: 'power4.inOut',
		onComplete: () => {
			videoTransBack.addEventListener('ended', videoTransBackHandler, false)
			reverted = true
		}
	},0)

	return TL
}

setupAnimation()
handleScrollDown()
jobsSlider()
