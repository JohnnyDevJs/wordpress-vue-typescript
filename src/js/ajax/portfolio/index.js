(function($) {

    const all = $('#todos')
    const exclusive = $('#exclusive')
    const general = $('#general')
    const listPortfolio = $('#list_portfolio')
    const loadMoreAll = $('#load_more_all')
    const loadMoreExclusive = $('#load_more_exclusive')
    const loadMoreGeneral = $('#load_more_general')
    const loading = $('.loading')
    let limit = 8

    //Load More Portfolio

    let portfolioItemAll = $('.all .portfolio-item')
    portfolioItemAll.slice(0, limit).removeClass('d-none')

    loadMoreAll.on('click', function() {
      limit += 4
      portfolioItemAll.slice(0, limit).removeClass('d-none')
      loadMoreAll.text('Carregando...')
        loading.addClass('d-block')
        loading.removeClass('d-none')

        if(!portfolioItemAll.hasClass('d-none')) {
          loadMoreAll.remove()
        }

        setTimeout(() => {
          loadMoreAll.text('Carregar mais')
          loading.removeClass('d-block')
          loading.addClass('d-none')
        }, 500)
    })

    if(all.hasClass('active_portfolio')) {
      loadMoreAll.removeClass('d-none')
    }

    all.on('click', function() {

      if(exclusive.hasClass('active_portfolio')) {
        $('#load_more_exclusive').removeClass('d-none')
      }

      if(general.hasClass('active_portfolio')) {
        $('#load_more_general').removeClass('d-none')
      }

      loadMoreAll.removeClass('d-none')
      loadMoreGeneral.addClass('d-none')
      loadMoreExclusive.addClass('d-none')

    
      // Load Portfolio
      listPortfolio.removeClass('exclusive')
      listPortfolio.removeClass('general')
      listPortfolio.addClass('all')

      $.ajax({
        type: 'POST',
        dataType: 'html',
        url: load_portfolio.ajaxurl,
        data: {
            action: 'load_portfolio',
            all: all.attr('id')
        },
        beforeSend: () => {
          loading.addClass('d-block')
          loading.removeClass('d-none')
        },
        success: function(response) {
          loading.removeClass('d-block')
          loading.addClass('d-none')
          listPortfolio.html(response)
          listPortfolio.addClass('animate-fadeInUp-4')

          const portfolioItemAll = $('.all .portfolio-item')
          portfolioItemAll.slice(0, limit).removeClass('d-none')

          loadMoreAll.on('click', function() {
            limit += 4
            portfolioItemAll.slice(0, limit).removeClass('d-none')
            loadMoreAll.text('Carregando...')
              loading.addClass('d-block')
              loading.removeClass('d-none')

              if(!portfolioItemAll.hasClass('d-none')) {
                loadMoreAll.remove()
              }

              setTimeout(() => {
                loadMore.text('Carregar mais')
                loading.removeClass('d-block')
                loading.addClass('d-none')
              }, 500)
          })
          

          setTimeout(() => {
            listPortfolio.removeClass('animate-fadeInUp-4')
          }, 500)
        }
      })

  
    })

    exclusive.on('click', function() {
      // Load Portfolio
      listPortfolio.addClass('exclusive')
      listPortfolio.removeClass('general')
      listPortfolio.removeClass('all')

      loadMoreAll.addClass('d-none')
      loadMoreGeneral.addClass('d-none')
      loadMoreExclusive.removeClass('d-none')

      $.ajax({
        type: 'POST',
        dataType: 'html',
        url: load_portfolio.ajaxurl,
        data: {
            action: 'load_portfolio',
            exclusive: exclusive.text()
        },
        beforeSend: () => {
          loading.addClass('d-block')
          loading.removeClass('d-none')
        },
        success: function(response) {
          loading.removeClass('d-block')
          loading.addClass('d-none')
          listPortfolio.html(response)
          listPortfolio.addClass('animate-fadeInUp-4')

          const portfolioItemExclusive = $('.exclusive .portfolio-item')
          portfolioItemExclusive.slice(0, limit).removeClass('d-none')

          loadMoreExclusive.on('click', function() {
            limit += 4
            portfolioItemExclusive.slice(0, limit).removeClass('d-none')
            loadMoreExclusive.text('Carregando...')
            loading.addClass('d-block')
            loading.removeClass('d-none')

            if(!portfolioItemExclusive.hasClass('d-none')) {
              loadMoreExclusive.remove()
            }

            setTimeout(() => {
              loadMoreExclusive.text('Carregar mais')
              loading.removeClass('d-block')
              loading.addClass('d-none')
            }, 500)
          })

          setTimeout(() => {
            listPortfolio.removeClass('animate-fadeInUp-4')
          }, 500)
        }
      })
    })

    general.on('click', function() {
      // Load Portfolio
      listPortfolio.addClass('general')
      listPortfolio.removeClass('exclusive')
      listPortfolio.removeClass('all')

      loadMoreAll.addClass('d-none')
      loadMoreGeneral.removeClass('d-none')
      loadMoreExclusive.addClass('d-none')

      $.ajax({
        type: 'POST',
        dataType: 'html',
        url: load_portfolio.ajaxurl,
        data: {
            action: 'load_portfolio',
            general: general.text()
        },
        beforeSend: () => {
          loading.addClass('d-block')
          loading.removeClass('d-none')
        },
        success: function(response) {

          loading.removeClass('d-block')
          loading.addClass('d-none')
          listPortfolio.html(response)
          listPortfolio.addClass('animate-fadeInUp-4')

          const portfolioItemGeneral = $('.general .portfolio-item')
          portfolioItemGeneral.slice(0, limit).removeClass('d-none')

          loadMoreGeneral.on('click', function() {
            limit += 4
            portfolioItemGeneral.slice(0, limit).removeClass('d-none')
            loadMoreGeneral.text('Carregando...')
              loading.addClass('d-block')
              loading.removeClass('d-none')

              if(!portfolioItemGeneral.hasClass('d-none')) {
                loadMoreGeneral.remove()
              }

              setTimeout(() => {
                loadMoreGeneral.text('Carregar mais')
                loading.removeClass('d-block')
                loading.addClass('d-none')
              }, 500)
          })

          setTimeout(() => {
            listPortfolio.removeClass('animate-fadeInUp-4')
          }, 500)
        }
      })

     
    })

   

}(jQuery))