import $ from "jquery"
import {checkRequiredFields} from "./utils"

window.theme = window.theme || {}

function getLandmarksWithJobs(countryId, updateAll = false, selector = '[name="area"]') {
	$.ajax(AJAX_URL, {
		method: 'POST',
		data: {
			action: 'get_json_landmarks_with_jobs',
			countryId: countryId
		}
	}).done(function (response) {
		if (response.success) {
			addSelectOptions(selector, response.data, parseInt(theme.area))
			if (updateAll) addSelectOptions('[name="JobCityLandmarkID"]', response.data)
		}
	})
}

function initForm(data) {

	// Add data to form fields
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

	const landmarkSelect = $('[name="JobCityLandmarkID"]').select2()

	landmarks = data.areas

	addSelectOptions('[name="JobCountryID"]', data.locations)
	// addSelectOptions('[name="JobRoleTypeID"]', data.roletypes)

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

	// Init forms
	updateInitialData()
}
window.theme = window.theme || {}
theme.alertForm = function () {
	const form = $('#alert-form')
	const btnSubmit = form.find('.btn-submit')
	const requiredFields = {
		email: ['EmailAddress', 'duration', 'JobCountryID'],
		whatsapp: ['OriginalMobileNo', 'OriginalMobileNo', 'duration', 'JobCountryID']
	}
	const subType = $('[name="notify_type"]:checked').val()
	console.log(subType, 'subType')

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
		})
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

let landmarks = []
let phoneCodes = []
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

		const currentCode = phoneCodes.find(i => i.code === window.country_code)
		if (currentCode) {
			$('.phone-code').text(currentCode.dial_code)
			$('[name="PhoneCode"]').val(currentCode.dial_code)
		}
	})
}

function updateInitialData() {
	let data = $('#sub-data').html()
	if (data) {
		data = JSON.parse(data)
		$('[name="EmailAddress"]').val(data?.EmailAddress)
		$('[name="JobRoleTypeID"]').val(data?.JobRoleType?.Id)
		$('[name="JobCountryID"]').val(data?.JobCountry?.Id)

		const {JobIndustries, PeriodFrom, PeriodTo} = data
		$('[name="JobIndustryIDs[]"]').val(JobIndustries?.map(i => i.Id)).trigger('change')

		// Init date picker
		const dateField = $('input[name="duration"]')
		dateField.daterangepicker({
			autoUpdateInput: false,
			startDate: new Date(PeriodFrom),
			endDate: new Date(PeriodTo),
			showDropdowns: true,
			parentEl: '.form__field-date'
		}).val(moment(PeriodFrom).format('DD-MM-YYYY') + ' to ' + moment(PeriodTo).format('DD-MM-YYYY'))

		dateField.on('apply.daterangepicker', function (ev, picker) {
			$(this).val(picker.startDate.format('DD-MM-YYYY') + ' - ' + picker.endDate.format('DD-MM-YYYY'))
			$('[name="PeriodFrom"]').val(picker.startDate.format('YYYY-MM-DD'))
			$('[name="PeriodTo"]').val(picker.endDate.format('YYYY-MM-DD'))
		})

		$('[name="PeriodFrom"]').val(moment(PeriodFrom).format('YYYY-MM-DD'))
		$('[name="PeriodTo"]').val(moment(PeriodTo).format('YYYY-MM-DD'))
	}
}

getJobOptions()
