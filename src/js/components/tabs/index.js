(function($) {

  let tabs = document.querySelectorAll('.nav-portfolios a')

  tabs.forEach(tab => {
    tab.addEventListener('click', (e) => {
      e.preventDefault()
      
      // Tabs
      const tabID = document.getElementById(tab.id)
      
      tabs.forEach(tab => {
        tab.classList.remove('active_portfolio')
      })
  
      tabID.classList.add('active_portfolio')
      
    })
  })

})(jQuery)