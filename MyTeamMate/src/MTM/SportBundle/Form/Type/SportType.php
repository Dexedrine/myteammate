<?php
namespace MTM\SportBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SportType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
		{
		$builder->add('nomsport','choice', array('choices' => 'lal'));
		
		}
	
	public function setDefaultOptions(OptionsResolverInterface $resolver)
		{
		$resolver->setDefaults(array(
			'data_class' => 'MTM\SportBundle\Entity\Sport',
		));
		}
	
	public function getName()
		{
		return 'sport';
		}
}