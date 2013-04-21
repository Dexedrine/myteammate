<?php
namespace MTM\SportBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PracticeType extends AbstractType {
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('idsport', 'entity' ,
			array( 'class' => 'MTMSportBundle:Sport',
					'property' => 'nomsport'));
		$builder->add('idplace', new PlaceType() );
		/*$builder->add('idplace', 'entity' ,
			array( 'class' => 'MTMSportBundle:Place',
					'property' => 'address'));*/
		$builder->add('idlevel', 'entity' ,
			array( 'class' => 'MTMSportBundle:Level',
					'property' => 'level'));
		$builder->add('idslots', 'collection',
						array('type' => new SlotType(), 
								'allow_add' => true,
								'allow_delete' => true,
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
