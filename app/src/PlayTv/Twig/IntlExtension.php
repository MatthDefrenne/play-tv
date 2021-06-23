<?php

namespace PlayTv\Twig;

class IntlExtension extends \Twig_Extensions_Extension_Intl
{
    public function getFilters()
    {
        $filters = parent::getFilters();

        foreach ($filters as $key => $filter) {
            if ('localizeddate' === $filter->getName()) {
                $ptvDateFormats = [
                    'de' => [
                        'short' => 'dd.MM',
                        'medium' => 'dd.MM',
                        'long' => 'd. MMMM',
                        'full' => 'EEEE, d. MMMM',
                    ],
                    'en' => [
                        'short' => 'M/d',
                        'medium' => 'MMM d',
                        'long' => 'MMMM d',
                        'full' => 'EEEE, MMMM d',
                    ],
                    'en_GB' => [
                        'short' => 'dd/MM',
                        'medium' => 'd MMM',
                        'long' => 'd MMMM',
                        'full' => 'EEEE, d MMMM',
                    ],
                    'es' => [
                        'short' => 'dd/MM',
                        'medium' => 'dd/MM',
                        'long' => "d 'de' MMMM",
                        'full' => "EEEE d 'de' MMMM",
                    ],
                    'fr' => [
                        'short' => 'dd/MM',
                        'medium' => 'd MMM',
                        'long' => 'd MMMM',
                        'full' => 'EEEE d MMMM',
                    ],
                    'it' => [
                        'short' => 'dd/MM',
                        'medium' => 'dd/MMM',
                        'long' => 'dd MMMM',
                        'full' => 'EEEE d MMMM',
                    ],
                    'pt' => [
                        'short' => 'dd/MM',
                        'medium' => 'dd/MM',
                        'long' => "d 'de' MMMM",
                        'full' => "EEEE, d 'de' MMMM",
                    ],
                    'tr' => [
                        'short' => 'dd.MM',
                        'medium' => 'd MMM',
                        'long' => 'd MMMM',
                        'full' => 'd MMMM EEEE',
                    ],
                ];

                $callable = function (\Twig_Environment $env, $date, $dateFormat = 'medium', $timeFormat = 'medium', $locale = null, $timezone = null, $format = null) use ($ptvDateFormats) {

                    $date = twig_date_converter($env, $date, $timezone);

                    $formatValues = array(
                        'none' => \IntlDateFormatter::NONE,
                        'short' => \IntlDateFormatter::SHORT,
                        'medium' => \IntlDateFormatter::MEDIUM,
                        'long' => \IntlDateFormatter::LONG,
                        'full' => \IntlDateFormatter::FULL,
                    );

                    $isPtvFormat = false;
                    if (0 === strpos($dateFormat, 'ptv:')) {
                        $dateFormat = str_replace('ptv:', '', $dateFormat);
                        if ('none' !== $dateFormat) {
                            $isPtvFormat = true;
                        }
                    }

                    $formatter = \IntlDateFormatter::create(
                        $locale,
                        $formatValues[$dateFormat],
                        $formatValues[$timeFormat],
                        $date->getTimezone()->getName(),
                        \IntlDateFormatter::GREGORIAN,
                        $format
                    );

                    $locale = $formatter->getLocale();

                    if ($isPtvFormat) {
                        $pattern = null;
                        if (isset($ptvDateFormats[$locale])) {
                            $pattern = $ptvDateFormats[$locale][$dateFormat];
                        } else {
                            $language = \Locale::getPrimaryLanguage($locale);
                            if (isset($ptvDateFormats[$language])) {
                                $pattern = $ptvDateFormats[$language][$dateFormat];
                            }
                        }
                        if (null !== $pattern) {
                            $formatter->setPattern($pattern);
                        }
                    }

                    return $formatter->format($date->getTimestamp());
                };

                $filters[$key] = new \Twig_SimpleFilter('localizeddate', $callable, array(
                    'needs_environment' => $filter->needsEnvironment(),
                ));
            }
        }

        return $filters;
    }
}
