<?php
/**
 * This file is part of the RedKite CMS Application and it is distributed
 * under the MIT License. To use this application you must leave
 * intact this copyright notice.
 *
 * Copyright (c) RedKite Labs <webmaster@redkite-labs.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * For extra documentation and help please visit http://www.redkite-labs.com
 *
 * @license    MIT License
 *
 */

namespace RedKiteLabs\RedKiteCms\RedKiteCmsBundle\Core\Repository\Factory\Exception;

use RedKiteLabs\RedKiteCms\RedKiteCmsBundle\Core\Exception\RedKiteCmsExceptionInterface;

/**
 * Thrown when the FactoryRepository cannot create a new repository
 *
 * @author RedKite Labs <webmaster@redkite-labs.com>
 */
class RepositoryNotFoundException extends \InvalidArgumentException implements RedKiteCmsExceptionInterface
{
}
