import 'jquery-validation'
import 'jquery-mask-plugin'
const $ = require('jquery')

const contactForm = $('#contactForm')

$.validator.addMethod('phoneFormat', function (value, element) {
  return (
    this.optional(element) ||
    /^\(\d{2}\) \d{1,5}\-\d{1,4}( x\d{1,4})?$/.test(value)
  )
})

$('#whatsapp').mask('(00) 00000-0000')

contactForm.validate({
  highlight: function (element) {
    $(element).closest('.form-control ').addClass('has-error')
  },
  unhighlight: function (element) {
    $(element).closest('.form-control ').removeClass('has-error')
  },

  highlight: function (element, errorClass, validClass) {
    $(element).closest('.form-control').addClass('is-invalid')
  },

  unhighlight: function (element) {
    $(element).closest('.form-control').removeClass('is-invalid')
  },
  errorElement: 'div',
  errorClass: 'invalid-feedback',
  errorPlacement: function (error, element) {
    error.insertAfter(element.parent())
  },
  rules: {
    fullname: {
      required: true
    },
    email: {
      required: true,
      email: true
    },
    whatsapp: {
      required: true,
      phoneFormat: true,
      minlength: 15
    }
  },
  messages: {
    fullname: {
      required: 'Preencha este campo obrigatório.'
    },

    email: {
      required: 'Preencha este campo obrigatório.',
      email: 'O e-mail deve ser formatado corretamente.'
    },
    whatsapp: {
      required: 'Preencha este campo obrigatório.',
      phoneFormat: 'Preencha um telefone válido.',
      minlength: 'Preencha um telefone válido.'
    }
  },
  submitHandler: function (form, e) {
    e.preventDefault()

    const button = form[3]
    button.innerHTML = 'Enviando...'

    const data = {
      action: 'send_contact_form',
      fullname: form[0].value,
      email: form[1].value,
      whatsapp: form[2].value
    }

    $.ajax({
      url: send_contact_form.ajaxurl,
      type: 'POST',
      data: data,
      datatype: 'json',
      success: function (response) {
        const showModal = document.querySelector('.modal-overlay')

        setTimeout(() => {
          button.innerHTML = 'Enviar'
          showModal.classList.add('show')
          form.reset()
        }, 1000)
      },
      error: function (err) {
        console.log(Error)
      }
    })
  }
})
