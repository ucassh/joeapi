<?php

namespace Joe;

use Joe\Club\ClubEntity;
use Joe\Club\ClubScraper;
use Joe\Club\Forum\ClubForumScraper;
use Joe\Club\Images\ClubImagesScraper;
use Joe\Club\Members\ClubMembersScraper;

class ClubFactory
{
    /**
     * @param array $params
     * @return ClubEntity
     */
    public function create(array $params = [])
    {
        return (new ClubEntity())
            ->setFounder($params['founder'] ? new User($params['founder']) : null)
            ->setId($params['id'] ?: -1)
            ->setThumbnail($params['thumbnail'] ?: '')
            ->setDescription($params['description'] ?: '')
            ->setCreated(new \DateTime($params['created'] ?: null))
            ->setName($params['name'] ?: '')
            ->setLastActivity(new \DateTime($params['last_activity'] ?: null))
            ->setMembersQuantity($params['members_quantity'] ?: -1)
            ->setType($params['type'] ?: '')
            ->setWatched($params['watched'] ?: -1)
            ->setPostsQuantity($params['posts_quantity'] ?: '')
            ->setMembersScraper($params['members_scraper'])
            ->setForumScraper($params['forum_scraper'])
            ->setImagesScraper($params['images_scraper']);
    }

    /**
     * @param ClubScraper $scraper
     * @return ClubEntity
     */
    public function createFromScraper(ClubScraper $scraper)
    {
        $clubId = $scraper->getId();
        $this->create(array(
            'id' => $clubId,
            'founder' => $scraper->getFounder(),
            'thumbnail' => $scraper->getThumbnail(),
            'description' => $scraper->getDescription(),
            'created' => $scraper->getCreated(),
            'name' => $scraper->getName(),
            'last_activity' => $scraper->getLastActivity(),
            'members_quantity' => $scraper->getMembersQuantity(),
            'type' => $scraper->getType(),
            'watched' => $scraper->getWatched(),
            'posts_quantity' => $scraper->getPostsQuantity(),
            'members_scraper' => new ClubMembersScraper($clubId),
            'forum_scraper' => new ClubForumScraper($clubId),
            'images_scraper' => new ClubImagesScraper($clubId)
        ));
    }
}
