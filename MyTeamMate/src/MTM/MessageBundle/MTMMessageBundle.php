<?php

namespace MTM\MessageBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class MTMMessageBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSMessageBundle';
	}
}
