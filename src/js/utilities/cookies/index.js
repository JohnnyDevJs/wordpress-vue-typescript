;(function ($) {
  class Cookies {
    constructor() {
      this.setCookie()
      this.deleteCookie()
      this.getCookie()
      this.acceptCookieConsent()
    }

    setCookie(cname, cvalue, exdays) {
      const d = new Date()
      d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000)
      let expires = 'expires=' + d.toUTCString()
      document.cookie = cname + '=' + cvalue + ';' + expires + ';path=/'
    }

    deleteCookie(cname) {
      const d = new Date()
      d.setTime(d.getTime() + 24 * 60 * 60 * 1000)
      let expires = 'expires=' + d.toUTCString()
      document.cookie = cname + '=;' + expires + ';path=/'
    }

    getCookie(cname) {
      let name = cname + '='
      let decodedCookie = decodeURIComponent(document.cookie)
      let ca = decodedCookie.split(';')
      for (let i = 0; i < ca.length; i++) {
        let c = ca[i]
        while (c.charAt(0) == ' ') {
          c = c.substring(1)
        }
        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length)
        }
      }
      return ''
    }

    acceptCookieConsent() {
      const acceptCookieButton = document.getElementById('accept')
      const consentCookies = document.getElementById('consent-cookies')

      acceptCookieButton.onclick = () => {
        this.deleteCookie('user_cookie_consent')
        this.setCookie('user_cookie_consent', 1, 30)
        consentCookies.classList.add('hidden')
      }

      let cookie_consent = this.getCookie('user_cookie_consent')

      if (cookie_consent != '') {
        consentCookies.classList.add('hidden')
      } else {
        setTimeout(() => {
          consentCookies.classList.remove('hidden')
        }, 2000)
      }
    }
  }

  const cookies = new Cookies()
})(jQuery)
