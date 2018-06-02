<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 02/06/18
 * Time: 17:38
 */

namespace AppBundle\Service;



class Mailer
{

    private $mailer;
    private $templating;

    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $templating)
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
    }

    /**
     * @param $pilot
     * @param $client
     * @param $confirmation
     * @param $reservation
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function sendMail($pilot, $client, $confirmation, $reservation )
    {
        $message = (new \Swift_Message($confirmation))
            ->setFrom('reservations@flyaround.com')
            ->setTo($pilot)
            ->setBody($this->templating->render('emails/pilotConfirmation.html.twig'), 'text/html');
        $this->mailer->send($message);

        $message = (new \Swift_Message($reservation))
            ->setFrom('reservations@flyaround.com')
            ->setTo($client)
            ->setBody($this->templating->render('emails/reservation.html.twig'), 'text/html');
        $this->mailer->send($message);

    }
}