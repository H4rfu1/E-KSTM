<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tools extends CI_Controller {
	// public function __construct(){
  //   parent::__construct();
  // }
	public function index(){
		$data['title'] = 'Tools';
		$this->load->view('tools/index', $data);
	}
	public function calc(){
		$data['title'] = 'calculator';
		$data['hasil'] = 'pilih dulu calculator apa';
		if(isset($_GET['type'])) {
			if($_GET['type'] === "Binominal"){
				$x = $_GET['x'];
				$s = $_GET['s'];
				$g = 1 - $s;
				$n = $_GET['n'];
				$data['hasil'] = ($this->_factorial($n)*pow($s,$x)*pow($g,$n-$x))/($this->_factorial($x)*$this->_factorial($n-$x));
			}elseif($_GET['type'] === "Poisson"){
				$x = $_GET['x'];
				$s = $_GET['s'];
				$n = $_GET['n'];
				$l = $s *$n;
				$e = 2.71828;
				$data['hasil'] = (pow($l,$x)*pow($e,-$l))/($this->_factorial($x));
			}elseif($_GET['type'] === "Hipergeometri"){
				$x = $_GET['x'];
				$r = $_GET['r'];
				$n = $_GET['n'];
				$Nb = $_GET['NB'];
				$data['hasil'] = ($this->_kombinasi($r,$x)*$this->_kombinasi($Nb-$r,$n-$x))/($this->_kombinasi($Nb,$n));
			}elseif($_GET['type'] === "Polynominal"){
				$n = $_GET['n'];
				$x1 = $_GET['x1'];
				$p1 = $_GET['p1'];
				$x2 = $_GET['x2'];
				$p2 = $_GET['p2'];
				$x3 = $_GET['x3'];
				$p3 = $_GET['p3'];
				$data['hasil'] = ($this->_factorial($n)*pow($p1,$x1)*pow($p2,$x2)*pow($p3,$x3))/($this->_factorial($x1)*$this->_factorial($x2)*$this->_factorial($x3));
			}
		}

		// }elseif (condition) {
		// 	// code...
		// }elseif (condition) {
		// 	// code...
		// }elseif (condition) {
		// 	// code...
		// }elseif (condition) {
		// 	// code...
		// }
		$this->load->view('tools/calc', $data);


	}
	private function _factorial($n){
	    if ($n <= 1) {
	        return 1;
	    } else {
	        return $n * $this->_factorial($n - 1);
	    }
		}
	private function _kombinasi($n, $r)
		{
			$fakn = $this->_factorial($n);
			$fakr = $this->_factorial($r);
			$fakd = $this->_factorial($n - $r);
							 return $fakn / ($fakr*$fakd);
		}

}
