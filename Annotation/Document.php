<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ONGR\ElasticsearchBundle\Annotation;

use ONGR\ElasticsearchBundle\Mapping\DumperInterface;

/**
 * Annotation to mark a class as an Elasticsearch document.
 *
 * @Annotation
 * @Target("CLASS")
 */
final class Document implements DumperInterface
{
    /**
     * @var string
     */
    public $type;

    /**
     * @var bool
     */
    public $enabled;

    /**
     * @var array
     */
    public $all;

    /**
     * @var string
     */
    public $dynamic;

    /**
     * @var array
     */
    public $dynamicTemplates;
    
    /**
     * @var array
     */
    public $transform;

    /**
     * @var array
     */
    public $dynamicDateFormats;

    /**
     * {@inheritdoc}
     */
    public function dump(array $exclude = [])
    {
        return array_diff_key(
            [
                'enabled' => $this->enabled,
                '_all' => $this->all,
                'dynamic' => $this->dynamic,
                'dynamic_templates' => $this->dynamicTemplates,
                'transform' => $this->transform,
                'dynamic_date_formats' => $this->dynamicDateFormats,
            ],
            $exclude
        );
    }
}
