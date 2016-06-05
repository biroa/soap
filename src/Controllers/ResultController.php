<?php namespace biroa\Controllers;

use biroa\Template\Renderer;
use Http\Request;
use Http\Response;

class ResultController
{
    private $request;
    private $response;
    private $renderer;

    public function __construct(Request $request, Response $response,
                                Renderer $renderer)
    {
        $this->request  = $request;
        $this->response = $response;
        $this->renderer = $renderer;
    }


    public function proceed(){

        var_dump($this->request->getParameter('keyword'));
    }
}