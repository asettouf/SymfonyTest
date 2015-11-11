<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class LuckyController extends Controller{

  /**
   * @Route("/test/number")
   */
   public function action(){
     $number = rand(0,100);

     return new Response('<html><body>Lucky number: '.$number.'</body></html>');
   }

   /**
    * @Route("/test/numberjson")
    */
    public function jsonaction(){
      $number = array(
        "lucky number" => rand(0,100)
      );


      return new JsonResponse($number);
    }

    /**
     * @Route("/test/number/{count}")
     */
    public function numberAction($count){
      $number = array();
      for ($i = 0; $i < $count; $i++){
        $numbers[] = rand(0,100);
      }

    $html = $this -> renderView(
      "test/number.html.twig",
      array("numberList" => $numbers)
    );

    return new Response($html);
  }
}
