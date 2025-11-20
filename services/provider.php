<?php
/**
 * Plugin for Joomla! to work with Cloudflare's Universal SSL
 * @author MGS Creativa
 * @license  GNU General Public License, version 3 (http://www.gnu.org/licenses/gpl-3.0.html)
 * @url https://www.mgscreativa.com
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Extension\PluginInterface;
use Joomla\CMS\Factory;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;
use Joomla\Plugin\System\CloudFlareUniSSL\Extension\CloudFlareUniSSL;

return new class () implements ServiceProviderInterface {
    /**
     * Registers the service provider with a DI container.
     *
     * @param Container $container The DI container.
     *
     * @return  void
     *
     * @since   4.4.0
     */
    public function register(Container $container): void
    {
        $container->set(
            PluginInterface::class,
            function (Container $container) {
                $plugin = new CloudFlareUniSSL(
                    (array)PluginHelper::getPlugin('system', 'cloudflareunissl')
                );
                $plugin->setApplication(Factory::getApplication());

                return $plugin;
            }
        );
    }
};
