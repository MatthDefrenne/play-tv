<?php

namespace PlayTv\Core;

/**
 * Interface for objects that are aware of the website displaying them.
 */
interface WebsiteAwareInterface
{
    /**
     * Returns true if the object is tied to a specific website.
     *
     * @return bool
     */
    public function hasWebsite();

    /**
     * Returns true if the object "belongs" to $website,
     * i.e. it should only be displayed on $website and nowhere else.
     *
     * @param Website $website
     *
     * @return bool
     */
    public function belongsToWebsite(Website $website);
}
