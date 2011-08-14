<?php
class brainfuck
{
	var $pointer=0;
	var $stack=array();
	var $loops=array();
	var $code;
	private $output;
	
	private function _killComments($code){
		preg_match_all('@[<>+-.,\[\]]+@', $code, $match);
		$ret = '';
		foreach($match[0] as $pt){
			$ret .= $pt;
		}
		return $ret;
	}
	function parse($code=''){
		$code = trim($code);
		if($code==''){
			$code = trim($this->code);
		}
		$code = $this->_killComments($code);
		$code = str_split($code);
		for($i=0; $i<count($code); $i++){
			switch($code[$i]){
				case '>':
					++$this->pointer;
					if($this->pointer<0) $this->pointer = 255;
					if($this->pointer>255) $this->pointer = 1;
				break;
				case '<':
					--$this->pointer;
					if($this->pointer<0) $this->pointer = 255;
					if($this->pointer>255) $this->pointer = 1;
				break;
				case '+':
					++$this->stack[$this->pointer];
				break;
				case '-':
					--$this->stack[$this->pointer];
				break;
				case '.':
					$this->output .= chr($this->stack[$this->pointer]);
				break;
				case ',':
					$this->stack[$this->pointer] = chr($this->stack[$this->pointer]);
				break;
				case '[':
					$this->loops[] = $i;
				break;
				case ']':
				if($this->stack[$this->pointer] == 0){
					array_pop($this->loops);
				} else{
					$i = $this->loops[count($this->loops)-1];
				}
				break;
			}
		}
		return $this->output;
	}
}
?>