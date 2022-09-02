const buttonOpenNavbar = document.getElementById('button-open-navbar')
const buttonCloseNavbar = document.getElementById('close')
const navMobile = document.getElementById('nav-mobile')
const navMobileItems = document.querySelectorAll('#nav-mobile ul li a')
const body = document.querySelector('body')

buttonOpenNavbar.addEventListener('click', () => {
  navMobile.classList.add('show')
  body.classList.add('overflow-hidden')
})

buttonCloseNavbar.addEventListener('click', () => {
  navMobile.classList.remove('show')
  body.classList.remove('overflow-hidden')
})

navMobileItems.forEach(item => {
  item.addEventListener('click', () => {
    navMobile.classList.remove('show')
    body.classList.remove('overflow-hidden')
  })
})
