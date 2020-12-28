<?php

namespace App\Controller;

use App\Dto\EmailDTO;
use App\Factory\ConfigEmailFactory;
use App\Form\EmailFormType;
use App\service\Mailer;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EmailController extends AbstractController
{
    /**
     * @Route("/kontakt", name="email")
     */
    public function index(Request $request, ConfigEmailFactory $configEmailFactory, Mailer $mailer, LoggerInterface $logger)
    {
        $emailDto = new EmailDTO();

        $form = $this->createForm(EmailFormType::class, $emailDto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                //email_reciver is set in env file
                $email = $configEmailFactory->createConfigEmail($emailDto, $this->getParameter('email_receiver'));
                $mailer->sent($email);
            } catch (\Throwable $exception) {
                $logger->error($exception->getMessage());
                $this->addFlash('danger', 'ops.. Something went wrong. If problem will be occur, please contact with administrator');

                return $this->render('email/sent_email.html.twig', [
                    'form' => $form->createView(),
                ]);
            }

            $this->addFlash('success', 'Email has been sent');

            return $this->redirectToRoute('email');
        }

        return $this->render('email/sent_email.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
