const buttonClose = document.getElementById('close')
const closeModal = document.querySelector('.modal-overlay')
const contactForm = document.getElementById('contactForm')

if (buttonClose) {
  buttonClose.addEventListener('click', () => {
    closeModal.classList.remove('show')
    contactForm.reset()
  })
}
