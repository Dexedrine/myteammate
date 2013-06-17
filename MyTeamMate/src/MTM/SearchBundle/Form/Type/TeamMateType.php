<?php
namespace MTM\SearchBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TeamMateType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
		{
			$builder->add('username','text');
			$builder->add('email','email');
		}
	
	public function setDefaultOptions(OptionsResolverInterface $resolver)
		{
		$resolver->setDefaults(array(
			'required' => false,
		));
		}
	
	public function getName()
		{
		return 'teammate';
		}
}