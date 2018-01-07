$( ".categories ul li" ).on({
    mouseover: function () {
          $(this).find('.name').css({transform: 'translateX(10px)', transitionDuration: '0.2s' })
         
      },
      mouseleave: function () {
        $(this).find('.name').css({transform: 'translateX(-10px)', transitionDuration: '0.2s'})
      }
 } );
