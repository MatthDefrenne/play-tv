<?php
/**
 * PHPlay Framework.
 *
 * route.conf validator
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
final class ppl_validator_route extends ppl_validator
{
    private $pattern_a = ':action',
        $pattern_c = ':controller',
        $pattern_p = ':params',
        $patterns;

    /**
     * Parse the configuration data.
     *
     * @param array   $content the data (by reference)
     * @param ppl_var $config  configuration
     */
    public function parse(&$content, ppl_var $config)
    {
        // Allowed sections with defaults parameters
        $this->allowed[$this->default_section] = array(
                'action' => null,
                'controller' => null,
                'http_code' => null,
                'location' => null,
                'params' => null,
                'params_regex' => null,
                'redirect' => null,
                'suffix' => null,
        );
        $this->validate($content, false); // false means ignore section name

        // Check each route (data integrity)
        $this->patterns = array($this->pattern_a, $this->pattern_c, $this->pattern_p);
        foreach ($content as $name => $rpar) {
            $route = &$content[$name];
            $route['name'] = $name;

            // location parameter is mandatory
            if (!isset($route['location'])) {
                throw new ValidatorException("Missing parameter 'location' in route '{$name}'");
            }

            // parameters combination
            if (isset($route['redirect']) && isset($route['action'])) {
                throw new ValidatorException("'redirect' and 'action' parameters cannot be combined in route '{$name}'");
            }
            if (isset($route['redirect']) && isset($route['controller'])) {
                throw new ValidatorException("'redirect' and 'controller' parameters cannot be combined in route '{$name}'");
            }

            // Location patterns syntax
            $route['location'] = explode('/', trim($route['location'], '/'));
            foreach ($route['location'] as $pattern) {
                if (($pattern !== '') && (preg_match("#^[a-z]{1}[a-z0-9\-]{0,}[a-z0-9]{1}$#", $pattern) === 0) && !in_array($pattern, $this->patterns, true)) {
                    throw new ValidatorException("Invalid location pattern syntax '{$pattern}' in route '{$name}'");
                }
            }

            // Route must define a controller or a redirect
            if (!in_array($this->pattern_c, $route['location'], true) && !isset($route['controller']) && !isset($route['redirect'])) {
                // Controller pattern not found : first parameter must be static string
                $first_pattern = &$route['location'][0];
                if (($first_pattern === $this->pattern_a) || ($first_pattern === $this->pattern_p)) {
                    throw new ValidatorException("Undefined controller or redirect in route '{$name}'");
                }
            }

            // Location patterns validation
            $this->validate_location($name, $route['location']);

            // Check 'params' parameter syntax
            if (isset($route['params'])) {
                // Syntax
                if (preg_match('#^[0-9]{1,3}(?:,{0,1}|,{1}[0-9]{1,3})$#', $route['params']) === 0) {
                    throw new ValidatorException("Invalid params syntax '{$route['params']}' in route '{$name}'");
                }

                // Read params
                $params = explode(',', $route['params'], 2);
                $params[0] = (int) $params[0];
                if (count($params) === 1) {
                    $route['params'] = array($params[0], $params[0]);
                } else {
                    $params[1] = (int) ((is_numeric($params[1])) ? (int) $params[1] : $this->config->route->max_params);
                    if ($params[0] > $params[1]) {
                        throw new ValidatorException("Invalid params syntax '{$route['params']}' in route '{$name}'");
                    }
                    $route['params'] = array($params[0], $params[1]);
                }
            } else {
                // Default params value is '1, max_param' (one or more)
                if (in_array($this->pattern_p, $route['location'], true) === true) {
                    $route['params'] = array(1, $this->config->route->max_params);
                }
            }

            // HTTP code
            if (isset($route['http_code'])) {
                if (!is_numeric($route['http_code'])) {
                    throw new ValidatorException("Invalid http_code '{$route['http_code']}' in route '{$name}'");
                }
                $route['http_code'] = (int) $route['http_code'];
            }

            // Suffix
            if (isset($route['suffix']) && (preg_match('#^.{1}[a-zA-Z0-9]{1,10}$#', $route['suffix']) === 0)) {
                throw new ValidatorException("Invalid suffix '{$route['suffix']}' in route '{$name}'");
            }
        }

        // Rebuild indexes
        $content = array_values($content);

        return true;
    }

    /**
     * Validate the location patterns.
     *
     * @param string $name     route name
     * @param array  $location location patterns
     */
    public function validate_location($name, $location)
    {
        if (count($location) === 0) {
            return;
        }

        // Check for static string location patterns
        if (!in_array($this->pattern_a, $location, true) && !in_array($this->pattern_c, $location, true) && !in_array($this->pattern_p, $location, true)) {
            return;
        }

        // If first pattern is :action, second pattern must be :params
        if (($location[0] === $this->pattern_a) && (isset($location[1])) && ($location[1] !== $this->pattern_p)) {
            throw new ValidatorException("Invalid second location pattern '{$location[1]}' in route '{$name}'");
        }

        // If first pattern is :params, second pattern is forbidden
        if (($location[0] === $this->pattern_p) && (isset($location[1]))) {
            throw new ValidatorException("Invalid second location pattern '{$location[1]}' in route '{$name}'");
        }

        // :controller must be first pattern
        if (in_array($this->pattern_c, $location, true) && ($location[0] !== $this->pattern_c)) {
            throw new ValidatorException("'{$this->pattern_c}' must be first location pattern in route '{$name}'");
        }

        // If second pattern is :params, third pattern is forbidden
        if ((isset($location[1])) && ($location[1] === $this->pattern_p) && (isset($location[2]))) {
            throw new ValidatorException("Invalid third location pattern '{$location[2]}' in route '{$name}'");
        }

        // If second pattern is not :params, third pattern must be :params (if exist)
        if ((isset($location[1])) && ($location[1] !== $this->pattern_p) && (isset($location[2])) && ($location[2] !== $this->pattern_p)) {
            throw new ValidatorException("Invalid third location pattern '{$location[2]}' in route '{$name}'");
        }

        // :params must be last pattern
        if (in_array($this->pattern_p, $location, true) && (count($location) > 3)) {
            throw new ValidatorException("'{$this->pattern_p}' must be last location pattern in route '{$name}'");
        }
    }

    private function __clone()
    {
    }
}
