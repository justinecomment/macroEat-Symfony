<?php 

namespace MacroBundle\Form;

use MacroBundle\Entity\Profil;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sexe', ChoiceType::class, array(
                'expanded' => true,
                'label'    => 'Vous êtes',
                'choices'  => array(
                    'Homme'    => 'homme',
                    'Femme'     => 'femme' ,
                )
            ))
            ->add('age', TextType::class, array(
                'required' => true,
                'label'    => 'Quel âge avez-vous?'
            ))
            ->add('poid', TextType::class, array(
                'required' => true,
                'label'    => 'Combien pesez-vous?'
            ))
            ->add('mensuration', TextType::class, array(
                'required' => true,
                'label'    => 'Combien mesurez-vous?'
            ))
            ->add('activite', ChoiceType::class, array(
                'expanded' => true,
                'label'    => 'Évaluez votre activité journalière',
                'choices'  => array(
                    'Peu actif'         => 'Peu actif' ,
                    'Moyennement actif' => 'Moyennement actif',
                    'Actif'             => 'Actif' ,
                    'Très actif'        => 'Très actif' ,
                )
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Profil::class,
        ));
    }
}
