<?php

namespace Wizardry\ParseBundle\Command;

use Wizardry\ParseBundle\Document\SiteUrl;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Yaml\Dumper;

class ParseCardCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('parse:card')
            ->setDescription("Parse card's page");
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $container = $this->getContainer();
        $parser = $container->get('card_parser');
        $dumper = new Dumper();
        $repository = $container->get('doctrine_mongodb')->getRepository('WizardryParseBundle:SiteUrl');
        $card_urls = $repository->findAll();

        $progress = $this->getHelperSet()->get('progress');
        $progress->start($output, count($card_urls));

        foreach ($card_urls as $card_url) {
            $parser->init($card_url->getUrl());
            $card_array[] = $parser->getCardData();
            $progress->advance();
        }
        $progress->finish();

        $yaml = $dumper->dump($card_array, 4);
        file_put_contents('src/Wizardry/MainBundle/DataFixtures/MongoDB/parsed_cards.yml', $yaml);
    }
}
