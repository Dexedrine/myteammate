<?php
namespace MTM\SearchBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SearchType extends AbstractType {
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('teammate', new TeamMateType());
		$builder->add('profile', new ProfileType());
		$builder->add('practice',new PracticeType());
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver
				->setDefaults(
						array('required' => false,
						 'cascade_validation' => true,));
	}

	public function getName() {
		return 'practice';
	}
}
