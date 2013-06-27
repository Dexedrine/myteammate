<?php
namespace MTM\SportBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SlotType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
		{
		$builder->add('day', 'choice', array(
			'choices'   => array(
				'lundi'   => 'Lundi',
				'mardi' => 'Mardi',
				'mercredi'   => 'Mercredi',
				'jeudi'   => 'Jeudi',
				'vendredi' => 'Vendredi',
				'samedi'   => 'Samedi',
				'dimanche'   => 'Dimanche',
			),
			'multiple'  => false,
		));
		$minutes =  array(0,15,30,45);
		$builder->add('starthour','time',array(
				'minutes' => $minutes));
		$builder->add('endhour','time',array(
				'minutes' => $minutes));
		}
	
	public function setDefaultOptions(OptionsResolverInterface $resolver)
		{
		$resolver->setDefaults(array(
			'data_class' => 'MTM\SportBundle\Entity\Slot',
		));
		}
	
	public function getName()
		{
		return 'slot';
		}
}