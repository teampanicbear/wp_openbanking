import $ from 'jquery'
import {updateParam, debounce, checkRequiredFields, getParam, getParams} from "./utils"
import {gsap} from "gsap"
import {ScrollTrigger} from 'gsap/ScrollTrigger'
import Swiper, {Pagination, Navigation} from 'swiper'

gsap.registerPlugin(ScrollTrigger)

Swiper.use([Pagination, Navigation])

window.theme = window.theme || {}

theme.citiesList = []

function jobBoard() {
	let table = $('#jobTable').DataTable({
		paging: false,
		searching: false,
		aaSorting: []
	})
}

let landmarks = []
let phoneCodes = []

function getInitialSearchParams() {
	const params = getParams()
	console.log(params, 'current params')
	Object.keys(params).map(function (item, index) {
		theme[item] = Object.values(params)[index]
	})
}

function getLandmarksWithJobs(countryId, updateAll = false, selector = '[name="area"]') {
	if (countryId === '185' || countryId === '95') {
		$.ajax(AJAX_URL, {
			method: 'POST',
			data: {
				action: 'get_json_landmarks_with_jobs',
				countryId: countryId
			}
		}).done(function (response) {
			if (response && response.success) {
				addSelectOptions(selector, response.data, parseInt(theme.area))
				if (updateAll) addSelectOptions('[name="JobCityLandmarkID"]', response.data)
			}
		})
	}
	else {
		const cities = theme.citiesList.filter(city => city.CountryId === parseInt(countryId))
		addSelectOptions(selector, cities, parseInt(theme.area))
	}

}

function getCitiesWithJobs() {
	$.ajax(AJAX_URL, {
		method: 'POST',
		data: {
			action: 'get_json_cities_list'
		}
	}).done(function (response) {
		console.log(response, 'response')
		if (response && response.success) {
			theme.citiesList = response.data
		}
	})
}

function handleFilter() {
	const baseUrl = [location.protocol, '//', location.host, location.pathname].join('')

	$('.candidate-filter select').change(function (e) {
		e.preventDefault()
		const name = $(this).attr('name')
		const val = $(this).val()
		let params = updateParam(name, val)

		console.log(val, 'val')

		$('.candidate-loading').css('display', 'block')

		if (name === 'location') {
			params = updateParam('location', val)

			$('[name="area"] option:gt(0)').remove()

			getLandmarksWithJobs(val)
		}
		const url = baseUrl + '?' + params

		handleFetch(url)
	})

	document.querySelector('.form__control--search').addEventListener('keyup', debounce(function () {
		const params = updateParam('searchTerm', this.value)

		$('.candidate-loading').css('display', 'block')
		const url = baseUrl + '?' + params
		handleFetch(url)
	}, 700))

}

function addSelectOptions(selector, options, selected, key = 'Id') {
	$(selector).find('option:gt(0)').remove()
	$.each(options, function (i, item) {
		$(selector).append($('<option>', {
			value: item[key],
			text: item.Name,
			selected: selected === item[key]
		}))
	})
}

function handlePagination() {
	$('body').on('click', '.pagination .page-numbers', function (e) {
		e.preventDefault()
		const href = $(this).attr('href')
		handleFetch(href)
	})
}

function handleFetch(url) {
	window.history.replaceState({}, "", url)

	$.get(url, function (res) {
		if (res) {
			const table = $(res).find('.candidate-table').html()
			$('.candidate-table').html(table)
		}
	})
}

const jobsSlider = () => {
	const mySwiper = new Swiper('.job-detail__related-container', {
		slidesPerView: 'auto',
		loop: true,
		spaceBetween: 20,
		centeredSlides: false,
		pagination: {
			el: '.swiper-pagination',
			clickable: true
		},

		// Navigation arrows
		navigation: {
			nextEl: '.job-detail__control-next',
			prevEl: '.job-detail__control-prev'
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
				const slidesLength = document.querySelectorAll('.job-detail__related-container .job-card').length
				console.log(breakpointParams)
				if (breakpointParams.slidesPerView >= slidesLength) {
					document.querySelector('.job-detail__related-controls').classList.add('hidden')
					document.querySelector('.job-detail__related-list').classList.add('justify--center')
				} else {
					document.querySelector('.job-detail__related-controls').classList.remove('hidden')
					document.querySelector('.job-detail__related-list').classList.remove('justify--center')
				}
			},
		}
	})
}

