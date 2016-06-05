<?php namespace biroa\Controllers;

use biroa\Template\Renderer;
use Http\Request;
use Http\Response;

class HomeController
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
    
    public function show()
    {
        $data = [
            'title' => $this->request->getParameter('title', 'Search on Daft'),
            'name' => $this->request->getParameter('name', 'name'),
        ];
        $html = $this->renderer->render('Home.template', $data);
        $this->response->setContent($html);
    }
}