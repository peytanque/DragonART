<?php

// src/DR/PlatformBundle/Controller/ArtController.php

namespace DR\PlatformBundle\Controller;

use DR\PlatformBundle\Entity\Type;
use DR\PlatformBundle\Entity\Folder;
use DR\PlatformBundle\Entity\Supplier;
use DR\PlatformBundle\Entity\Customer;
use DR\PlatformBundle\Entity\Area;
use DR\PlatformBundle\Entity\Support;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
		$table = $this->getDoctrine()->getRepository('DRPlatformBundle:Artpurchase');
		$tables = $table->findAll();
		return $this->render('DRPlatformBundle:Art:view.html.twig', array(
			'table' 		=> $table, 
			'tables' 		=> $tables,
			));
	}

// --------------------------ADD-------------------------------------------

	public function addAction(Request $request){
		
		$type = new Type();
		$formType = $this->createFormBuilder($type)
		->add('name', TextType::class)
		->add('save', SubmitType::class)
		->getForm();
		if ($request->isMethod('POST')) {
			$formType->handleRequest($request);
			if ($formType->isValid()) {
				return $this->addTypeAction($type);
			}
		}

		$folder = new Folder();
		$folderType = $this->createFormBuilder($folder)
		->add('refnum', TextType::class)
		->add('name', 	TextType::class)
		->add('save', 	SubmitType::class)
		->getForm();
		if ($request->isMethod('POST')) {
			$folderType->handleRequest($request);
			if ($folderType->isValid()) {
				return $this->addFolderAction($folder);
			}
		}

		$supplier = new Supplier();
		$supplierType = $this->createFormBuilder($supplier)
		->add('society', TextType::class)
		->add('save', 	SubmitType::class)
		->getForm();
		if ($request->isMethod('POST')) {
			$supplierType->handleRequest($request);
			if ($supplierType->isValid()) {
				return $this->addSupplierAction($supplier);
			}
		}

		$customer = new Customer();
		$customerType = $this->createFormBuilder($customer)
		->add('society', TextType::class)
		->add('save', 	SubmitType::class)
		->getForm();
		if ($request->isMethod('POST')) {
			$customerType->handleRequest($request);
			if ($customerType->isValid()) {
				return $this->addCustomerAction($customer);
			}
		}

		$area = new Area();
		$areaType = $this->createFormBuilder($area)
		->add('country', TextType::class)
		->add('save', 	SubmitType::class)
		->getForm();
		if ($request->isMethod('POST')) {
			$areaType->handleRequest($request);
			if ($areaType->isValid()) {
				return $this->addAreaAction($area);
			}
		}

		$support = new Support();
		$supportType = $this->createFormBuilder($support)
		->add('name', TextType::class)
		->add('save', 	SubmitType::class)
		->getForm();
		if ($request->isMethod('POST')) {
			$supportType->handleRequest($request);
			if ($supportType->isValid()) {
				return $this->addSupportAction($support);
			}
		}

		return $this->render('DRPlatformBundle:Art:add.html.twig', array(
			'addType' 		=> $formType->createView(),
			'addFolder' 	=> $folderType->createView(),
			'addSupplier' 	=> $supplierType->createView(),
			'addCustomer' 	=> $customerType->createView(),
			'addArea'		=> $areaType->createView(),
			'addSupport'	=> $supportType->createView()
			));
	}

	public function addTypeAction(Type $type)
	{
		$em = $this->getDoctrine()->getManager();
		$em->persist($type);
		$em->flush();
		return $this->redirectToRoute('dr_index');
	}

	public function addFolderAction(Folder $folder)
	{
		$em = $this->getDoctrine()->getManager();
		$em->persist($folder);
		$em->flush();
		return $this->redirectToRoute('dr_index');
	}

	public function addSupplierAction(Supplier $supplier)
	{
		$em = $this->getDoctrine()->getManager();
		$em->persist($supplier);
		$em->flush();
		return $this->redirectToRoute('dr_index');
	}

	public function addCustomerAction(Customer $customer)
	{
		$em = $this->getDoctrine()->getManager();
		$em->persist($customer);
		$em->flush();
		return $this->redirectToRoute('dr_index');
	}

	public function addSupportAction(Support $support)
	{
		$em = $this->getDoctrine()->getManager();
		$em->persist($support);
		$em->flush();
		return $this->redirectToRoute('dr_index');
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
