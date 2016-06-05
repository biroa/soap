<?php namespace biroa\Template;

interface Renderer
{
public function render($template, $data = []);
}