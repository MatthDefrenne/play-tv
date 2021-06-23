<?php

namespace PlayTv\Twig;

use PlayTv\Utils\Feature;

class FeatureExtension extends \Twig_Extension
{
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('has_feature', [$this, 'hasFeature']),
        ];
    }

    public function hasFeature($feature)
    {
        return Feature::isActive($feature);
    }

    public function getName()
    {
        return 'playtv_feature';
    }
}
