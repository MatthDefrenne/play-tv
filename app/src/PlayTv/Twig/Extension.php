<?php

namespace PlayTv\Twig;

use Symfony\Component\Translation\TranslatorInterface;

class Extension extends \Twig_Extension
{
    private $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('date_for_humans', [$this, 'dateForHumans']),
            new \Twig_SimpleFunction('channels_whitelist', [$this, 'channelsWhitelist']),
        ];
    }

    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('diff_for_humans', array($this, 'diffForHumans')),
            new \Twig_SimpleFilter('localizedtimeslot', array($this, 'localizedTimeslot'), array('needs_environment' => true)),
        ];
    }

    /**
     * Function to have 'Ce soir', 'Aujourd'hui' or 'demain'.
     *
     * @param string $date
     * @param bool   $isShorten
     *
     * @return string
     */
    public function dateForHumans($date, $isShorten = false)
    {
        $timestamp = strtotime($date);
        $today = strtotime(date('Y-m-d 00:00:00'));
        $day = strtotime(date('Y-m-d 00:00:00', $timestamp));

        if ($today === $day) {
            return date('H', $timestamp) >= 19 ? $this->translator->trans('Tonight', [], 'twig_extensions') : $this->translator->trans('Today', [], 'twig_extensions');
        } elseif (($today + 86400) === $day) {
            return $this->translator->trans('Tomorrow', [], 'twig_extensions');
        } elseif (($today - 86400) === $day) {
            return $this->translator->trans('Yesterday', [], 'twig_extensions');
        } else {
            $format = ($isShorten) ? '%A' : '%A %d %B %Y';

            return strftime($format, $timestamp);
        }
    }

    /**
     * Function filter channels key.
     *
     * @param array $channels
     *
     * @return mixed string on success otherwise null
     */
    public function channelsWhitelist(array $channels, array $whitelistKeys, $isCollection = true)
    {
        $array_filter_keys = function (array $channels, $whitelistKeys) {
            return array_intersect_key($channels, array_flip($whitelistKeys));
        };

        if ($isCollection) {
            $channels = array_values($channels);
            foreach ($channels as $key => $value) {
                $channels[$key] = $array_filter_keys($value, $whitelistKeys);
            }

            return $channels;
        } else {
            return $array_filter_keys($channels, $whitelistKeys);
        }
    }

    /**
     * Filter difference date.
     *
     * @param int $date
     *
     * @return mixed string on success otherwise null
     */
    public function diffForHumans($duration)
    {
        if (!is_numeric($duration)) {
            return;
        }

        $days = (int) floor($duration / 1440);
        if ($days > 0) {
            return "{$days} jours";
        }

        $hours = (int) floor($duration / 60);

        if ($hours !== 0) {
            $minutes = (int) ($duration - ($hours * 60));

            if ($minutes === 0) {
                $minutes = '';
            } elseif ($minutes < 10) {
                $minutes = "0{$minutes}";
            }

            return "{$hours}h{$minutes}";
        }

        return $this->translator->transChoice('{0} %count% minute|{1} %count% minute|]1,Inf] %count% minutes', $duration, ['%count%' => $duration], 'twig_extensions');
    }

    /**
     * @param int timeslot
     *
     * @return string
     */
    public function localizedTimeslot(\Twig_Environment $env, $timeslot)
    {
        $timeslot .= ':00';

        if ($filter = $env->getFilter('localizeddate')) {
            $callable = $filter->getCallable();
            $timeslot = call_user_func_array($callable, array($env, $timeslot, 'none', 'short'));
        }

        return $timeslot;
    }

    public function getName()
    {
        return 'Playtv';
    }
}
