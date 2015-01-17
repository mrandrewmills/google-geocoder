<?php

	class GoogleGeocoder {
	    private $streetAddress;
	    private $geoCoordinates;
	    private $limit = 5; // default value
	    private $apiKey;
	    private $outputFormat = "json"; // can be json or xml
	    private $fullResponse;
	
	    // Getters & Setters
	    public function getStreetAddress() {
	        return $this->streetAddress;
	    }
	
	    public function setStreetAddress($streetAddress) {
	        $this->streetAddress = $streetAddress;
	    }
	
	    public function getGeoCoordinates() {
	        return $this->geoCoordinates;
	    }
	
	    public function setGeoCoordinates($geoCoordinates) {
	        $this->geoCoordinates = $geoCoordinates;
	    }
	
	    public function getLimit() {
	        return $this->limit;
	    }
	
	    public function setLimit($limit) {
	        $this->limit = $limit;
	    }
	
	    public function getApiKey() {
	        return $this->apiKey;
	    }
	
	    public function setApiKey($apiKey) {
	        $this->apiKey = $apiKey;
	    }
		
	    public function getOutputFormat() {
		return $this->outputFormat;
	    }
		
	    public function setOutputFormat($outputFormat) {
		$this->outputFormat = $outputFormat;
	    }
	
	    public function geocode() {
	
	        // Google geocoder has rate limit 
	        usleep( 1000000 / $this->limit );

		// let's build our URL
		$baseURL = "https://maps.googleapis.com/maps/api/geocode/";
		$output = $this->outputFormat;
		$addressURL = "?address=" . rawurlencode($this->streetAddress);
		$keyURL = "&key=" . $this->apiKey;

		// now let's put them all together
		$fullURL = $baseURL . $output . $addressURL . $keyURL;
	
		// now let's ask Google for the geocode information	
		$this->fullResponse = file_get_contents($fullURL);
	
		// ToDo: check status of the response, to make sure everything is good
		// ToDo: convert response to array, parse for coordinates
			
		// return full response for right now.
		return $this->fullResponse;
	    }
	}
?>