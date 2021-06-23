<?php

namespace Playmedia\Component\Channel;

/**
 * Theme component.
 *
 * @author Jimmy Phimmasone <jimmy@playmedia.fr>
 */
class Theme
{
    private $conn;
    private $caching;

    /**
     * Constructor.
     *
     * @param mixed $conn    Database connection instance
     * @param mixed $caching Caching instance
     */
    public function __construct($conn, $caching)
    {
        $this->conn = $conn;
        $this->caching = $caching;
    }

    /**
     * Get television themes.
     *
     * @cache 1h
     *
     * @return mixed
     */
    public function collection()
    {
        $cacheKey = 'channels_themes';
        $themes = $this->caching->get($cacheKey);

        if (false !== $themes) {
            return $themes;
        }

        $qb = $this->conn->createQueryBuilder();

        $qb
            ->select(
                'theme.id as theme_id',
                'theme.name as theme',
                'theme.order',
                'theme.alias'
            )
            ->from('television_theme', 'theme')
            ->orderBy('theme.order')
        ;

        $stmt = $qb->execute();

        if ($stmt->rowCount() === 0) {
            return array();
        }

        $themes = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $this->caching->set($cacheKey, $themes, 3600);

        return $themes;
    }
}
