<?php

namespace Wizardry\ParseBundle\Parser;

use Doctrine\Common\Collections\ArrayCollection;
use Guzzle\Http\Client;
use Symfony\Component\DomCrawler\Crawler;

class SitemapParser
{
    private $urls;
    const SITEMAP_URL = 'http://magiccards.info/sitemap.html';
    const SITE_URL = 'http://magiccards.info';
    /**
     * @var \Symfony\Component\DomCrawler\Crawler
     */
    private $crawler;

    public function __construct()
    {
        $client = new Client(self::SITEMAP_URL);
        $response = $client->get()->send();
        $this->crawler = new Crawler((string) $response->getBody());
    }

    public function parseUrlsByLocale($locale)
    {
        $position = 0;
        switch ($locale) {
            case 'en':
                $position = 0;
                break;
            case 'ru':
                $position = 8;
                break;

        }

        $this->urls = new ArrayCollection();
        $sitemapLinks = $this->crawler->filter('body > table[cellpadding="0"][cellspacing="0"][width="100%"][border="0"]')
            ->eq($position)->filter('a')->each(
                function (Crawler $node) {
                    return self::SITE_URL.$node->attr('href');
                });

        /*
         * @var \DomElement $domElement
         */
        for ($i = 0;$i<1;$i++) {
            print $sitemapLinks[$i];
            $client = new Client($sitemapLinks[$i]);
            $page = (string) $client->get()->send()->getBody();
            $crawler = new Crawler($page);

            $links = $crawler->filter('body > table[cellpadding="3"] > tr > td > a')->each(
                function (Crawler $node) {
                    return self::SITE_URL.$node->attr('href');
                });

            foreach ($links as $link) {
                $this->setUrl($link);
            }
        }
    }
    private function setUrl($url)
    {
        $this->urls[] = $url;
    }
    public function getUrls()
    {
        return $this->urls;
    }
}
