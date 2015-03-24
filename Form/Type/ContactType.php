<?php

namespace Kristofvc\Contact\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContactType extends AbstractType implements ContactTypeInterface
{
    /**
     * @var bool
     */
    private $hasRecaptcha = false;

    /**
     * @param $hasRecaptcha
     */
    public function __construct($hasRecaptcha)
    {

        $this->hasRecaptcha = $hasRecaptcha;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text', ['required' => true, 'attr' => [ 'placeholder' => 'Name', 'tabindex' => 1 ]]);
        $builder->add('email', 'email', ['required' => true, 'attr' => [ 'placeholder' => 'E-mail', 'tabindex' => 1 ]]);
        if ($this->hasRecaptcha) {
            $builder->add('recaptcha', 'ewz_recaptcha');
        }
        $builder->add('message', 'textarea', ['required' => true, 'attr' => [ 'placeholder' => 'Message', 'tabindex' => 1, 'rows' => 7 ] ]);
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Kristofvc\Contact\Model\Contact',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'contact_type';
    }
}