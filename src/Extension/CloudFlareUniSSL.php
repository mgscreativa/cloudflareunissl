<?php
/**
 * Plugin for Joomla! to work with Cloudflare's Universal SSL
 * @author MGS Creativa
 * @license  GNU General Public License, version 3 (http://www.gnu.org/licenses/gpl-3.0.html)
 * @url https://www.mgscreativa.com
 */

namespace Joomla\Plugin\System\CloudFlareUniSSL\Extension;

use Joomla\CMS\Event\Application\AfterInitialiseEvent;
use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\Event\Priority;
use Joomla\Event\SubscriberInterface;
use Joomla\CMS\Uri\Uri;

// phpcs:disable PSR1.Files.SideEffects
defined('_JEXEC') or die('Restricted access');

// phpcs:enable PSR1.Files.SideEffects

class CloudFlareUniSSL extends CMSPlugin implements SubscriberInterface
{
    /**
     * Returns an array of events this subscriber will listen to.
     *
     * @return array
     *
     * @since   2.0.0
     *
     *  Note that onAfterInitialise must be the first handlers to run for this
     *  plugin to operate as expected. These handlers load compatibility code which
     *  might be needed by other plugins
     */
    public static function getSubscribedEvents(): array
    {
        return [
            'onAfterInitialise' => ['onAfterInitialise', Priority::MAX],
        ];
    }

    public function onAfterInitialise(AfterInitialiseEvent $event)
    {
        if (
            isset($_SERVER['HTTP_CF_VISITOR']) &&
            str_contains($_SERVER['HTTP_CF_VISITOR'], 'https')
        ) {
            $_SERVER['HTTPS'] = 'on';
            $uri = Uri::getInstance();

            $uri->setScheme('https');
        }
    }
}
