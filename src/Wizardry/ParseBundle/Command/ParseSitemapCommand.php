<?php

namespace Wizardry\ParseBundle\Command;

use Wizardry\ParseBundle\Document\SiteUrl;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
//use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ODM\MongoDB\Tools\Console\Command;
use Doctrine\ODM\MongoDB\Tools\Console;

class ParseSitemapCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
//            ->setName('soy:parse:sitemap')
            ->setName('parse:sitemap')
            ->setDescription('Parse sitemap of magiccards.info')
            ->addOption(
                'lang',
                null,
                InputOption::VALUE_REQUIRED,
                'What language parse'
            );
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $container = $this->getContainer();
        $lang = $input->getOption('lang');
        $parser = $container->get('sitemap_parser');
        $parser->parseUrlsByLocale($lang);
        $doctrineManager = $container->get('doctrine_mongodb');
        $documentManager = $doctrineManager->getManager();
        $doctrineManager->resetManager();
        $urls = $parser->getUrls();
        foreach ($urls as $url) {
            $document = new SiteUrl();
            $document->setUrl($url);
            $document->setLocale($lang);
            $documentManager->persist($document);
        }
        $documentManager->flush();
    }
}
