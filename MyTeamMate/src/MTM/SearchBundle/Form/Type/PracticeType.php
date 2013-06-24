<?php
namespace MTM\SearchBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PracticeType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
		{
			$builder->add('idsport', 'entity' ,
			array( 'class' => 'MTMSportBundle:Sport',
					'property' => 'nomsport',
					'empty_value' => 'Choisissez un sport'));
			$builder->add('idlevel' , 'entity' ,
			array( 'class' => 'MTMSportBundle:Level',
					'property' => 'level'));
		}
	
	public function setDefaultOptions(OptionsResolverInterface $resolver)
		{
		$resolver->setDefaults(array(
			'required' => false,
		));
		}
	
	public function getName()
		{
		return 'practice';
		}
}