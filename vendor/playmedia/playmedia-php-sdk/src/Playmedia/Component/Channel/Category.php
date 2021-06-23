<?php

namespace Playmedia\Component\Channel;

/**
 * Category component.
 *
 * @author Jimmy Phimmasone <jimmy@playmedia.fr>
 */
class Category
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
     * Get television categories.
     *
     * @cache 1h
     *
     * @return mixed
     */
    public function collection()
    {
        $cacheKey = 'channels_categories';
        $categories = $this->caching->get($cacheKey);

        if (false !== $categories) {
            return $categories;
        }

        $qb = $this->conn->createQueryBuilder();

        $qb
            ->select(
                'category.id as category_id',
                'category.name as category',
                'category.order',
                'category.alias'
            )
            ->from('television_category', 'category')
            ->orderBy('category.order')
        ;

        $stmt = $qb->execute();

        if ($stmt->rowCount() === 0) {
            return array();
        }

        $categories = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $this->caching->set($cacheKey, $categories, 3600);

        return $categories;
    }
}
