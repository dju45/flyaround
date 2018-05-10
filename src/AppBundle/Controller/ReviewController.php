<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Review;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


/**
 * Class ReviewController
 * @package AppBundle\Controller ReviewController
 * @Route("review")
 */
class ReviewController extends Controller
{
    /*
     * personal methods / variables
     */

    /**
     *
     * @Route("/{review_id}", name="review_index", requirements={"review_id": "\d+"})
     * @Method("GET")
     * @ParamConverter("review", options={"mapping": {"review_id": "id"}})
     */
    public function indexAction(Review $review)
    {
        return $this->render('review/index.html.twig', array(
            'review' => $review
        ));
    }


    /**
     * Creates a new review
     *
     * @Route("/new/", name="review_new")
     * @Method({"GET", "POST"})
     */
    public function newReview()
    {

        return $this->render('review/new.html.twig');
    }






}
