<?php

namespace Eduflats\Bundle\EduflatsBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class EduflatsBundle extends Bundle {
    
    public function getParent() {
        parent::getParent();
        return 'FOSUserBundle';
    }
}
