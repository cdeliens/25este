$(document).ready(function(){


/*
	1)	Hyphenation
	2)	Navigation
	3)	Search form
	4)	Social Links Tooltip
	5)	Comment Reply Link
	6)	Footer Scroll To Top Link
	7)	More link
	8)	Jquery Mansonry
	9)	Galleria
	10)	Tabs
	11)	Socialize Box

*/


/***************************************************/
/******************* 1) hyphenation*****************/

Hyphenator.config({
    displaytogglebox : true,
    minwordlength : 2
});
Hyphenator.run();




/***************************************************/
/**************** 7) more link *********************/

$('.article .thumb').hover(
  function () {
	$(this).children($('thumb a')).animate({
		left: '0px'
	},450,'swing')	
  }, 
  function () {
  $(this).children($('thumb a')).animate({
    left: '-150px'
  },450,'swing')
  }
);

$('.toparticle .thumb').hover(
  function () {
	$(this).children($('a')).animate({
		left: '0px'
	},450,'swing')	
  }, 
  function () {
	$(this).children($('a')).animate({
		left: '-300px'
	},450,'swing')	
  }
);

$('.extended_article .thumb').hover(
  function () {
	$(this).children($('a')).animate({
		left: '0px'
	},450,'swing')	
  }, 
  function () {
	$(this).children($('a')).animate({
		left: '-300px'
	},450,'swing')	
  }
);

/***************************************************/
/******************* 8) mansory ********************/

$('#filtering a').click(function(){

    var colorClass = '.' + $(this).attr('class');
    
    $('.tabs').addClass($(this).attr('class'));
    
    if(colorClass == '.all') {
        // show all hidden boxes
        $('.fluid').children('.invis')
            .toggleClass('invis').animate({opacity: 1},{ duration: 1000 });
    } else {    
        // hide visible boxes 
        $('.fluid').children().not(colorClass).not('.invis')
            .toggleClass('invis').animate({opacity: 0},{ duration: 1000 });
        // show hidden boxes
        $('.fluid').children(colorClass+'.invis')
            .toggleClass('invis').animate({opacity: 1},{ duration: 1000 });
    }

    $('.fluid').masonry();

    return false;
});


$('.fluid').masonry({
    columnWidth: 10,
    animate: true,
    itemSelector: '.box:not(.invis)' 
});





}); // document