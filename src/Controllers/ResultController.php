<?php namespace biroa\Controllers;

use biroa\HelperClasses\ParserHelper;
use biroa\Template\Renderer;
use Http\Request;
use Http\Response;

class ResultController
{
    private $request;
    private $response;
    private $renderer;
    private $parserHelper;

    /**
     * ResultController constructor.
     *
     * @param \Http\Request                     $request
     * @param \Http\Response                    $response
     * @param \biroa\Template\Renderer          $renderer
     * @param \biroa\HelperClasses\ParserHelper $parserHelper
     */
    public function __construct(Request $request, Response $response,
                                Renderer $renderer, ParserHelper $parserHelper)
    {
        $this->request  = $request;
        $this->response = $response;
        $this->renderer = $renderer;
        $this->parserHelper = $parserHelper;
    }

    /**
     * Parsing the data we get from the input field
     */
    public function proceed(){
        $search_query = $this->request->getParameter('keyword');
        $this->parserHelper->setCriteria($search_query);
        $search_query = $this->parserHelper
            ->getPrice()
            ->getBedRoomNum()
            ->getAdType()
            ->getAreas()
            ->getPropertyType()
            ->getBedRoomRange()
            ->getCriteria();
        var_dump($search_query);
    }
}