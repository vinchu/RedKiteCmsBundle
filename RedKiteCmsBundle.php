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

namespace RedKiteLabs\RedKiteCms\RedKiteCmsBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use RedKiteLabs\RedKiteCms\RedKiteCmsBundle\DependencyInjection\Compiler\RegisterCmsListenersPass;
use RedKiteLabs\RedKiteCms\RedKiteCmsBundle\Core\Compiler\BlocksCompilerPass;

/**
 * RedKiteCmsBundle
 *
 * @author RedKite Labs <webmaster@redkite-labs.com>
 */
class RedKiteCmsBundle extends Bundle
{

    /**
     * @inheritdoc
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new RegisterCmsListenersPass());
        $container->addCompilerPass(new BlocksCompilerPass());
    }
}
