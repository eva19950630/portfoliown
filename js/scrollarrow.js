$(function() {

  // Scroll smoothly
  $('[data-smooth-scroll]').on('click', function(e) {
    var targetEl = $($(this).attr('href'))

    // Make sure the target is on this page
    if (targetEl.length < 1) return

    $('body, html').animate({scrollTop: targetEl.offset().top}, 800)

    e.preventDefault()
  })

})