<?php

namespace Mytest\TableBundle\Controller;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Mytest\TableBundle\Entity\MainTable;
use Mytest\TableBundle\Entity\SubTable;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Mytest\TableBundle\Form\Type\SubTableType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $main_repository = $this->getDoctrine()->getRepository('MytestTableBundle:MainTable');
        $sub_repository = $this->getDoctrine()->getRepository('MytestTableBundle:SubTable');

        $main_count = count($main_repository->findAll());

        $table = array();

         //获取主表数据

        $main_count_temp = $main_count;
        for($i = 0; $i < $main_count; $i ++){
            $table[$i]['id'] = $main_count_temp;
            $table[$i]['sr'] = $main_repository->find($main_count_temp)->getSr();
            $table[$i]['rma'] = $main_repository->find($main_count_temp)->getRma();
            $table[$i]['jde'] = $main_repository->find($main_count_temp)->getJde();
            $table[$i]['pn'] = $main_repository->find($main_count_temp)->getPn();
            $table[$i]['sn'] = $main_repository->find($main_count_temp)->getSn();
            $table[$i]['customer_name'] = $main_repository->find($main_count_temp)->getCustomerName();
            $table[$i]['customer_address'] = $main_repository->find($main_count_temp)->getCustomerAddress();
            $table[$i]['customer_number'] = $main_repository->find($main_count_temp)->getcustomerNumber();
            $table[$i]['physical_damaged'] = $main_repository->find($main_count_temp)->getPhysicalDamaged();
            $table[$i]['linked_img'] = $main_repository->find($main_count_temp)->getLinkedImg();
            $table[$i]['assigned_owner'] = $main_repository->find($main_count_temp)->getAssignedOwner();
            $table[$i]['awb'] = $main_repository->find($main_count_temp)->getAwb();

            // 获取子表数据
            $sub = $sub_repository->findBy(
                array(
                    'mainTable' => $main_count_temp
                )
            );
            $sub_count = count($sub);
            $sub_count_temp = $sub_count;
            for($j = 0; $j < $sub_count; $j ++){
                $table[$i]['sub'][$j]['status'] = $sub[$sub_count_temp-1]->getStatus();
                $table[$i]['sub'][$j]['date'] = $sub[$sub_count_temp-1]->getDate()->format('Y-m-d h:i');
                $table[$i]['sub'][$j]['owner'] = $sub[$sub_count_temp-1]->getOwner();
                $sub_count_temp --;
            }
            $main_count_temp --;
        }
        return $this->render('MytestTableBundle:Default:index.html.twig',array(
            'table' => $table
        ));
    }
}