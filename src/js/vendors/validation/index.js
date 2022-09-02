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

$('#pw').mask('(00) 00000-0000')

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
    error.insertAfter(element)
  },
  rules: {
    name: {
      required: true
    },
    email: {
      required: true,
      email: true
    },
    pw: {
      required: true,
      phoneFormat: true,
      minlength: 15
    },
    message: {
      required: true
    }
  },
  messages: {
    name: {
      required: 'Preencha este campo obrigatório.'
    },
    email: {
      required: 'Preencha este campo obrigatório.',
      email: 'O e-mail deve ser formatado corretamente.'
    },
    pw: {
      required: 'Preencha este campo obrigatório.',
      phoneFormat: 'Preencha um telefone ou whatsApp válido.',
      minlength: 'Preencha um telefone ou whatsApp válido.'
    },

    message: {
      required: 'Preencha este campo obrigatório.'
    }
  },
  submitHandler: function (form, e) {
    e.preventDefault()

    const button = form[4]

    button.innerHTML = 'Enviando...'

    const data = {
      action: 'send_contact_form',
      name: form[0].value,
      email: form[1].value,
      pw: form[2].value,
      message: form[3].value
    }

    $.ajax({
      url: send_contact_form.ajaxurl,
      type: 'GET',
      data: data,
      datatype: 'json',
      success: function (response) {
        const areaMessage = document.querySelector('.area-message')
        const areaMessageText = document.querySelector('.area-message .alert')

        setTimeout(() => {
          button.innerHTML = 'Enviar'
          areaMessage.classList.add('show')
          areaMessageText.innerHTML =
            'Sua mensagem foi enviada com sucesso! <br/> Retornaremos em breve.'

          form.reset()
        }, 1500)
      },
      error: function (err) {
        console.log(Error)
      }
    })
  }
})
