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

namespace RedKiteLabs\RedKiteCms\RedKiteCmsBundle\Core\Deploy\SitemapGenerator;

/**
 * The object deputated to deploy the website from development, RedKiteCms, to production,
 * the deploy bundle.
 *
 * @author RedKite Labs <webmaster@redkite-labs.com>
 *
 * @api
 */
interface SitemapGeneratorInterface
{
    /**
     * Writes the sitemap inside the given path for the provided website url
     *
     * @param string $path
     * @param string $websiteUrl
     */
    public function writeSiteMap($path, $websiteUrl);
}
