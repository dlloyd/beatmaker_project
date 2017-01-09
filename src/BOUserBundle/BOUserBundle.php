<?php

namespace BOUserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class BOUserBundle extends Bundle
{
	public function getParent(){
		return 'FOSUserBundle';
	}
}
