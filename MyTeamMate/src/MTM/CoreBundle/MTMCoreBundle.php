<?php

namespace MTM\CoreBundle;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class MTMCoreBundle extends Bundle {
	
	public function getParent() {
		return 'FOSUserBundle';
	}
	
}
