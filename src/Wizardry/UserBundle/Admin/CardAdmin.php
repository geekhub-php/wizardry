<?php

namespace Wizardry\UserBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class CardAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        // get the current Image instance
        $image = $this->getSubject();

        // use $fileFieldOptions so we can add other options to the field
        $fileFieldOptions = array('required' => false);
        if ($image && ($webPath = $image->getWebPath())) {
            // get the container so the full path to the image can be set
            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request')->getBasePath().'/'.$webPath;

            // add a 'help' option containing the preview's img tag
            $fileFieldOptions['help'] = '<img src="'.$fullPath.'" class="admin-preview" />';
        }

        $formMapper
            ->add('name', 'text', array('label' => 'Card Name'))
            ->add('manaCost', 'text', array('label' => 'Mana Cost'))
            ->add('convertedManaCost', 'text', array('label' => 'Converted Mana Cost'))
            ->add('file', 'file', ['label' => 'Image'], $fileFieldOptions)
            ->add('rarity', 'text', array('label' => 'Rarity'))
            ->add('type', 'text', array('label' => 'Type'))
            ->add('subType', 'text', array('label' => 'SubType'))
            ->add('power', 'text', array('label' => 'Power'))
            ->add('toughness', 'text', array('label' => 'Toughness'))
            ->add('description')
            ->add('artDescription', 'text', array('label' => 'Art Description'))
            ->add('artist', 'text', array('label' => 'artist'))
//            ->add('artist', 'document', array('class' => 'Wizardry\MainBundle\Document\Card'))
        ;
    }

    public function prePersist($card) {
        $this->saveFile($card);
    }

    public function preUpdate($card) {
        $this->saveFile($card);
    }

    public function saveFile($card) {
        $basepath = $this->getRequest()->getBasePath();
        $card->upload($basepath);
    }


    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('rarity')
            ->add('type')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('name')
            ->add('manaCost')
            ->add('convertedManaCost')
            ->add('rarity')
            ->add('type')
            ->add('subType')
            ->add('power')
            ->add('toughness')
            ->add('description')
            ->add('artDescription')
            ->add('artist')
        ;
    }
}
