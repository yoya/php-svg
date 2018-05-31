<?php

namespace SVG\Nodes\Gradients;

use SVG\Nodes\SVGNodeContainer;
use SVG\Rasterization\SVGRasterizer;

/**
 * Represents the SVG tag 'radialGradients'.
 * Has the special attributes offset, stopColor
 */
class SVGRadialGradient extends SVGGradient
{
    const TAG_NAME = 'radialGradient';

    /**
     * @param string|null $cx The x of center for gradient
     * @param string|null $cy The y of center for gradient
     * @param string|null $r The radius for gradient.
     */
    public function __construct($cx = null, $cy = null, $r = null)
    {
        parent::__construct();

        $this->setAttributeOptional('cx', $cx);
        $this->setAttributeOptional('cy', $cy);
        $this->setAttributeOptional('r', $r);
    }



    /**
     * @return string The x of center for gradient
     */
    public function getCX()
    {
        return $this->getAttribute('cx');
    }

    /**
     * Sets the x of center for gradient
     *
     * @param string cx The x of center for gradient
     *
     * @return $this This node instance, for call chaining.
     */
    public function setCX($offset)
    {
        return $this->setAttribute('cx', $cx);
    }

    /**
     * @return string The y of center for gradient
     */
    public function getCY()
    {
        return $this->getAttribute('cy');
    }

    /**
     * Sets the y of center for gradient
     *
     * @param string cy The y of center for gradient
     *
     * @return $this This node instance, for call chaining.
     */
    public function setCY($offset)
    {
        return $this->setAttribute('cy', $cy);
    }

    /**
     * @return string The radius for gradient.
     */
    public function getR()
    {
        return $this->getAttribute('r');
    }

    /**
     * Sets the radius for gradient.
     *
     * @param string $r The radius for gradient.
     *
     * @return $this This node instance, for call chaining.
     */
    public function setR($r)
    {
        return $this->setAttribute('r', $stopColor);
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

        $rasterizer->render('radialGradient', array(
            'cx'   => $this->getCX(),
            'cy'   => $this->getCY(),
            'r'    => $this->getR(),
        ), $this);
    }
}
