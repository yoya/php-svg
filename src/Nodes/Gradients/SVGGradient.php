<?php

namespace SVG\Nodes\Gradients;

use SVG\Nodes\SVGNodeContainer;

/**
 * This is the base class for linearGradient and radialGradient.
 * TODO: gradientUnits, gradientTransform, spreadMethod
 */
class SVGGradient extends SVGNodeContainer
{

    public function __construct()
    {
        parent::__construct();
    }
}
