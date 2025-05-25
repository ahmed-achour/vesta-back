<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twilio\Rest\Client;
use App\Entity\Agents; // Or your User entity
use Doctrine\ORM\EntityManagerInterface;

class TwilioMessagingController extends AbstractController
{
    private $twilioClient;
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        // Initialize Twilio client with credentials from .env
        $this->twilioClient = new Client(
            $_ENV['TWILIO_ACCOUNT_SID'],
            $_ENV['TWILIO_AUTH_TOKEN']
        );
        $this->entityManager = $entityManager;
    }

    #[Route('/admin/send-sms', name: 'send_sms')]
    public function sendSms(Request $request): Response
    {
        // Get all agents (or specific users you want to message)
        $agents = $this->entityManager->getRepository(Agents::class)->findAll();
        
        $message = $request->request->get('message');
        
        if (!$message) {
            $this->addFlash('error', 'Message cannot be empty');
            return $this->redirectToRoute('admin_agents_index');
        }

        $successCount = 0;
        $failedNumbers = [];

        foreach ($agents as $agent) {
            if ($agent->getPhone()) {
                try {
                    $this->twilioClient->messages->create(
                        $agent->getPhone(), // To
                        [
                            'from' => $_ENV['TWILIO_PHONE_NUMBER'],
                            'body' => $message
                        ]
                    );
                    $successCount++;
                } catch (\Exception $e) {
                    $failedNumbers[] = $agent->getPhone();
                }
            }
        }

        if ($successCount > 0) {
            $this->addFlash('success', sprintf('Message sent to %d agents successfully', $successCount));
        }
        
        if (!empty($failedNumbers)) {
            $this->addFlash('warning', sprintf('Failed to send to %d numbers: %s', 
                count($failedNumbers), 
                implode(', ', $failedNumbers))
            );
        }

        return $this->redirectToRoute('admin_agents_index');
    }

    #[Route('/admin/send-sms-form', name: 'send_sms_form')]
    public function smsForm(): Response
    {
        return $this->render('messaging/sms_form.html.twig');
    }
}