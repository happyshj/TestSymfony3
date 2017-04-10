<?php
/**
 * Created by PhpStorm.
 * User: HSun
 * Date: 2017/3/31
 * Time: 10:28
 */

namespace Mytest\TableBundle\Controller;

use Mytest\TableBundle\Form\Type\CheckInType;
use Mytest\TableBundle\Form\Type\StatusAssignType;
use Mytest\TableBundle\Form\Type\StatusAwbType;
use Mytest\TableBundle\Form\Type\StatusGlobalType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Mytest\TableBundle\Entity\MainTable;
use Mytest\TableBundle\Entity\SubTable;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Mytest\TableBundle\Form\Type\StatusType;

class AddStatusController extends Controller
{
    /**
     * @Route("/addStatus/{main_id}", name="addStatus")
     */
    public function indexAction()
    {
        return $this->render('MytestTableBundle:addStatus:addStatus.html.twig');

    }

    /**
     * @Route("/addStatus/{main_id}/{status}", name="status" )
     * @param Request $request
     * @return Response
     */
    public function addStatusAction(Request $request, $status, $main_id)
    {
        $subStatus = new SubTable();

        date_default_timezone_set("Asia/Shanghai");
        $date = date('Y-m-d H:i');
        $subStatus->setStatus($status);
        $subStatus->setDate($date);

        switch ($status){
            case 'Check-In':
                $form = $this->createForm(StatusType::class, $subStatus);
                $form->handleRequest($request);

                if($form->isSubmitted() && $form->isValid()) {
                    // 增加子表记录
                    $subStatus = new SubTable();
                    $subStatus->setStatus($status);

                    $date1 = new \DateTime($date);
                    $subStatus->setDate($date1);
                    $owner = $form->get('owner')->getData();
                    $subStatus->setOwner($owner);

                    // 修改主表内容
                    $main_table = $this->getDoctrine()->getRepository('MytestTableBundle:MainTable')->find($main_id);

                            $sr = $form->get('maint')->getData()->getSr();
                            $rma = $form->get('maint')->getData()->getRma();
                            $jde = $form->get('maint')->getData()->getJde();
                            $pn = $form->get('maint')->getData()->getPn();
                            $sn = $form->get('maint')->getData()->getSn();
                            $main_table->setSr($sr);
                            $main_table->setRma($rma);
                            $main_table->setJde($jde);
                            $main_table->setPn($pn);
                            $main_table->setSn($sn);

                            $img = $form->get('maint')->getData()->getLinkedImg();
                            $fileName = md5(uniqid()).'.'.$img->guessExtension();

                            $img->move(
                                $this->getParameter('img_directory'),
                                $fileName
                            );

                            $main_table->setLinkedImg($fileName);

                    $subStatus->setMainTable($main_table);
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($subStatus);
                    $em->persist($main_table);
                    $em->flush();

                    return $this->redirectToRoute('homepage');
                }

                return $this->render('MytestTableBundle:addStatus:checkIn.html.twig', array(
                    'form' => $form->createView(),
                ));
                break;
            case 'Notify':
                $form = $this->createForm(StatusGlobalType::class, $subStatus);
                break;
            case 'Assign-owner':
                $form = $this->createForm(StatusAssignType::class, $subStatus);
                $form->handleRequest($request);

                if($form->isSubmitted() && $form->isValid()) {
                    // 增加子表记录
                    $subStatus = new SubTable();
                    $subStatus->setStatus($status);

                    $date1 = new \DateTime($date);
                    $subStatus->setDate($date1);
                    $owner = $form->get('owner')->getData();
                    $subStatus->setOwner($owner);

                    // 修改主表内容
                    $main_table = $this->getDoctrine()->getRepository('MytestTableBundle:MainTable')->find($main_id);

                            $assigned_owner = $form->get('maint')->getData()->getAssignedOwner();
                            $main_table->setAssignedOwner($assigned_owner);

                    $subStatus->setMainTable($main_table);
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($subStatus);
                    $em->persist($main_table);
                    $em->flush();

                    return $this->redirectToRoute('homepage');
                }

                return $this->render('MytestTableBundle:addStatus:assignedOwner.html.twig', array(
                    'form' => $form->createView(),
                ));
                break;
            case 'Repair-In':
                $form = $this->createForm(StatusGlobalType::class, $subStatus);
                break;
            case 'Ship-to-Factory':
                $form = $this->createForm(StatusGlobalType::class, $subStatus);
                break;
            case 'Ship-to-Customer':
                $form = $this->createForm(StatusGlobalType::class, $subStatus);
                break;
            case 'Ship-Out':
                $form = $this->createForm(StatusAwbType::class, $subStatus);
                $form->handleRequest($request);

                if($form->isSubmitted() && $form->isValid()) {
                    // 增加子表记录
                    $subStatus = new SubTable();
                    $subStatus->setStatus($status);

                    $date1 = new \DateTime($date);
                    $subStatus->setDate($date1);
                    $owner = $form->get('owner')->getData();
                    $subStatus->setOwner($owner);

                    // 修改主表内容
                    $main_table = $this->getDoctrine()->getRepository('MytestTableBundle:MainTable')->find($main_id);
                            $awb = $form->get('maint')->getData()->getAwb();
                            print_r($awb);
                            $main_table->setAwb($awb);

                    $subStatus->setMainTable($main_table);
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($subStatus);
                    $em->persist($main_table);
                    $em->flush();

                    print_r($date1);


                    return $this->redirectToRoute('homepage');
                }

                return $this->render('MytestTableBundle:addStatus:awb.html.twig', array(
                    'form' => $form->createView(),
                ));
                break;
        }

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            // 增加子表记录
            $subStatus = new SubTable();
            $subStatus->setStatus($status);

            $date1 = new \DateTime($date);
            $subStatus->setDate($date1);
            $owner = $form->get('owner')->getData();
            $subStatus->setOwner($owner);

            // 修改主表内容
            $main_table = $this->getDoctrine()->getRepository('MytestTableBundle:MainTable')->find($main_id);

            $subStatus->setMainTable($main_table);
            $em = $this->getDoctrine()->getManager();
            $em->persist($subStatus);
            $em->persist($main_table);
            $em->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('MytestTableBundle:addStatus:status.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}