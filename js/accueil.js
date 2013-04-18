init = function()
{
	var l_blocks = document.getElementById('left').getElementsByClassName('block'),
		i_block,
		i_block_displayed;

	var i = -1;
	var length = l_blocks.length;
	
	while(++i<length)
	{
		l_blocks[i].onclick = function()
		{
			if(i_block_displayed != null)
			{
				i_block_displayed.className = 'block-infos';
				i_block_displayed = null;
			}
			
			i_block = this.getElementsByClassName('block-infos')[0];
			i_block.className += ' slide-fade-in';
			i_block_displayed = i_block;
		}
	}
};

window.addEventListener("load", init, false);