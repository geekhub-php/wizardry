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
        $formMapper
            ->add('name', 'text', array('label' => 'Card Name'))
            ->add('manaCost', 'text', array('label' => 'Mana Cost'))
            ->add('convertedManaCost', 'text', array('label' => 'Converted Mana Cost'))
            ->add('image', 'text', array('label' => 'Image link'))
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
