<?php

namespace App\Controller\Admin;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @IsGranted("ROLE_ADMIN")
 * @Route("admin")
 */
class AdminController extends AbstractController
{

    /**
     * @Route("/")
     */
    public function index()
    {
        return $this->render("admin/index.html.twig");
    }
}
