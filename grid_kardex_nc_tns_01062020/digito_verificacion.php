<?php
//__NM__para obtener el digito de verificacion del documento de un cliente__NM__FUNCTION__NM__//
//CALCULO DEL DIGITO DE VERIFICACION
function fObtenerDigitoV($vdocu)
{
	$long=strlen($vdocu);
	$str=$vdocu;
	$arr = str_split($str);//convierte en array la cadena
	
	switch ($long)
	{
		case 4:
			$valor=$arr[3]*3+$arr[2]*7+$arr[1]*13+$arr[0]*17;
			$dig=$valor%11;
			if($dig==1 or $dig==0)
			{
				return $dig;
			}
			else
			{
				return 11-$dig;
			}
		break;

		case 5:
			$valor=$arr[0]*19+$arr[1]*17+$arr[2]*13+$arr[3]*7+$arr[4]*3;
			$dig=$valor%11;
			if($dig==1 or $dig==0)
			{
				return $dig;
			}
			else
			{
				return 11-$dig;
			}
		break;

		case 6:
			$valor=$arr[0]*23+$arr[1]*19+$arr[2]*17+$arr[3]*13+$arr[4]*7+$arr[5]*3;
			$dig=$valor%11;
			if($dig==1 or $dig==0)
			{
				return $dig;
			}
			else
			{
				return 11-$dig;
			}
		break;

		case 7:
			$valor=$arr[0]*29+$arr[1]*23+$arr[2]*19+$arr[3]*17+$arr[4]*13+$arr[5]*7+$arr[6]*3;
			$dig=$valor%11;
			if($dig==1 or $dig==0)
			{
				return $dig;
			}
			else
			{
				return 11-$dig;
			}
		break;

		case 8:
			$valor=$arr[0]*37+$arr[1]*29+$arr[2]*23+$arr[3]*19+$arr[4]*17+$arr[5]*13+$arr[6]*7+$arr[7]*3;
			$dig=$valor%11;
			if($dig==1 or $dig==0)
			{
				return $dig;
			}
			else
			{
				return 11-$dig;
			}
		break;

		case 9:
			$valor=$arr[0]*41+$arr[1]*37+$arr[2]*29+$arr[3]*23+$arr[4]*19+$arr[5]*17+$arr[6]*13+$arr[7]*7+$arr[8]*3;
			$dig=$valor%11;
			if($dig==1 or $dig==0)
			{
				return $dig;
			}
			else
			{
				return 11-$dig;
			}
		break;

		case 10:
			$valor=$arr[0]*43+$arr[1]*41+$arr[2]*37+$arr[3]*29+$arr[4]*23+$arr[5]*19+$arr[6]*17+$arr[7]*13+$arr[8]*7+$arr[9]*3;
			$dig=$valor%11;
			if($dig==1 or $dig==0)
			{
				return $dig;
			}
			else
			{
				return 11-$dig;
			}
		break;
	}
		
}

class Array2XML {

    private static $xml = null;
  private static $encoding = 'UTF-8';

    /**
     * Initialize the root XML node [optional]
     * @param $version
     * @param $encoding
     * @param $format_output
     */
    public static function init($version = '1.0', $encoding = 'UTF-8', $format_output = true) {
        self::$xml = new DomDocument($version, $encoding);
        self::$xml->formatOutput = $format_output;
		self::$encoding = $encoding;
    }

    /**
     * Convert an Array to XML
     * @param string $node_name - name of the root node to be converted
     * @param array $arr - aray to be converterd
     * @return DomDocument
     */
    public static function &createXML($node_name, $arr=array()) {
        $xml = self::getXMLRoot();
        $xml->appendChild(self::convert($node_name, $arr));

        self::$xml = null;    // clear the xml node in the class for 2nd time use.
        return $xml;
    }

    /**
     * Convert an Array to XML
     * @param string $node_name - name of the root node to be converted
     * @param array $arr - aray to be converterd
     * @return DOMNode
     */
    private static function &convert($node_name, $arr=array()) {

        //print_arr($node_name);
        $xml = self::getXMLRoot();
        $node = $xml->createElement($node_name);

        if(is_array($arr)){
            // get the attributes first.;
            if(isset($arr['@attributes'])) {
                foreach($arr['@attributes'] as $key => $value) {
                    if(!self::isValidTagName($key)) {
                        throw new Exception('[Array2XML] Illegal character in attribute name. attribute: '.$key.' in node: '.$node_name);
                    }
                    $node->setAttribute($key, self::bool2str($value));
                }
                unset($arr['@attributes']); //remove the key from the array once done.
            }

            // check if it has a value stored in @value, if yes store the value and return
            // else check if its directly stored as string
            if(isset($arr['@value'])) {
                $node->appendChild($xml->createTextNode(self::bool2str($arr['@value'])));
                unset($arr['@value']);    //remove the key from the array once done.
                //return from recursion, as a note with value cannot have child nodes.
                return $node;
            } else if(isset($arr['@cdata'])) {
                $node->appendChild($xml->createCDATASection(self::bool2str($arr['@cdata'])));
                unset($arr['@cdata']);    //remove the key from the array once done.
                //return from recursion, as a note with cdata cannot have child nodes.
                return $node;
            }
        }

        //create subnodes using recursion
        if(is_array($arr)){
            // recurse to get the node for that key
            foreach($arr as $key=>$value){
                if(!self::isValidTagName($key)) {
                    throw new Exception('[Array2XML] Illegal character in tag name. tag: '.$key.' in node: '.$node_name);
                }
                if(is_array($value) && is_numeric(key($value))) {
                    // MORE THAN ONE NODE OF ITS KIND;
                    // if the new array is numeric index, means it is array of nodes of the same kind
                    // it should follow the parent key name
                    foreach($value as $k=>$v){
                        $node->appendChild(self::convert($key, $v));
                    }
                } else {
                    // ONLY ONE NODE OF ITS KIND
                    $node->appendChild(self::convert($key, $value));
                }
                unset($arr[$key]); //remove the key from the array once done.
            }
        }

        // after we are done with all the keys in the array (if it is one)
        // we check if it has any text value, if yes, append it.
        if(!is_array($arr)) {
            $node->appendChild($xml->createTextNode(self::bool2str($arr)));
        }

        return $node;
    }

    /*
     * Get the root XML node, if there isn't one, create it.
     */
    private static function getXMLRoot(){
        if(empty(self::$xml)) {
            self::init();
        }
        return self::$xml;
    }

    /*
     * Get string representation of boolean value
     */
    private static function bool2str($v){
        //convert boolean to text value.
        $v = $v === true ? 'true' : $v;
        $v = $v === false ? 'false' : $v;
        return $v;
    }

    /*
     * Check if the tag name or attribute name contains illegal characters
     * Ref: http://www.w3.org/TR/xml/#sec-common-syn
     */
    private static function isValidTagName($tag){
        $pattern = '/^[a-z_]+[a-z0-9\:\-\.\_]*[^:]*$/i';
        return preg_match($pattern, $tag, $matches) && $matches[0] == $tag;
    }
}
?>