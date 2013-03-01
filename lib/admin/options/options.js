jQuery(document).ready(function(){
	
	tooltip();
	
});


this.tooltip = function(){	

		xOffset = 10;
		yOffset = 20;		

	jQuery("a.tooltip").hover(function(e){											  
		this.t = this.title;
		this.title = "";									  
		jQuery("body").append("<p id='tooltip'>"+ this.t +"</p>");
		jQuery("#tooltip")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX + yOffset) + "px")
			.fadeIn("fast");		
    },
	function(){
		this.title = this.t;		
		jQuery("#tooltip").remove();
    });	
	jQuery("a.tooltip").mousemove(function(e){
		jQuery("#tooltip")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX + yOffset) + "px");
	});			
};
