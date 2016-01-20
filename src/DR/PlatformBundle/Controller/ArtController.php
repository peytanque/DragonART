<?php
// src/DR/PlatformBundle/Controller/ArtController.php

namespace DR\PlatformBundle\Controller;

use DR\PlatformBundle\Entity\Artpurchase;
use DR\PlatformBundle\Entity\Type;
use DR\PlatformBundle\Entity\Folder;
use DR\PlatformBundle\Entity\Supplier;
use DR\PlatformBundle\Entity\Customer;
use DR\PlatformBundle\Entity\Area;
use DR\PlatformBundle\Entity\Support;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class ArtController extends Controller
{

	public function indexAction()
	{
		return $this->render('DRPlatformBundle:Art:index.html.twig');
	}

	public function viewAction()
	{
		$artpurchases = $this->getDoctrine()->getRepository('DRPlatformBundle:Artpurchase')->findAll();
		$types = $this->getDoctrine()->getRepository('DRPlatformBundle:Type')->findAll();
		$folders = $this->getDoctrine()->getRepository('DRPlatformBundle:Folder')->findAll();
		$suppliers = $this->getDoctrine()->getRepository('DRPlatformBundle:Supplier')->findAll();
		$customers = $this->getDoctrine()->getRepository('DRPlatformBundle:Customer')->findAll();
		$areas = $this->getDoctrine()->getRepository('DRPlatformBundle:Area')->findAll();
		$supports = $this->getDoctrine()->getRepository('DRPlatformBundle:Support')->findAll();
		return $this->render('DRPlatformBundle:Art:view.html.twig', array(	
			'artpurchases' 		=> $artpurchases,
			'types' 			=> $types,
			'folders' 			=> $folders,
			'suppliers' 		=> $suppliers,
			'customers' 		=> $customers,
			'areas' 			=> $areas,
			'supports' 			=> $supports,
			));
	}

	// TODO
	public function addAction(Request $request){

		$artpurchase = new Artpurchase();

		$artpurchase->setStartdate(new \Datetime());
		$artpurchase->setEnddate(new \Datetime());
		$types = $this->getDoctrine()->getRepository('DRPlatformBundle:Type')->findAll();

		$formArtpurchase = $this->createFormBuilder($artpurchase)
		->add('visualname', TextType::class)
		->add('linkfile', 	TextType::class)
		->add('cost', 		IntegerType::class)
		->add('refnum', 	TextType::class)
		->add('type', 		Hiddentype::class)
		->add('folder', 	TextType::class)
		->add('orderform', 	TextType::class)
		->add('supplier', 	TextType::class)
		->add('customer', 	TextType::class)
		->add('startdate', 	DateType::class)
		->add('enddate', 	DateType::class)
		// TODO
		->add('area', 		CollectionType::class)
		->add('support', 	CollectionType::class)
		//
		->add('copy', 		IntegerType::class)
		->add('comment', 	TextType::class)
		->add('save', 		SubmitType::class)
		->getForm();
		if ($request->isMethod('POST')) {
			$formArtpurchase->handleRequest($request);
			if ($formArtpurchase->isValid()) {
				return $this->addArtpurchaseAction($artpurchase);
			}
		}

		$type = new Type();
		$formType = $this->createFormBuilder($type)
		->add('name', 		TextType::class)
		->add('save', 		SubmitType::class)
		->getForm();
		if ($request->isMethod('POST')) {
			$formType->handleRequest($request);
			if ($formType->isValid()) {
				return $this->addTypeAction($type);
			}
		}

		$folder = new Folder();
		$formFolder = $this->createFormBuilder($folder)
		->add('refnum', 	TextType::class)
		->add('name', 		TextType::class)
		->add('save', 		SubmitType::class)
		->getForm();
		if ($request->isMethod('POST')) {
			$formFolder->handleRequest($request);
			if ($formFolder->isValid()) {
				return $this->addFolderAction($folder);
			}
		}

		$supplier = new Supplier();
		$formSupplier = $this->createFormBuilder($supplier)
		->add('suppliersociety', 	TextType::class)
		->add('save', 				SubmitType::class)
		->getForm();
		if ($request->isMethod('POST')) {
			$formSupplier->handleRequest($request);
			if ($formSupplier->isValid()) {
				return $this->addSupplierAction($supplier);
			}
		}

		$customer = new Customer();
		$formCustomer = $this->createFormBuilder($customer)
		->add('customersociety', 	TextType::class)
		->add('save', 				SubmitType::class)
		->getForm();
		if ($request->isMethod('POST')) {
			$formCustomer->handleRequest($request);
			if ($formCustomer->isValid()) {
				return $this->addCustomerAction($customer);
			}
		}

		// TODO
		$area = new Area();
		$formArea = $this->createFormBuilder($area)
		->add('country', 	TextType::class)
		->add('save', 		SubmitType::class)
		->getForm();
		if ($request->isMethod('POST')) {
			$formArea->handleRequest($request);
			if ($formArea->isValid()) {
				return $this->addAreaAction($area);
			}
		}

		// TODO
		$support = new Support();
		$formSupport = $this->createFormBuilder($support)
		->add('name', 		TextType::class)
		->add('save', 		SubmitType::class)
		->getForm();
		if ($request->isMethod('POST')) {
			$formSupport->handleRequest($request);
			if ($formSupport->isValid()) {
				return $this->addSupportAction($support);
			}
		}

		return $this->render('DRPlatformBundle:Art:add.html.twig', array(
			'addType' 			=> $formType->createView(),
			'addFolder' 		=> $formFolder->createView(),
			'addSupplier' 		=> $formSupplier->createView(),
			'addCustomer' 		=> $formCustomer->createView(),
			'addArea'			=> $formArea->createView(),
			'addSupport'		=> $formSupport->createView(),
			'addArtpurchase'	=> $formArtpurchase->createView(),
			'types' 			=> $types,
			));
	}

	// TODO
	public function addArtpurchaseAction(Artpurchase $artpurchase)
	{
		$em = $this->getDoctrine()->getManager();
		$em->persist($artpurchase);
		$em->flush();
		return $this->redirectToRoute('dr_add');
	}

	public function addTypeAction(Type $type)
	{
		$em = $this->getDoctrine()->getManager();
		$em->persist($type);
		$em->flush();
		return $this->redirectToRoute('dr_add');
	}

	public function addFolderAction(Folder $folder)
	{
		$em = $this->getDoctrine()->getManager();
		$em->persist($folder);
		$em->flush();
		return $this->redirectToRoute('dr_add');
	}

	public function addSupplierAction(Supplier $suppliersociety)
	{
		$em = $this->getDoctrine()->getManager();
		$em->persist($suppliersociety);
		$em->flush();
		return $this->redirectToRoute('dr_add');
	}

	public function addCustomerAction(Customer $customersociety)
	{
		$em = $this->getDoctrine()->getManager();
		$em->persist($customersociety);
		$em->flush();
		return $this->redirectToRoute('dr_add');
	}

	// TODO
	public function addAreaAction(Area $area)
	{
		$em = $this->getDoctrine()->getManager();
		$em->persist($area);
		$em->flush();
		return $this->redirectToRoute('dr_add');
	}

	// TODO
	public function addSupportAction(Support $support)
	{
		$em = $this->getDoctrine()->getManager();
		$em->persist($support);
		$em->flush();
		return $this->redirectToRoute('dr_add');
	}

// ----------------------------------------------------------------------------

	public function editAction()
	{
		return new Response('edit TODO');
	}

	public function deleteAction()
	{
		return new Response('delete TODO');
	}
}
