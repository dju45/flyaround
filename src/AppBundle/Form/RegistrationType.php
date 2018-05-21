<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 21/05/18
 * Time: 12:24
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface as appUserRegistration;

class RegistrationType extends AbstractType
{
    public function buildForm(appUserRegistration $builder, array $options)
    {
        $builder->add('firstName')->add('lastName')->add('phoneNumber')->add('birthDate')->add('creationDate')->add('note')->add('isACertifiedPilot');
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }
}