<?php

namespace MTM\LoginBundle;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class MTMLoginBundle extends Bundle {
	public function getParent() {
		return 'FOSUserBundle';
	}
}
