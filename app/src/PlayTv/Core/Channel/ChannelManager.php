<?php

namespace PlayTv\Core\Channel;

use Doctrine\DBAL\Connection as StorageGateway;
use Memcached as CachingGateway;
use Doctrine\Common\Cache\MemcachedCache;
use Doctrine\DBAL\Cache\QueryCacheProfile;
use PlayTv\Utils\Channel as ChannelUtils;

/**
 * Object manager for Channel Domain.
 *
 * @author David Guyon <david.guyon@playmedia.fr>
 */
class ChannelManager
{
    private $storage;
    private $cache;
    private $websites;

    public function __construct(StorageGateway $storage, CachingGateway $cache, array $websites = [])
    {
        $this->storage = $storage;
        $this->cache = $cache;
        $this->websites = $websites;
    }

    public function find($id)
    {
        $qb = $this->buildBaseQuery();
        $qb
            ->where('channel.channel_id = :id')
            ->setParameter(':id', $id, \PDO::PARAM_INT)
        ;

        return $this->doFind($qb);
    }

    public function findByAlias($alias)
    {
        $qb = $this->buildBaseQuery();
        $qb
            ->where('channel.alias = :alias')
            ->setParameter(':alias', $alias, \PDO::PARAM_STR)
        ;

        return $this->doFind($qb);
    }

    protected function buildBaseQuery()
    {
        $qb = $this->storage->createQueryBuilder()
            ->select(
                'channel.channel_id as id',
                'channel.alias',
                'channel.country'
            )
            ->addSelect(
                'category.alias as category_alias'
            )
            ->from('television_channel', 'channel')
            ->leftjoin('channel', 'television_category', 'category', 'category.id = channel.category_id')
            ->setMaxResults(1)
        ;

        return $qb;
    }

    protected function doFind($qb)
    {
        $cacheDriver = new MemcachedCache();
        $cacheDriver->setMemcached($this->cache);

        $qcp = new QueryCacheProfile(5 * 60, null, $cacheDriver);

        $stmt = $this->storage->executeCacheQuery(
            $qb->getSQL(),
            $qb->getParameters(),
            $qb->getParameterTypes(),
            $qcp
        );
        if ($stmt->rowCount() === 0) {
            return;
        }

        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        $stmt->closeCursor(); // @see http://doctrine-orm.readthedocs.org/projects/doctrine-dbal/en/latest/reference/caching.html

        // channel website, if satisfies conditions
        $data['_website'] = ChannelUtils::satisfiesWebsite($data, $this->websites);

        return new Channel($data);
    }
}
