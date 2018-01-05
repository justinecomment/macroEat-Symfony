$( ".categories ul li" ).hover(
  function() {
      $('.name').css({transform: 'translateX(10px)', transitionDuration: '0.2s' })
     
  },
  function(){
      $('.name').css({transform: 'translateX(-10px)', transitionDuration: '0.2s'})
  }
);
