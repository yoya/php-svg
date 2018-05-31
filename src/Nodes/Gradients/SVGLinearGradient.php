<?php

namespace SVG\Nodes\Gradients;

use SVG\Nodes\SVGNodeContainer;
use SVG\Rasterization\SVGRasterizer;

/**
 * Represents the SVG tag 'linearGradients'.
 * Has the special attributes offset, stopColor
 */
class SVGLinearGradient extends SVGGradient
{
    const TAG_NAME = 'linearGradient';

    /**
     * @param string|null $x1 The x of the start position
     * @param string|null $y1 The y of the start position
     * @param string|null $x2 The x of the end position
     * @param string|null $y2 The y of the end position
     */
    public function __construct($x1 = null, $y1 = null, $x2 = null, $y2 = null)
    {
        parent::__construct();

        $this->setAttributeOptional('x1', $x1);
        $this->setAttributeOptional('y1', $y1);
        $this->setAttributeOptional('x2', $x2);
        $this->setAttributeOptional('y2', $y2);
    }



    /**
     * @return string The x of the start position
     */
    public function getX1()
    {
        return $this->getAttribute('x1');
    }

    /**
     * Sets the x of the start position
     *
     * @param string x1 The x of the start position
     *
     * @return $this This node instance, for call chaining.
     */
    public function setX1($x1)
    {
        return $this->setAttribute('x', $x2);
    }

    /**
     * @return string The y of the start position
     */
    public function getY1()
    {
        return $this->getAttribute('y1');
    }

    /**
     * Sets the y of the start position
     *
     * @param string y1 The y of the start position
     *
     * @return $this This node instance, for call chaining.
     */
    public function setY($y1)
    {
        return $this->setAttribute('y1', $y1);
    }
    
    /**
     * @return string The x of the end position
     */
    public function getX2()
    {
        return $this->getAttribute('x2');
    }

    /**
     * Sets the x of the end position
     *
     * @param string x2 The x of the end position
     *
     * @return $this This node instance, for call chaining.
     */
    public function setX2($x2)
    {
        return $this->setAttribute('x2', $x2);
    }

    /**
     * @return string The y of the end position
     */
    public function getY2()
    {
        return $this->getAttribute('y2');
    }

    /**
     * Sets the y of the end position
     *
     * @param string y2 The y of the end position
     *
     * @return $this This node instance, for call chaining.
     */
    public function setY2($y2)
    {
        return $this->setAttribute('y2', $y2);
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

        $rasterizer->render('linearGradient', array(
            'x1'   => $this->getX1(),
            'y1'   => $this->getY1(),
            'x2'   => $this->getX2(),
            'y2'   => $this->getY2(),
        ), $this);
    }
}
