<?php
/**
 * PHPlay Framework.
 *
 * Router
 *
 * TODO: change $t_action, $t_controller and $t_action to constants
 * TODO: if one param is empty : /// ---> route does not match ?
 * TODO: add infos in documentation about Apache AllowEncodedSlashes directive
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
final class ppl_router
{
    private $config;
    private $routes;
    private $rcount;
    private $index;
    private $request_uri;
    private $t_action = ':action';
    private $t_controller = ':controller';
    private $t_params = ':params';

    /**
     * Constructor.
     *
     * @param ppl_var $config configuration object
     * @param array   $routes route configuration
     */
    public function __construct(ppl_var $config, $routes)
    {
        if (($routes === null) || !is_array($routes)) {
            throw new RouterException('Invalid route configuration');
        }
        $this->routes = $routes;
        $this->rcount = count($routes);
        $this->config = $config;
        $this->index = 0;
    }

    /**
     * Set the request URI to resolve.
     *
     * @param string $request_uri the request uri
     */
    public function set_request_uri($request_uri)
    {
        $this->request_uri = $request_uri;
        $this->index = 0;
    }

    /**
     * Return the next matching request.
     *
     * @return array the request to dispatch
     */
    public function request()
    {
        if (!is_string($this->request_uri) || ($this->request_uri === '')) {
            throw new RouterException('Request URI must be a non-empty string');
        }

        $uri_patterns = explode('/', trim($this->request_uri, '/'));
        $uri_count = count($uri_patterns);
        $t_action = $this->t_action;
        $t_controller = $this->t_controller;
        $t_params = $this->t_params;
        $def_act = $this->config->route->default_action;

        // Search and return the next matching route
        while ($this->index < $this->rcount) {
            $time_start = microtime(true);
            $route = &$this->routes[$this->index];
            $uri = $uri_patterns;
            $request = array(
                    'action' => null,
                    'controller' => null,
                    'http_code' => null,
                    'params' => null,
                    'redirect' => null,
                    'route' => $route['name'],
            );

            // Remove suffix from last uri pattern (if set)
            if (isset($route['suffix'])) {
                $last = &$uri[$uri_count - 1];
                $len = strlen($route['suffix']);
                if (mb_substr($last, -$len) !== $route['suffix']) {
                    ++$this->index;
                    continue;
                }
                $last = mb_substr($last, 0, -$len);
            }

            // First URI pattern
            $location = &$route['location'];
            if ($location[0] === $uri[0]) {
                // First URI pattern match with first location pattern (may be an empty string)
                if (isset($route['controller'])) {
                    $request['controller'] = $route['controller'];
                } elseif (isset($route['redirect'])) {
                    $request['redirect'] = $route['redirect'];
                } else {
                    $request['controller'] = $uri[0]; // TOFIX : if $uri[0] === '' --> controller will be empty string ! (see default_no_action route)
                }
                if ($location[0] === '') {
                    $request['action'] = (isset($route['action'])) ? $route['action'] : $def_act;
                }
            } elseif ($location[0] === $t_controller) {
                // First location pattern is :controller
                if (($uri[0] !== '') && ($this->is_valid($uri[0]) === false)) {
                    ++$this->index;
                    continue;
                }
                if (isset($route['controller'])) {
                    $request['controller'] = $route['controller'];
                } elseif (isset($route['redirect'])) {
                    $request['redirect'] = $route['redirect'];
                } else {
                    $request['controller'] = $uri[0];
                }
            } elseif ($location[0] === $t_action) {
                // First location pattern is :action
                if (($uri[0] !== '') && ($this->is_valid($uri[0]) === false)) {
                    ++$this->index;
                    continue;
                }
                if (isset($route['controller'])) {
                    $request['controller'] = $route['controller'];
                } elseif (isset($route['redirect'])) {
                    $request['redirect'] = $route['redirect'];
                }
                if (isset($route['action'])) {
                    $request['action'] = $route['action'];
                } else {
                    $request['action'] = ($uri[0] === '') ? $def_act : $uri[0];
                }
            } elseif ($location[0] === $t_params) {
                // First location pattern is :params
                if (isset($route['controller'])) {
                    $request['controller'] = $route['controller'];
                } elseif (isset($route['redirect'])) {
                    $request['redirect'] = $route['redirect'];
                }
                $request['action'] = (isset($route['action'])) ? $route['action'] : $def_act;
            } else {
                ++$this->index;
                continue;
            }

            // Second URI pattern
            if (($uri[0] !== $t_action) && ($uri[0] !== $t_params)) {
                if (!isset($uri[1]) && !isset($location[1])) {
                    // There is no second pattern (static route)
                    $request['action'] = (isset($route['action'])) ? $route['action'] : $def_act;
                } elseif (isset($uri[1]) || isset($location[1])) {
                    if (isset($location[1]) && ($location[1] !== $t_params)) {
                        if (isset($uri[1]) && !isset($location[1])) {
                            ++$this->index;
                            continue;
                        }
                        // Second location pattern exist
                        if (isset($uri[1])) {
                            if ($location[1] !== $uri[1]) {
                                if (($location[1] === $t_action) && ($this->is_valid($uri[1]) === true)) {
                                    // Second location pattern is :action
                                    $request['action'] = (isset($route['action'])) ? $route['action'] : $uri[1];
                                } else {
                                    ++$this->index;
                                    continue;
                                }
                            } else {
                                // Second location pattern matche second uri pattern
                                $request['action'] = (isset($route['action'])) ? $route['action'] : $uri[1];
                            }
                        } else {
                            ++$this->index;
                            continue;
                        }
                    } elseif (isset($location[1]) && ($location[1] === $t_params)) {
                        // Second location pattern is :params
                        $request['action'] = (isset($route['action'])) ? $route['action'] : $def_act;
                    }
                }
            }

            // Rest of URI
            // At this point, Controller and Action or Redirect are set
            // Check if parameters matches
            if (isset($route['params'])) {
                // Extract params from URI
                $index = array_search($t_params, $location, true); // $index cannot be FALSE
                $params = array_slice($uri, $index);

                if (!isset($route['params_regex'])) {
                    $params_count = count($params);
                    $range = &$route['params'];
                    // decode url parameters
                    foreach ($params as $k => $param) {
                        $params[$k] = urldecode($param);
                    }
                } else {
                    $params = implode('/', $params);
                    $params = urldecode($params); // decode url parameters
                    $matched = preg_match("#{$route['params_regex']}#", $params, $matches);
                    if (($matched === 0) || ($matched === false)) {
                        ++$this->index;
                        continue;
                    }
                    $params = (!isset($matches[1])) ? $matches : array_slice($matches, 1);
                    $params_count = count($params);
                    $range = &$route['params'];
                }

                // Check if param count is in range
                if (($params_count < $range[0]) || ($params_count > $range[1])) {
                    ++$this->index;
                    continue;
                }

                // replace $1, $2 etc. in redirect
                if ($request['redirect'] !== null && preg_match('#\$[1-9]+#', $request['redirect']) === 1) {
                    for ($i = 1; $i < ($params_count + 1); ++$i) {
                        $request['redirect'] = str_replace("\${$i}", $params[$i - 1], $request['redirect']);
                    }
                }

                $request['params'] = $params;
            } else {
                // Static location patterns (no params)
                $location_count = count($location);
                if ($location_count !== $uri_count) {
                    ++$this->index;
                    continue;
                }
                for ($i = 0; $i < $location_count; ++$i) {
                    if (($location[$i] !== $uri[$i]) && ($location[$i] !== $t_controller) && ($location[$i] !== $t_action)) {
                        ++$this->index;
                        continue(2);
                    }
                }
                $request['params'] = array();
            }

            // Set HTTP status code
            if (isset($route['http_code'])) {
                $request['http_code'] = $route['http_code'];
            } elseif ($request['redirect'] !== null) {
                $request['http_code'] = $this->config->response->default_redirect_code;
            } else {
                $request['http_code'] = $this->config->response->default_status_code;
            }

            // Replace all dashes to underscores
            $request['controller'] = strtr($request['controller'], '-', '_');
            $request['action'] = strtr($request['action'], '-', '_');

            // Time to resolve
            $request['resolve_time'] = number_format(microtime(true) - $time_start, 8, ',', '');

            // Set index and return request
            ++$this->index;

            return $request;
        }

        return false;
    }

    /**
     * Check if URI pattern is valid (controller or action name)
     *  - First char must be alpha
     *  - Only alpha, number and dash are allowed.
     *  - The last char cannot be a dash.
     *  - Must be at least 2 char in length.
     *
     * @param string $pattern the pattern of URI
     *
     * @return bool TRUE if valid, otherwise FALSE
     */
    private function is_valid($pattern)
    {
        if (preg_match("#^[a-z]{1}[a-z0-9\-]{0,}[a-z0-9]{1}$#", $pattern) === 1) {
            return true;
        }

        return false;
    }

    /**
     * This function is DEPRECATED & moved to ppl_request object.
     *
     * @see ppl_request::build_uri()
     *
     * @throws RouterException
     */
    public static function build_uri($controller, $action = '', $params = array(), $full = false, $suffix = '', $scheme = 'http')
    {
        throw new RouterException('ppl_router::build_uri() is DEPRECATED, please use ppl_request::build_uri()');
    }

    private function __clone()
    {
    }
}
final class RouterException extends Exception
{
}
