<?php

namespace MBMueller\Containers;

use Plenty\Plugin\Templates\Twig;

class MBMuellerItemListContainer1
{
    public function call(Twig $twig, $arg):string
    {
        return $twig->render('MBMueller::Containers.ItemLists.ItemList1', ["item" => $arg[0]]);
    }
}