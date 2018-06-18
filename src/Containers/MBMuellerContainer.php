<?php

namespace MBMueller\Containers;

use Plenty\Plugin\Templates\Twig;

class MBMuellerContainer
{
    public function call(Twig $twig):string
    {
        return $twig->render('MBMueller::Stylesheet');
    }
}