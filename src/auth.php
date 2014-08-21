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
 
use JFusion\User\Userinfo;

/**
 * JFusion Auth Class for Wordpress 3+
 * For detailed descriptions on these functions please check Plugin_Auth
 *
 * @category   Plugins
 * @package    JFusion\Plugins
 * @subpackage wordpress
 * @author     JFusion Team <webmaster@jfusion.org>
 * @copyright  2008 JFusion. All rights reserved.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link       http://www.jfusion.org
 */
class Auth extends \JFusion\Plugin\Auth
{
/*
 * NOTE
 * In Wordpress 2.5 and up the password has generation is done by a public domain
 * Portable PHP password hashing framework. The same framework is used by phpBBs, but alas,
 * the signal character is changed. Because of this we cannot load the original framework
 * and the phpBB3 framework at the same time in case phpBB3 and wordpress are used together using
 * JFusion; For this reason the original class is put into the file PasswordHash.php is renamed to
 * PasswordHashOrg.php and the class PasswordHash has been renamed to PasswordHashOrg.
 * This way we have no clash in the hash classnames. 
 * 
 */


    /**
     * @param Userinfo $userinfo
     * @return string
     */
    function generateEncryptedPassword(Userinfo $userinfo) {
        $t_hasher = new PasswordHashOrg(8, true);
        $check = $t_hasher->CheckPassword($userinfo->password_clear, $userinfo->password);
        //$check will be true or false if the passwords match
        unset($t_hasher);
        //cleanup
        if ($check) {
            //password is correct and return the wordpress password hash
            return $userinfo->password;
        } else {
            //no PHPass used, return the md5 password hash
            $encrypt_password = md5($userinfo->password_clear);
            return $encrypt_password;
        }
    }
}
