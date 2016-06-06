<?php namespace biroa\Interfaces;

interface ParserInterface {
    
    /**
     * @return object
     */
    public function getBedRoomRange();
    
    /**
     * @return object
     */
    public function getBedRoomNum();
    
    /**
     * @return object
     */
    public function getAdType();
    
    /**
     * @return object
     */
    public function getAreas();
    
    /**
     * @return object
     */
    public function getPrice();
    
    /**
     * @return object
     */
    public function getPropertyType();

}