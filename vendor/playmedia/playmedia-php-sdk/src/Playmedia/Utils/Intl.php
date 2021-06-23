<?php

namespace Playmedia\Utils;

use Symfony\Component\Intl\Intl as SymfonyIntl;

/**
 * Helper class for Symfony's Intl.
 * Provides caching and shortcut methods.
 */
class Intl
{
    private static $locales = [];
    private static $countryLanguageCodes = [];
    private static $languageCountryCodes = [];
    private static $countryNames = [];
    private static $languageNames = [];

    private static function getLocales()
    {
        if (empty(self::$locales)) {
            self::$locales = array_keys(SymfonyIntl::getLocaleBundle()->getLocaleNames());
        }

        return self::$locales;
    }

    /**
     * Returns an array of countries, indexed by ISO code.
     *
     * @param string $locale The locale to use for country names
     *
     * @return array
     */
    public static function getCountries($locale = null)
    {
        if (!isset(self::$countryNames[$locale])) {
            self::$countryNames[$locale] = SymfonyIntl::getRegionBundle()->getCountryNames($locale);
        }

        return self::$countryNames[$locale];
    }

    /**
     * Returns an array of languages, indexed by ISO code.
     *
     * @param string $locale The locale to use for language names
     *
     * @return array
     */
    public static function getLanguages($locale = null)
    {
        if (!isset(self::$languageNames[$locale])) {
            self::$languageNames[$locale] = SymfonyIntl::getLanguageBundle()->getLanguageNames($locale);
        }

        return self::$languageNames[$locale];
    }

    /**
     * Returns the name of a country.
     *
     * @param string $country The ISO code of the country
     * @param string $locale  The locale to use for country name
     *
     * @return array
     */
    public static function getCountryName($country, $locale = null)
    {
        $countries = self::getCountries($locale);

        return $countries[$country];
    }

    /**
     * Returns the name of a language.
     *
     * @param string $language The ISO code of the language
     * @param string $locale   The locale to use for language name
     *
     * @return array
     */
    public static function getLanguageName($language, $locale = null)
    {
        $languages = self::getLanguages($locale);

        return ucfirst($languages[$language]);
    }

    /**
     * Returns a list of ISO language codes spoken in $country.
     *
     * @param string $country The ISO code of the country
     *
     * @return array
     */
    public static function getCountryLanguageCodes($country)
    {
        if (!isset(self::$countryLanguageCodes[$country])) {
            $languages = [];
            foreach (self::getLocales() as $locale) {
                if (\Locale::getRegion($locale) == $country) {
                    if ($language = \Locale::getPrimaryLanguage($locale)) {
                        $languages[$language] = $language;
                    }
                }
            }

            self::$countryLanguageCodes[$country] = $languages;
        }

        return self::$countryLanguageCodes[$country];
    }

    /**
     * Returns a list of languages spoken in $country, indexed by ISO code.
     *
     * @param string $country The ISO code of the country
     * @param string $locale  The locale to use for language name
     *
     * @return array
     */
    public static function getCountryLanguages($country, $locale = null)
    {
        $languages = self::getCountryLanguageCodes($country);

        foreach ($languages as $key => $value) {
            $languages[$key] = ucfirst(SymfonyIntl::getLanguageBundle()->getLanguageName($value, $country, $locale));
        }

        return $languages;
    }

    /**
     * Returns true if $language is spoken in $country.
     *
     * @param string $country  The ISO code of the country
     * @param string $language The ISO code of the language
     *
     * @return bool
     */
    public static function isCountryLanguage($country, $language)
    {
        $languages = self::getCountryLanguageCodes($country);

        return isset($languages[$language]);
    }

    /**
     * Returns a list of ISO country codes where $language is spoken.
     *
     * @param string $language The ISO code of the language
     *
     * @return array
     */
    public static function getLanguageCountryCodes($language)
    {
        if (!isset(self::$languageCountryCodes[$language])) {
            $countries = [];

            foreach (self::getLocales() as $locale) {
                if (\Locale::getPrimaryLanguage($locale) == $language) {
                    if ($country = \Locale::getRegion($locale)) {
                        $countries[$country] = $country;
                    }
                }
            }

            self::$languageCountryCodes[$language] = $countries;
        }

        return self::$languageCountryCodes[$language];
    }
}
