<?php
/**
 * E*TRADE PHP SDK
 *
 * @package    	PHP-SDK
 * @version		1.1
 * @copyright  	Copyright (c) 2012 E*TRADE FINANCIAL Corp.
 *
 */

class PlaceChangeEquityOrder extends RequestParamsMain
{
	protected $changeEquityOrderRequest;
	function __construct($changeEquityOrderRequest)
	{
		$this->changeEquityOrderRequest = $changeEquityOrderRequest;
	}
}

?>