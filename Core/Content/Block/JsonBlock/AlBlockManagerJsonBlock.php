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

namespace AlphaLemon\AlphaLemonCmsBundle\Core\Content\Block\JsonBlock;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use AlphaLemon\AlphaLemonCmsBundle\Core\Content\Validator\AlParametersValidatorInterface;
use AlphaLemon\AlphaLemonCmsBundle\Core\Repository\Factory\AlFactoryRepositoryInterface;
use AlphaLemon\AlphaLemonCmsBundle\Core\Content\Block\AlBlockManager;

/**
 * AlBlockManagerJson manages a json content
 *
 * @author alphalemon <webmaster@alphalemon.com>
 */
abstract class AlBlockManagerJsonBlock extends AlBlockManager
{
    /**
     * {@inheritdoc}
     *
     * Extends the base edit method to manage a json content
     */
    protected function edit(array $values)
    {
        if (array_key_exists('HtmlContent', $values)) {
            $unserializedData = array();
            $serializedData = $values['HtmlContent'];
            parse_str($serializedData, $unserializedData);

            $commonMessageText = 'The best way to add a block which uses json to manage its data, is extending the form "AlphaLemon\AlphaLemonCmsBundle\Core\Form\JsonBlock\JsonBlockType" which already handles this configuration for you';

            if (!array_key_exists("al_json_block", $unserializedData)) {
                throw new Exception\InvalidFormConfigurationException('There is a configuration error in the form that manages this content: you must name that form "al_json_block". ' . $commonMessageText);
            }

            $item = $unserializedData["al_json_block"];
            if (!array_key_exists("id", $item)) {
                throw new Exception\InvalidFormConfigurationException('There is a configuration error in the form that manages this content: it must contain an hidden file called "id". ' . $commonMessageText);
            }

            $content = $this->decodeJsonContent($this->alBlock->getHtmlContent());
            $itemId = $item["id"];
            unset($item["id"]);
            if ($itemId != "") {
                $this->checkValidItemId($itemId, $content);
                $content[$itemId] = $item;
            }
            else {
                $content[] = $item;
            }

            $values['HtmlContent'] = json_encode($content);
        }

        if (array_key_exists('RemoveItem', $values)) {
            $itemId = $values['RemoveItem'];
            $content = $this->decodeJsonContent($this->alBlock->getHtmlContent());
            $this->checkValidItemId($itemId, $content);
            unset($content[$itemId]);
            $content = array_values($content);

            $values['HtmlContent'] = json_encode($content);
        }

        return parent::edit($values);
    }

    public static function decodeJsonContent($content)
    {
        $content = json_decode($content, true);
        if (null === $content) {
            throw new Exception\InvalidJsonFormatException('The content format is wrong. You should remove the content and add it again.');
        }

        return $content;
    }

    private function checkValidItemId($itemId, $content)
    {
        if (!array_key_exists($itemId, $content)) {
            throw new Exception\InvalidItemException('It seems that the item requested does not exist anymore');
        }
    }
}