<?php

	class GoogleGeocoder {
	    private $streetAddress;
	    private $geoCoordinates;
	    private $limit = 5; // default value
	    private $apiKey;
	
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
	
	    public function geocode() {
	
			echo "<br />Started at: " . microtime();
	        // Google geocoder has rate limit 
	        usleep( 1000000 / $this->limit );
	
	        // ToDo geocoder API call (simulated for now)
	        $result = base64_encode($this->streetAddress);
			
			echo "<br />Finished at: " . microtime();
			
			return $result;
	    }
	}
?>
