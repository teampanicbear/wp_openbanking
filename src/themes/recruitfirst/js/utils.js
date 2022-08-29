// Map number x from range [a, b] to [c, d]
import $ from "jquery"

const map = (x, a, b, c, d) => (x - a) * (d - c) / (b - a) + c;

// Linear interpolation
const lerp = (a, b, n) => (1 - n) * a + n * b;

const calcWinsize = () => {
    return {width: window.innerWidth, height: window.innerHeight};
};

const getRandomNumber = (min, max) => Math.floor(Math.random() * (max - min + 1) + min);

// Gets the mouse position
const getMousePos = (e) => {
    let posx = 0;
    let posy = 0;
    if (!e) e = window.event;
    if (e.pageX || e.pageY) {
        posx = e.pageX;
        posy = e.pageY;
    }
    else if (e.clientX || e.clientY)    {
        posx = e.clientX + body.scrollLeft + document.documentElement.scrollLeft;
        posy = e.clientY + body.scrollTop + document.documentElement.scrollTop;
    }

    return { x : posx, y : posy }
};

// Preload images
const preloadImages = (selector) => {
    return new Promise((resolve, reject) => {
        imagesLoaded(document.querySelectorAll(selector), resolve);
    });
};

const queryString = window.location.search
const urlParams = new URLSearchParams(queryString)

function getParams() {
    let params = {}
    const queryString = window.location.search
    const urlParams = new URLSearchParams(queryString)
    for (const entry of urlParams.entries()) {
        params[entry[0]] = entry[1]
    }
    return params
}

function getParam(name) {
    const queryString = window.location.search
    const urlParams = new URLSearchParams(queryString)
    return urlParams.get(name)
}

function updateParam(key, value) {
    var {location} = window
    var baseUrl = [location.protocol, '//', location.host, location.pathname].join('')

    const queryString = window.location.search
    const urlParams = new URLSearchParams(queryString)

    if (urlParams.has(key)) {
        if (value !== '' && value !== 'undefined') {
            urlParams.set(key, value)
        }
        if (value === '' || value === 'undefined') {
            urlParams.delete(key)
        }

        if (key === 'location' && urlParams.has('area')) {
            urlParams.delete('area')
        }

    } else {
        if (value) urlParams.append(key, value)
    }

    // window.history.replaceState({}, "", baseUrl + '?' + urlParams.toString())
    return urlParams.toString();
}

function clearAllParams() {
    var {location} = window
    var baseUrl = [location.protocol, '//', location.host, location.pathname].join('')
    window.history.replaceState({}, "", baseUrl)
    return false
}

function debounce(func, wait, immediate) {
    var timeout;
    return function() {
        var context = this, args = arguments;
        clearTimeout(timeout);
        timeout = setTimeout(function() {
            timeout = null;
            if (!immediate) func.apply(context, args);
        }, wait);
        if (immediate && !timeout) func.apply(context, args);
    };
}

function validEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)
}

function checkRequiredFields(fields, form) {
    let emptyFields = []
    let emailValid = true
    for (let field of fields) {
        const $this = form.find('[name="'+field+'"]')

        if ($this?.length) {
            const fieldType = $this.attr('type')
            let fValue = $this.val()

            console.log(fValue, !fValue, 'fValue')

            const hasMessage = $this.next('.form__message').length > 0
            if (hasMessage) $this.next('.form__message').remove()
            $this.closest('.form__field').removeClass('form__field--error')
            if (!fValue || (Array.isArray(fValue) && !fValue.length)) {
                $this.closest('.form__field').addClass('form__field--error')
                $this.after('<p class="form__message form__message--error">'+window.requiredMessage+'</p>')
                emptyFields.push(field)
            } else {
                if (fieldType === 'email' && !validEmail($this.val())) {
                    $this.closest('.form__field').addClass('form__field--error')
                    $this.after('<p class="form__message form__message--error">'+window.inValidEmail+'</p>')
                    emailValid = false
                }
            }
        }
    }
    console.log(emptyFields, 'emptyFields')
    return emptyFields.length === 0 && emailValid
}

export { map, lerp, calcWinsize, getRandomNumber, getMousePos, preloadImages, getParams, getParam, updateParam, clearAllParams, urlParams, debounce, checkRequiredFields, validEmail };
