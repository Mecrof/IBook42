init = function()
{
	var img = document.getElementById('scan'),
	    body = document.getElementById('body'),
        width,
     	height,
		resize;

	width  = body.offsetWidth;
	height = body.offsetHeight;
	
	img.style.height = (height - 80) + 'px';
	
	window.onresize = function() 
	{
		if(resize != null)
		{
			clearTimeout(resize);
			resize = null;
		}
		
		resize = setTimeout(prendre,300);
		
		
	}
};

window.addEventListener("load", init, false);