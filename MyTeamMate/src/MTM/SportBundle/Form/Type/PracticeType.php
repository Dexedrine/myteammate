<?php
namespace MTM\SportBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PracticeType extends AbstractType {
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('idsport', new SportType());
		$builder->add('idplace', new PlaceType());
		$builder->add('idlevel', new LevelType());
		$builder->add('idslots', 'collection',
						array('type' => new SlotType(), 
								'allow_add' => true,
								'by_reference' => false,));
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver
				->setDefaults(
						array(
								'data_class' => 'MTM\SportBundle\Entity\Practice',
								'cascade_validation' => true,));
	}

	public function getName() {
		return 'practice';
	}
}
