<?php namespace JFusion\Plugins\wordpress;
/**
 * @category   Plugins
 * @package    JFusion\Plugins
 * @subpackage wordpress
 * @author     JFusion Team <webmaster@jfusion.org>
 * @copyright  2008 JFusion. All rights reserved.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link       http://www.jfusion.org
 */

/**
 * JFusion Front Class for Wordpress 3+
 * For detailed descriptions on these functions please check Plugin_Front
 *
 * @category   Plugins
 * @package    JFusion\Plugins
 * @subpackage wordpress
 * @author     JFusion Team <webmaster@jfusion.org>
 * @copyright  2008 JFusion. All rights reserved.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link       http://www.jfusion.org
 */
class Front extends \JFusion\Plugin\Front
{
    /**
     * @return string
     */
    function getRegistrationURL() {
        return 'wp-login.php?action=register';
    }

    /**
     * @return string
     */
    function getLostPasswordURL() {
        return 'wp-login.php?action=lostpassword';
    }

    /**
     * @return string
     */
    function getLostUsernameURL() {
        return 'wp-login.php?action=lostpassword';
    }
 }
