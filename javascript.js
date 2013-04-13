init = function()
{
	var blocks = document.getElementsByClassName('block');
	var closeIcons = document.getElementsByClassName('close');
	
	var i = -1;
	var length = blocks.length;
	
	while(++i<length)
	{
		blocks[i].onmouseover = function()
		{
			var j = -1;
			var length = blocks.length;
			
			while(++j<length)
			{
				if(blocks[j]!=this)
					blocks[j].className += ' darken';
			}
		};
		
		blocks[i].onmouseout = function()
		{
			var j = -1;
			var length = blocks.length;
			
			while(++j<length)
			{
				if(blocks[j]!=this)
					blocks[j].className = 'block';
			}
		}
		
		blocks[i].onclick = function()
		{
			var center = document.getElementById('center');
			var zoom = this.getElementsByClassName('zoom')[0];
			var clone = zoom.cloneNode(true);
			var closeIcon = clone.getElementsByClassName('close')[0];
			
			center.appendChild(clone);
			
			setTimeout(function()
				{
					clone.className = ' show';
				},
				200
			);
			
			closeIcon.onclick = function()
			{
				center.removeChild(clone);
			}
		}
	}
};

window.addEventListener("load", init, false);