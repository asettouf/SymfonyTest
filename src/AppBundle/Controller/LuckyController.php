<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class LuckyController extends Controller{

  /**
   * @Route("/test/numberError")
   */
   public function action(){
     $number = rand(0,100);

     throw new \Exception("Wrong page!");
    // throw $this -> createNotFoundException("Not exist");

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
     * @Route("/test/number/{count}", defaults={"count" = 3})
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

  /**
   * @Route("/test/hello")
   * @Method("GET")
   */
  public function hello(){
    $name = $this -> getRequest() -> get("name");
  //  $name = $req -> get('eee');
    $name = $name ? $name: "Toto";
    return new Response("<html><body>Hello ".$name." </body></html>");
  }
}
