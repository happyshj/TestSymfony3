<?php
/**
 * Created by PhpStorm.
 * User: HSun
 * Date: 2017/3/29
 * Time: 16:32
 */

namespace Mytest\TableBundle\Controller;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Mytest\TableBundle\Entity\MainTable;
use Mytest\TableBundle\Entity\SubTable;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Mytest\TableBundle\Form\Type\SubTableType;

class AddtaskController extends Controller
{
    /**
     * @Route("/addTask", name="addTask")
     * @param Request $request
     * @return Response
     */
    public function addTaskFormAction(Request $request)
    {
        $subStatus = new SubTable();
        $subStatus->setStatus('Receive-In');

        $form = $this->createForm(SubTableType::class, $subStatus);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            // 获取变量值
            $status = $form->get('status')->getData();
            $owner = $form->get('owner')->getData();
            $date = $form->get('date')->getData();
            $str_date = $date->format('Y-m-d h:i');
            $customer_name = $form->get('maint')->getData()->getCustomerName();
            $customer_address = $form->get('maint')->getData()->getCustomerAddress();
            $customer_number = $form->get('maint')->getData()->getCustomerNumber();
            print_r($owner);

            $mainTable = new MainTable();
            $mainTable->setCustomerName($customer_name);
            $mainTable->setCustomerAddress($customer_address);
            $mainTable->setCustomerNumber($customer_number);

            $subStatus = new SubTable();
            $subStatus->setStatus($status);
            $subStatus->setDate($date);
            $subStatus->setOwner($owner);

            $subStatus->setMainTable($mainTable);

            $em = $this->getDoctrine()->getManager();
            $em->persist($mainTable);
            $em->persist($subStatus);
            $em->flush();

            //return $this->render('MytestTableBundle:Default:index.html.twig');
          //  return $this->render('MytestTableBundle::test.html.twig');
            return $this->redirectToRoute('homepage');
        }

        return $this->render('MytestTableBundle:addTask:addTask.html.twig', array(
            'form' => $form->createView()
        ));
    }
}