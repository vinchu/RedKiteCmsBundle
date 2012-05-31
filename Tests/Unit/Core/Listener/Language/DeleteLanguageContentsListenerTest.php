<?php
/*
 * This file is part of the AlphaLemon CMS Application and it is distributed
 * under the GPL LICENSE Version 2.0. To use this application you must leave
 * intact this copyright notice.
 *
 * Copyright (c) AlphaLemon <webmaster@alphalemon.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * For extra documentation and help please visit http://www.alphalemon.com
 *
 * @license    GPL LICENSE Version 2.0
 *
 */

namespace AlphaLemon\AlphaLemonCmsBundle\Tests\Unit\Core\Listener\Language;

use AlphaLemon\AlphaLemonCmsBundle\Tests\TestCase;
use AlphaLemon\AlphaLemonCmsBundle\Core\Listener\Language\DeleteLanguageContentsListener;

/**
 * DeleteLanguageContentsListenerTest
 *
 * @author AlphaLemon <webmaster@alphalemon.com>
 */
class DeleteLanguageContentsListenerTest extends Base\DeleteLanguageBaseListenerTest
{    
    protected function setUp()
    {
        $this->objectModel = $this->getMockBuilder('AlphaLemon\AlphaLemonCmsBundle\Core\Model\Propel\AlBlockModelPropel')
                                    ->disableOriginalConstructor()
                                    ->getMock();
        
        $this->manager = $this->getMockBuilder('AlphaLemon\AlphaLemonCmsBundle\Core\Content\Block\AlBlockManager')
                                    ->disableOriginalConstructor()
                                    ->getMock();
        
        $this->manager->expects($this->any())
            ->method('getBlockModel')
            ->will($this->returnValue($this->objectModel));
        
        parent::setUp();
        
        $this->testListener = new DeleteLanguageContentsListener($this->manager);
    }
    
    protected function setUpObject()
    {
        return $this->getMock('AlphaLemon\AlphaLemonCmsBundle\Model\AlBlock');
    }
}