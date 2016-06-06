<?php namespace biroa\HelperClasses;

use biroa\Interfaces\ParserInterface;

class ParserHelper implements ParserInterface
{

    protected $stringToParse;

    //Patterns for split the String
    private $getBedRoomRangePattern = '/\d+\s+or\s+\d+/';
    private $getBedRoomNumPattern = '/\d+\s+bed/';
    private $getAdTypePattern = '/rent|let|sale/';
    private $getAreasPattern = '/[A-Z][a-z]+/';
    private $getPricePattern = '/\s+for\s+\d+\s+per\s+month/';
    private $getPropertyTypePattern = '/house|apartment/';
    private $getNumberPattern = '/\d+/';
    private $criteria;

    /**
     * ParserHelper constructor.
     */
    public function __construct()
    {
        $this->criteria = [
            'ad_type' => '',
            'area_type' => '',
            'price' => '',
            'bedrooms' => '',
            'min_bedrooms' => '',
            'max_bedrooms' => '',
            'property_type' => ''
        ];
    }

    /**
     * @return array
     */
    public function getCriteria()
    {
        return $this->criteria;
    }

    public function setCriteria($str)
    {
        $this->stringToParse = $str;
    }

    /**
     * @return object $this
     */
    public function getBedRoomRange()
    {
        preg_match($this->getBedRoomRangePattern, $this->stringToParse, $output_array);
        $min_max_bedrooms = $this->splitAtOr($output_array[0]);
        $this->criteria['min_bedrooms'] = (int)$min_max_bedrooms[0];
        $this->criteria['max_bedrooms'] = (int)$min_max_bedrooms[1];

        return $this;
    }

    /**
     * @return object $this
     */
    public function getBedRoomNum()
    {
        preg_match($this->getBedRoomNumPattern, $this->stringToParse, $output_array);
        $this->criteria['bedroom'] = $this->getNumber($output_array[0]);

        return $this;
    }

    /**
     * @return object $this
     */
    public function getAdType()
    {
        preg_match($this->getAdTypePattern, $this->stringToParse, $output_array);
        $this->criteria['ad_type'] = $output_array[0];

        return $this;
    }

    /**
     * @return object $this
     */
    public function getAreas()
    {
        preg_match($this->getAreasPattern, $this->stringToParse, $output_array);
        $this->criteria['area_type'] = $output_array[0];

        return $this;
    }

    /**
     * @return object $this
     */
    public function getPrice()
    {
        preg_match($this->getPricePattern, $this->stringToParse, $output_array);
        $this->criteria['price'] = $this->getNumber($output_array[0]);

        return $this;
    }

    /**
     * @return object $this
     */
    public function getPropertyType()
    {
        preg_match($this->getPropertyTypePattern, $this->stringToParse, $output_array);
        $this->criteria['property_type'] = $output_array[0];

        return $this;
    }

    /**
     * @param string $strToNum - retrieve only the numbers from the string
     *
     * @return int
     */
    protected function getNumber($strToNum)
    {
        preg_match($this->getNumberPattern, $strToNum, $output_array);

        return (int)$output_array[0];
    }

    /**
     * @param string $strToNumbers - retrieve min max room num from the string
     *
     * @return array - (min_room_numbers, max_room_numbers)
     */
    protected function splitAtOr($strToNumbers)
    {
        return explode(' or ', $strToNumbers);
    }

}




