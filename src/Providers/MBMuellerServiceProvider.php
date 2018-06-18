<?php

namespace MBMueller\Providers;

use Ceres\Caching\NavigationCacheSettings;
use Ceres\Caching\SideNavigationCacheSettings;
use IO\Services\ContentCaching\Services\Container;
use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Events\Dispatcher;
use Plenty\Plugin\Templates\Twig;
use IO\Helper\TemplateContainer;
use IO\Extensions\Functions\Partial;
use Plenty\Plugin\ConfigRepository;


/**
 * Class MBMuellerServiceProvider
 * @package MBMueller\Providers
 */
class MBMuellerServiceProvider extends ServiceProvider
{
    const PRIORITY = 0;

    public function register()
    {

    }

    public function boot(Twig $twig, Dispatcher $dispatcher, ConfigRepository $config)
    {

        $dispatcher->listen('IO.init.templates', function (Partial $partial)
        {
            pluginApp(Container::class)->register('Ceres::PageDesign.Partials.Header.NavigationList.twig', NavigationCacheSettings::class);
            pluginApp(Container::class)->register('Ceres::PageDesign.Partials.Header.SideNavigation.twig', SideNavigationCacheSettings::class);

            $partial->set('head', 'Ceres::PageDesign.Partials.Head');
            $partial->set('header', 'Ceres::PageDesign.Partials.Header.Header');
            $partial->set('page-design', 'Ceres::PageDesign.PageDesign');
            $partial->set('footer', 'Ceres::PageDesign.Partials.Footer');

            $partial->set('page-design', 'MBMueller::PageDesign.PageDesign');

            return false;
        }, self::PRIORITY);

        $dispatcher->listen('IO.tpl.category.item', function (TemplateContainer $container)
        {
            $container->setTemplate('MBMueller::Category.Item.CategoryItem');
            return false;
        }, self::PRIORITY);

        $dispatcher->listen('IO.tpl.item', function (TemplateContainer $container)
        {
            $container->setTemplate('MBMueller::Item.SingleItemWrapper');
            return false;
        }, self::PRIORITY);

        $dispatcher->listen('IO.tpl.search', function (TemplateContainer $container)
        {
            $container->setTemplate('MBMueller::ItemList.ItemListView');
            return false;
        }, self::PRIORITY);
    }
}

