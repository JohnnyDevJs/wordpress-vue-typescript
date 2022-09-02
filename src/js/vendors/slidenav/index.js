import SlideNav from './slidenav'
;(function ($) {
  window.addEventListener('scroll', () => {
    let posScroll = window.scrollY
    const nav = document.querySelector('header')

    if (posScroll > 10) {
      nav.classList.add('fixed')
    } else {
      nav.classList.remove('fixed')
    }
  })

  const items = new SlideNav({
    changeHash: true,
    speed: 100
  })
})(jQuery)
