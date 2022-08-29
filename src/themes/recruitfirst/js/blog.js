import $ from 'jquery'

const $popup = $('#calendar-preview')
const $title = $popup.find('[data-title]')
const $preview = $popup.find('[data-preview-image]')
const $btn = $popup.find('[data-download-btn]')

$('.calendar-card__preview').click(function (e) {
	e.preventDefault()
	$title.empty()
	$preview.attr('src', '')

	const previewUrl = $(this).data('preview')
	const title = $(this).data('title')
	const downloadUrl = $(this).data('download-url')

	$title.text(title)
	$preview.attr('src', previewUrl)
	$btn.attr('href', downloadUrl)
})


const stickerData = document.querySelector('#sticker-data')

console.log(stickerData, 'stickerData')
const stickerDataJson = stickerData ? JSON.parse(stickerData?.innerHTML) : []

const $language = $('[name="language"]')
const $pack = $('[name="sticker_pack"]')
const $app = $('[name="message_app"]')
const $btnDownload = $('[data-btn-download]')
const $qrcode = $('.sticker-qrcode')
const $qrcode_img = $qrcode.find('img')
const $sticker_preview = $('[data-sticker-preview]')

$('.sticker-form').on('change', 'select', function (e) {
	const lang = $language.val()
	const pack = $pack.val()
	const app = $app.val()
	handleFilter(lang, app, pack)
})

console.log(stickerDataJson, 'stickerDataJson')

const handleFilter = (language, message_app, pack) => {
	console.log(language, message_app, pack, 'language')
	const found_pack = stickerDataJson.find(sticker => {
		return sticker.language === language && sticker.id === Number(pack)
	})

	console.log(found_pack, 'found')
	if (found_pack) {
		const url = found_pack[message_app]
		console.log(url, 'url')
		$sticker_preview.attr('src', found_pack['preview'])
		if (url) {
			$btnDownload.removeAttr('disabled')
			$btnDownload.attr('href', url)

			if (message_app === 'wechat') {
				$qrcode_img.attr('src', found_pack['qrcode'])
				$qrcode.addClass('show')
			} else {
				$qrcode_img.attr('src', '')
				$qrcode.removeClass('show')
			}
		} else {
			$btnDownload.attr('disabled', true)
			$btnDownload.attr('href', '')
			$qrcode_img.attr('src', '')
			$qrcode.removeClass('show')
		}
	} else {
		$btnDownload.attr('disabled', true)
		$btnDownload.attr('href', '')
		$qrcode_img.attr('src', '')
		$qrcode.removeClass('show')
	}
}