if (document.body.classList.contains('page-template-candidate')) {
	jobBoard()
	handleFilter()
	handlePagination()

	const TLObj = gsap.timeline({paused: true})
	for (let [index, obj] of document.querySelectorAll('.candidate-header__obj').entries()) {
		const distance = index % 2 === 0 ? 20 : -20
		TLObj.to(obj, {
			duration: 3,
			repeat: -1,
			yoyo: true,
			y: distance,
			delay: index * 0.5,
			ease: 'power1.inOut'
		}, index)
	}

	ScrollTrigger.create({
		trigger: '.candidate-header',
		onToggle: ({isActive}) => {
			if (isActive) {
				TLObj.play()
			} else {
				TLObj.pause()
			}
		}
	})

	const TL2 = gsap.timeline({paused: true})
	for (let [index, obj] of document.querySelectorAll('.planet').entries()) {
		const distance = index % 2 === 0 ? 30 : -30
		TL2.to(obj, {
			duration: 3,
			repeat: -1,
			yoyo: true,
			y: distance,
			delay: index * 0.5,
			ease: 'power1.inOut'
		}, index)
	}
	ScrollTrigger.create({
		trigger: '.candidate-step',
		onToggle: ({isActive}) => {
			if (isActive) {
				TL2.play()
			} else {
				TL2.pause()
			}
		}
	})
}

function toggleDisable(selector) {
	document.querySelector(selector).disabled = !document.querySelector(selector).disabled
}

function initForm(data) {

	// Init date picker
	const dateField = $('input[name="duration"]')
	dateField.daterangepicker({
		minDate: moment(),
		autoUpdateInput: false,
		startDate: moment(),
		endDate: moment().add('7', 'days'),
		showDropdowns: true,
		parentEl: '.form__field-date'
	})
	dateField.on('show.daterangepicker', function(ev, picker) {
		$(picker.container).addClass('show-picker')
	});
	dateField.on('hide.daterangepicker', function(ev, picker) {
		$(picker.container).removeClass('show-picker')
	});

	dateField.on('apply.daterangepicker', function (ev, picker) {
		$(this).val(picker.startDate.format('DD-MM-YYYY') + ' to ' + picker.endDate.format('DD-MM-YYYY'))
		$('[name="PeriodFrom"]').val(picker.startDate.format('YYYY-MM-DD'))
		$('[name="PeriodTo"]').val(picker.endDate.format('YYYY-MM-DD'))
	})

	const fieldIndustries = $('[name="JobIndustryIDs[]')
	const selectText = fieldIndustries.data('text')
	// Add data to form fields
	function formatResult(state) {
		if (state.text === 'select-all') {
			return $('<button class="select-all">'+ selectText +'</button>');
		}

		return state.text
	}
	const industrySelect = fieldIndustries.select2({
		templateResult: formatResult,
		closeOnSelect: false,
		data: data.industries.map(industry => {
			return {
				id: industry.Id,
				text: industry.Name
			}
		})
	})

	$(document).on("click", ".select-all",function(){
		fieldIndustries.find('option').prop("selected", true);// Select All Options
		fieldIndustries.trigger("change")
		$(".select2-results .select2-results__option:not(:first-child)").prop("aria-selected", true).addClass('select2-results__option--selected')
		fieldIndustries.select2('close')
	})

	// const functionSelect = $('[name="JobFunctionIDs"]').select2({
	// 	data: data.functions.map(fun => {
	// 		return {
	// 			id: fun.Id,
	// 			text: fun.Name
	// 		}
	// 	})
	// })

	const areaSelect = $('[name="area"]').select2()
	const landmarkSelect = $('[name="JobCityLandmarkID"]').select2()

	landmarks = data.areas

	addSelectOptions('[name="JobCountryID"]', data.locations)
	// addSelectOptions('[name="JobRoleTypeID"]', data.roletypes)
	addSelectOptions('[name="industry"]', data.industries, theme.industry && parseInt(theme.industry))
	addSelectOptions('[name="jobtype"]', data.roletypes, theme.jobtype && parseInt(theme.jobtype))
	addSelectOptions('[name="location"]', data.locations, theme.location && parseInt(theme.location))
	addSelectOptions('[name="CountryCode"]', data.locations, window.country_code, 'Code')

	if (theme.location) {
		getLandmarksWithJobs(parseInt(theme.location), true)
	}

	// CHange notify method
	$('[name="notify_type"]').on('change', function (e) {
		const value = $('[name="notify_type"]:checked').val()
		console.log(value)
		if (value === 'wechat') {
			$('#form-email').addClass('hidden')
			$('#form-wechat').removeClass('hidden')
		}
		if (value === 'email') {
			$('#form-email').removeClass('hidden')
			$('#form-wechat').addClass('hidden')
			$('.form__field--whatsapp').addClass('hidden')
			$('.form__field--email').removeClass('hidden')
			$('[name="EmailAddress"]').focus()
		}
		if (value === 'whatsapp') {
			$('.form__field--email').addClass('hidden')
			$('.form__field--whatsapp').removeClass('hidden')
			$('[name="OriginalMobileNo"]').focus()
		}
	})

	// Change location
	$('[name="JobCountryID"]').on('change', function () {
		$('[name="JobCityLandmarkID"]').val('')
		getLandmarksWithJobs(parseInt($(this).val()), false,'[name="JobCityLandmarkID"]')
	})

}

