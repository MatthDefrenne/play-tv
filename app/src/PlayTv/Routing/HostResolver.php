<?php

namespace PlayTv\Routing;

class HostResolver
{
    private $hostsCountries = array();
    private $hostsLocales = array();
    private $hostsTimezones = array();
    private $hostsKeys = array();
    private $dotTvHost;
    private $dotFrHost;

    public function __construct(array $hostsCountries, array $hostsLocales, array $hostsTimezones, array $hostsKeys, $dotTvHost, $dotFrHost)
    {
        $this->hostsCountries = $hostsCountries;
        $this->hostsLocales = $hostsLocales;
        $this->hostsTimezones = $hostsTimezones;
        $this->hostsKeys = $hostsKeys;
        $this->dotTvHost = $dotTvHost;
        $this->dotFrHost = $dotFrHost;
    }

    public function isDotTv($host, $strict = false)
    {
        return $strict ? 0 === strcmp($this->dotTvHost, $host) : false !== strpos($host, $this->dotTvHost);
    }

    public function isDotFr($host, $strict = false)
    {
        return $strict ? 0 === strcmp($this->dotFrHost, $host) : false !== strpos($host, $this->dotFrHost);
    }

    /**
     * @deprecated
     */
    public function getHostForLocale($locale, $default = null)
    {
        $country = \Locale::getRegion($locale);
        $language = \Locale::getPrimaryLanguage($locale);

        // There is a specific host for the country
        if ($host = $this->getHostForCountry($country)) {
            return $host;
        }

        return $this->getHostForLanguage($locale, $default);
    }

    /**
     * @deprecated
     */
    public function getHostForLanguage($language, $default = null)
    {
        if ('fr' === $language) {
            return $this->dotFrHost;
        }

        if ('en' === $language) {
            return $this->dotTvHost;
        }

        $countryByLanguage = [
            'de' => 'DE',
            'it' => 'IT',
            'pt' => 'PT',
            'tr' => 'TR',
            'es' => 'ES',
        ];

        if (isset($countryByLanguage[$language])) {
            return $this->getHostForCountry($countryByLanguage[$language]);
        }

        return $default;
    }

    /**
     * @deprecated
     */
    public function getHostForCountry($country, $default = null)
    {
        foreach ($this->hostsCountries as $host => $hostCountry) {
            if ($hostCountry === $country) {
                return $host;
            }
        }

        return $default;
    }

    public function getLocaleForHost($host, $default = null)
    {
        return isset($this->hostsLocales[$host]) ? $this->hostsLocales[$host] : $default;
    }

    public function getCountryForHost($host, $default = null)
    {
        return isset($this->hostsCountries[$host]) ? $this->hostsCountries[$host] : $default;
    }

    public function getTimezoneForHost($host)
    {
        if (isset($this->hostsTimezones[$host])) {
            return new \DateTimeZone($this->hostsTimezones[$host]);
        }

        return new \DateTimeZone(date_default_timezone_get());
    }

    public function getKeyForHost($host)
    {
        if (!isset($this->hostsKeys[$host])) {
            throw new \LogicException(sprintf('No key is defined for host %', $host));
        }

        return $this->hostsKeys[$host];
    }

    public function getAllHosts()
    {
        $hosts = array_merge(array_keys($this->hostsCountries), [
            $this->getDotFrHost(),
            $this->getDotTvHost(),
        ]);

        return array_values(array_unique($hosts));
    }

    public function getDotFrHost()
    {
        return $this->dotFrHost;
    }

    public function getDotTvHost()
    {
        return $this->dotTvHost;
    }

    /**
     * Get fixed country code for domain that matches.
     *
     * @param string $host
     * @param mixed  $default
     *
     * @return mixed country_code if match found, null otherwise
     */
    public function getFixedCountryCodeForHost($host, $default = null)
    {
        if ($this->isDotTv($host, true)) {
            return $default;
        }

        return $this->getCountryForHost($host, $default);
    }
}
