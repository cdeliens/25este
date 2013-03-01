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
/******************* 2.1) menucat******************/

 $("#catmenu ul").supersubs({
		minWidth:    6, 
        maxWidth:    6,
        extraWidth:  1
 }).superfish({
		animation:   {opacity:'show',height:'show'},
		speed:       'fast',
		autoArrows:  true
}); 

/***************************************************/

/***************************************************/
/******************* 2) navigation******************/

 $("#nav ul").supersubs({
		minWidth:    6, 
        maxWidth:    6
 }).superfish({
		autoArrows:    false,
		speed:         'fast'
}); 

/***************************************************/
/***************** 3) search form ******************/

$('#search input').ztInputHint({
	'hint' : 'Buscar en este sitio'
});


/***************************************************/
/**************** 4) social links tooltip **********/

$('#sociallinks a').tipsy({
	'gravity' : 'nw',
	'fade': true
});


$('.comment .links a').tipsy({
	'gravity' : 'nw',
	'fade': true
});


$('#footer .beam').tipsy({
	'gravity' : 'se',
	'fade': true
});


/******************************************************/
/**** 5) add title attribute to commment-reply-link ***/

$('.comment-reply-link').attr('title','Reply to this comment');


/***************************************************/
/************* 6) footer scroll to top *************/

$('#footer .beam').click(function(){
	$('html, body').animate({scrollTop:0}, 'slow');
	return false;
});


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



/***************************************************/
/******************* 9) galleria********************/

$('#images').galleria({
	transition : 'fade',
	image_crop: true,
	popup_links : false,
	extend: function() {
		this.bind(Galleria.LOADFINISH, function(e) {
		$('.galleria-info-description').hide();
		$(e.imageTarget).click(this.proxy(function(e) {
			e.preventDefault(); // removes the garbage
			var obj = this.getData();
	//		alert(obj.toSource());
			$.colorbox({
				'href': obj.description,
				'width' : '70%',
				'inline' : false,
				'opacity' : 0.7
			});
		}))
		});
	}
});



/***************************************************/
/******************** 10) tabs**********************/

	
$('.tabcontent').hide().filter(':first').show();
                        
$('ul.tabnav a').click(function () {
        $('.tabcontent').hide();
        $('.tabcontent').filter(this.hash).show();
        $('ul.tabnav a').removeClass('selected');
        $(this).addClass('selected');
        return false;
}).filter(':first').click();


/***************************************************/
/**************** 11) socialize box*****************/


$("#socialpoptrigger").click(function(e) {          
	e.preventDefault();
    $("#socialpopbox").toggle();
	$("#socialpoptrigger").toggleClass("menu-open");
});


$("#socialpopbox").mouseup(function() {
	return false
});


$(document).mouseup(function(e) {
	if($(e.target).parent("a#socialpoptrigger").length==0) {
		$("#socialpoptrigger").removeClass("menu-open");
		$("#socialpopbox").hide();
	}
});			


}); // document