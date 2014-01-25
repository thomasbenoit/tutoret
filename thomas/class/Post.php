<?php

	class Post {

		private $NomPc;
		private $Ip;
		private $User;
		private $Service;
		private $Application;

		public function __construct($Name){
			$this->NomPc=$Name;
		}
		public function getNomPc(){
	        return $this->NomPc;
	    }
	    public function getIp(){
	        return $this->Ip;
	    }
	    public function getUser(){
	        return $this->User;
	    }
	    public function getService(){
	        return $this->Service;
	    }
	    public function getApplication(){
	        return $this->Application;
	    }

	    public function setIp(){
	    	//recuperer lip de la machine 	voir hostname -i
	    }
	    public function setUser(){
	    	//execution du script who	    	
	    }
	     public function setService(){
	    	//execution du script service	    	
	    }

 		public function setApp(){
	    	//execution du script app  	
	    }

	    public function initPC($n,$i,$u,$s,$a){
			$this->Application=$a;
			$this->User=$u;
			$this->NomPc=$n;
			$this->Ip=$i;
			$this->Service=$s;
	    }
	    public function affichePost(){
	    	echo 'Post : '.$this->getNomPc().' Ip :'.$this->getIp().' est utiliser par '.$this->getUser().' ';
	    	if(!empty($this->Service)){
		    	 $service="";
		    	foreach ($this->Service as $key => $value){
		    		$service.="Le Service : $key est $value ,"; 
		    	}
		    	echo $service;
		    }
	    }








	}




?>