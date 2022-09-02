;(function ($) {
  class FloatingWA {
    constructor() {
      this.showFloatingWA()
    }

    showFloatingWA() {
      const floating = document.getElementById('floating-wa')

      setTimeout(() => {
        floating.classList.add('show')
      }, 3000)
    }
  }

  const floatingwa = new FloatingWA()
})(jQuery)
