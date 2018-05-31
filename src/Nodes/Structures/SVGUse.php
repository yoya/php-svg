<?php

namespace SVG\Nodes\Structures;

use SVG\Nodes\SVGNode;
use SVG\Rasterization\SVGRasterizer;

/**
 * Represents the SVG tag 'use'.
 */
class SVGUse extends SVGNode
{
    const TAG_NAME = 'use';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return string The link to a resource as a reference
     */
    public function getXlinkHref()
    {
        return $this->getAttribute('xlink:href');
    }

    /**
     * Sets the link to a resource as a reference
     *
     * @param string $xh The link to a resource as a reference
     *
     * @return $this This node instance, for call chaining.
     */
    public function setXlinkHref($xh)
    {
        return $this->setAttribute('xlink:href', $xx);
    }


    public function rasterize(SVGRasterizer $rasterizer)
    {
        if ($this->getComputedStyle('display') === 'none') {
            return;
        }
        
        $visibility = $this->getComputedStyle('visibility');
        if ($visibility === 'hidden' || $visibility === 'collapse') {
            return;
        }
        
        $rasterizer->render('use', array(
            'xmlns:xlink'  => 'http://www.w3.org/1999/xlink',
            'xlink:href'   => $this->getHref(),
            'fill'         => $this->getFill(),
        ), $this);
    }

}
