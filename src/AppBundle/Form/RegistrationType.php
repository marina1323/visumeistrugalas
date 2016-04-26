<?php


namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('name', 'text', array('label'=>'form.name'))
            ->add('surname', 'text', array('label'=>'form.surname'))
            ->add('plainPassword', 'password', array(
                'label' => 'form.password',
            ));
    }

}