theme.alertForm = function () {
	const form = $('#alert-form')
	const btnSubmit = form.find('.btn-submit')
	const requiredFields = {
		email: ['EmailAddress', 'duration', 'JobCountryID', 'JobIndustryIDs[]'],
		whatsapp: ['OriginalMobileNo', 'OriginalMobileNo', 'duration', 'JobCountryID', 'JobIndustryIDs[]']
	}

	const subType = $('[name="notify_type"]:checked').val()

	const canSubmit = checkRequiredFields(requiredFields[subType], form)
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
		const messageEl = form.find('.form__message')
		if (response && response.success) {
			messageEl.removeClass('form__message--error-inline').html('<p>' + message + '</p>')
		} else {
			messageEl.addClass('form__message--error-inline').html('<p>' + response.data + '</p>')
		}
	})
		.always(function () {
			btnSubmit.removeClass('loading')
			$('[name="FullName"]').val('')
			$('[name="EmailAddress"]').val('')
			$('[name="OriginalMobileNo"]').val('')
			$('[name="JobCountryID"]').val('')
			$('[name="JobCityLandmarkID"]').val('')
			$('[name="PeriodFrom"]').val('')
			$('[name="PeriodTo"]').val('')
			$('[name="JobRoleTypeID"]').val('')
			$('[name="JobIndustryIDs[]"]').val('').trigger('change')
			$('[name="duration"]').val('')
			$('[name="JobFunctionIDs"]').val('')
			$('.form__field.form__field--active').removeClass('form__field--active')
		})
}

let fileUploaded
let myDropzone
theme.resumeDropForm = function () {

	const form = $('#submit-resume-form')
	const btnSubmit = form.find('.btn-submit')
	const requiredFields = ['EmailAddress', 'fileUploaded']

	const canSubmit = checkRequiredFields(requiredFields, form)
	if (!canSubmit) return

	btnSubmit.addClass('loading')
	const message = form.data('message-success')
	let form_data = new FormData(document.querySelector('#submit-resume-form'))
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

function getJobOptions() {
	$.ajax(AJAX_URL, {
		method: 'POST',
		data: {
			action: 'get_json_job_options'
		}
	}).done(function (response) {
		console.log(response.data, 'response')
		if (response.success) initForm(response.data)
	})

	// Get phone codes
	$.getJSON(window.phoneCodesUrl, function (response) {
		phoneCodes = response


		const countriesList = response.map(i => {
			return {
				Id: i.PhoneCountryCode,
				Name: `${i.Name} (+${i.PhoneCountryCode})`
			}
		})

		addSelectOptions('[name="PhoneCode"]', countriesList, window.country_code)
		var phoneSelect = $('[name="PhoneCode"]').select2()

		const currentCountry = phoneCodes.find(i => i.Code === window.original_country_code)
		if (currentCountry) {
			phoneSelect.val(currentCountry.PhoneCountryCode).trigger('change')
			$('[name="CountryID"]').val(currentCountry.Id)
		}
		phoneSelect.on('change', function () {
			const value = $(this).val()
			const currentCountry = phoneCodes.find(i => i.PhoneCountryCode === value)
			if (currentCountry) {
				$('[name="CountryID"]').val(currentCountry.Id)
			}
		})

	})
}

// Init dropzone
if (document.querySelector('#dropzone')) {
	Dropzone.autoDiscover = false
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

getCitiesWithJobs()
getInitialSearchParams()
getJobOptions()
jobsSlider()
