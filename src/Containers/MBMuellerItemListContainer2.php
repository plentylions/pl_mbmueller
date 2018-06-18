<?php

namespace MBMueller\Containers;

use Plenty\Plugin\Templates\Twig;

class MBMuellerItemListContainer2
{
    public function call(Twig $twig, $arg):string
    {
        return $twig->render('MBMueller::Containers.ItemLists.ItemList2', ["item" => $arg[0]]);
    }
}