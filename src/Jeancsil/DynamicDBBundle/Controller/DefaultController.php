<?php

namespace Jeancsil\DynamicDBBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="default_index")
     * @Template()
     */
    public function indexAction()
    {
    	$company = $this->getRequest()->attributes->get('company');

    	$electors = $this->getDoctrine()->getRepository('JeancsilDynamicDBBundle:Post', 'customer')->findAll();
    	$companies = $this->getDoctrine()->getRepository('JeancsilDynamicDBBundle:Company', 'default')->findAll();

    	#print_r($electors);
    	print_r($companies);

        return array('company' => $company->getDomain());
    }
}
