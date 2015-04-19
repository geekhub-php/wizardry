<?php

namespace Wizardry\ParseBundle\Parser;

use Guzzle\Http\Client;
use Symfony\Component\DomCrawler\Crawler;

class CardParser
{
    /**
     * @var \Symfony\Component\DomCrawler\Crawler
     */
    private $crawler;

    private $otherPart;

    /**
     * @param mixed $otherPart
     */
    public function setCardOtherPart($otherPart)
    {
        $this->otherPart = $otherPart;
    }

    /**
     * @return mixed
     */
    public function getCardOtherPart()
    {
        return $this->otherPart;
    }

    public function init($url)
    {
        $client = new Client($url);
        $response = $client->get()->send();
        $this->crawler = new Crawler((string) $response->getBody());
    }

    public function getCardName()
    {
        $name = $this->crawler->filter('body > table[style="margin: 0 0 0.5em 0;"] > tr >  td[valign="top"] > span[style="font-size: 1.5em;"] > a')->text();

        return $name;
    }

    public function getCardType()
    {
        $type_mana = $this->crawler->filter('body > table[style="margin: 0 0 0.5em 0;"] > tr >  td[valign="top"][style="padding: 0.5em;"][width="70%"] > p')->first()->text();
        $type = substr($type_mana, 0, strpos($type_mana, ' — '));

        if (strlen($type == null)) {
            $type = trim($type_mana);
        }

        return $type;
    }

    public function getCardSubType()
    {
        $type_mana = $this->crawler->filter('body > table[style="margin: 0 0 0.5em 0;"] > tr >  td[valign="top"][style="padding: 0.5em;"][width="70%"] > p')->first()->text();
        $type = substr($type_mana, 0, strpos($type_mana, ','));

        if (strlen($type == null)) {
            $type = trim($type_mana);
        }

        return $type;
    }

    public function getCardPower()
    {
        $type = $this->getCardType();
        if (!strpos($type, '/')) {
            $power = null;
        } else {
            $power = substr($type, strpos($type, '/')-1);
            $power =  substr($power, 0, 1);
        }

        return $power;
    }

    public function getCardToughness()
    {
        $type = $this->getCardType();
        if (!strpos($type, '/')) {
            $toughness = null;
        } else {
            $toughness = substr($type, strpos($type, '/')-1);
            $toughness = substr($toughness, -1);
        }

        return $toughness;
    }

    public function getCardRarity()
    {
        $set_rarity = $this->crawler->filter('body > table[style="margin: 0 0 0.5em 0;"] > tr >  td[style="padding: 0 0.5em;"] > small > b')->eq(1)->text();
        $rarity = substr($set_rarity, strpos($set_rarity, '(')+1, -1);

        return $rarity;
    }

    public function getCardSet()
    {
        $sets = $this->crawler->filter('body > table[style="margin: 0 0 0.5em 0;"] > tr >  td[style="padding: 0 0.5em;"] > small > u')
            ->eq(2)->previousAll()->filter('a')
            ->each(function (Crawler $node) {
                if (strpos($node->text(), '#') !== 0) {
                    return $node->text();
                }
            });

        foreach (array_keys($sets) as $key) {
            if ($sets[$key] == null or $sets[$key] == $this->getCardOtherPart()) {
                unset($sets[$key]);
            }
        }
        $sets = array_reverse($sets);

        $set_rarity = $this->crawler->filter('body > table[style="margin: 0 0 0.5em 0;"] > tr >  td[style="padding: 0 0.5em;"] > small > b')->eq(1)->text();
        array_unshift($sets, substr($set_rarity, 0, strpos($set_rarity, '(')-1));

        return $sets;
    }

    public function getCardArtist()
    {
        $number_artist = $this->crawler->filter('body > table[style="margin: 0 0 0.5em 0;"] > tr >  td[style="padding: 0 0.5em;"] > small > b')->text();
        $artist = substr($number_artist, strpos($number_artist, '(')+1, -1);

        return $artist;
    }

    public function getCardText()
    {
        $description = $this->crawler->filter('body > table[style="margin: 0 0 0.5em 0;"] > tr >  td[valign="top"] > p.ctext')->text();

        return $description;
    }

    public function getCardImage()
    {
        $image = $this->crawler->filter('body > table[style="margin: 0 0 0.5em 0;"] > tr > td[width="312"] > img')->attr('src');

        return $image;
    }

    public function getCardManaCost()
    {
        $type_mana = $this->crawler->filter('body > table[style="margin: 0 0 0.5em 0;"] > tr >  td[valign="top"][style="padding: 0.5em;"] > p')->first()->text();
        if (strpos($type_mana, ',') != false) {
            $mana = substr($type_mana, strpos($type_mana, ',')+1);
            $mana = trim($mana);
        } else {
            $mana = null;
        }

        return $mana;
    }

    public function getCardConvertedManaCost()
    {
        $type_mana = $this->crawler->filter('body > table[style="margin: 0 0 0.5em 0;"] > tr >  td[valign="top"][style="padding: 0.5em;"] > p')->first()->text();
        if (strpos($type_mana, ',') != false) {
            $mana = substr($type_mana, strpos($type_mana, ',')+1);
            $mana = trim($mana);
        } else {
            $mana = null;
        }

        return $mana;
    }

    public function getCardData()
    {
        $cardData = array(
            'name' => $this->getCardName(),
            'type' => $this->getCardType(),
            'subType' => $this->getCardSubType(),
            'rarity' => $this->getCardRarity(),
            'set' => $this->getCardSet(),
            'artist' => $this->getCardArtist(),
            'description' => $this->getCardText(),
            'artDescription' => $this->getCardText(),
            'image' => $this->getCardImage(),
            'manaCost' => $this->getCardManaCost(),
            'convertedManaCost' => $this->getCardConvertedManaCost(),
            'power' => $this->getCardPower(),
            'toughness' => $this->getCardToughness(),
            'otherPart' => $this->getCardOtherPart(),
        );

        $this->setCardOtherPart(null);

        return $cardData;
    }
}
