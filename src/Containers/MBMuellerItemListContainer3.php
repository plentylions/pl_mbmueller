<?php

namespace MBMueller\Containers;

use Plenty\Plugin\Templates\Twig;

class MBMuellerItemListContainer3
{
    public function call(Twig $twig, $arg):string
    {
        return $twig->render('MBMueller::Containers.ItemLists.ItemList3', ["item" => $arg[0]]);
    }
}