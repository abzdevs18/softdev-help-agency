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

