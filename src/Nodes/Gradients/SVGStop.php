<?php

namespace SVG\Nodes\Gradients;

use SVG\Nodes\SVGNode;
use SVG\Rasterization\SVGRasterizer;

/**
 * Represents the SVG tag 'line'.
 * Has the special attributes offset, stop-color
 */
class SVGStop extends SVGNode
{
    const TAG_NAME = 'stop';

    /**
     * @param string|null $offset The offset
     * @param string|null $stopColor The stopColor
     */
    public function __construct($offset = null, $stopColor = null)
    {
        parent::__construct();

        $this->setAttributeOptional('offset', $offset);
        $this->setAttributeOptional('stop-color', $stopColor);
    }



    /**
     * @return string The offset
     */
    public function getOffset()
    {
        return $this->getAttribute('offset');
    }

    /**
     * Sets the offset
     *
     * @param string $offset The offset
     *
     * @return $this This node instance, for call chaining.
     */
    public function setOffset($offset)
    {
        return $this->setAttribute('offset', $offset);
    }

    /**
     * @return string The stopColor
     */
    public function getStopColor()
    {
        return $this->getAttribute('stop-color');
    }

    /**
     * Sets the stopColor
     *
     * @param string $stopColor The stopColor
     *
     * @return $this This node instance, for call chaining.
     */
    public function setStopColor($stopColor)
    {
        return $this->setAttribute('stop-color', $stopColor);
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

        $rasterizer->render('stop', array(
            'offset'     => $this->getOffset(),
            'stop-color'  => $this->getStopColor(),
        ), $this);
    }
}
