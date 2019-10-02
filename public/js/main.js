var URL_ROOT = '/sumalian';

$(function(){
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 100000,
      values: [ 75, 600 ],
      stop:main, //event when user stop drag the ball
      slide: function( event, ui ) {
        $( "#amount" ).val( "P" + ui.values[ 0 ] + " - P" + ui.values[ 1 ] );
      }
    });
    function main(){
        var min = $( "#slider-range" ).slider( "values", 0 );
        var max = $( "#slider-range" ).slider( "values", 1 );
        // gen_range(min,max);
    }
    $( "#amount" ).val( "P" + $( "#slider-range" ).slider( "values", 0 ) +
      " - P" + $( "#slider-range" ).slider( "values", 1 ) );
});

$(document).on('click','.setup-btn', function(){

  var form = $(this).attr('data-form');
  /* Admin configuration Script*/
  var current, next, prev;
  var left, opacity, scale;

  current = $(this).parent();
  next = $(this).parent().next();

  /* progress */
  $('.progress li').eq($('div.awesome').index(next)).addClass('active');

  current.hide();
  next.show();


  current.animate({opacity:0},{
    step: function(now,mx){
      scale = 1 - (1 - now)*0.2;
      left = (now * 50) + "%";
      opacity = 1 - now;
      current.css({'transform':'scale('+scale+')'});
      next.css({'left':left,'opacity':opacity});
    },
    duration: 800,
    complete:function(){
      current.hide();
    }
  });

  if ( form == 2) {
    var data = $('#c-n').serializeArray();

    $.ajax({
      url: URL_ROOT + '/init/adminSetup',
      type: 'POST',
      data: $.param(data),
      success: function(d){
        // $.ajax({
        //   url: URL_ROOT + '/init/connError',
        //   type:'POST',
        //   dataType: 'json',
        //   success:function(d){
        //     if (d['result']) {
        //       alert('Something went wrong during connecting');
        //     }
        //   },
        //   error:function(e){
        //     console.log(e);
        //   }
        // });
        console.log(d)
      },
      error:function(e){
        console.log(e)
      }
    });   
  }
});

/* Admin initialization*/




