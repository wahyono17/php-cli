<?php

class helloword
{
    private $sentence;

    function __construct(){
        echo "Please write the sentence:  ";
        $this->sentence = trim(fgets(STDIN));
    }

    function uppercase(){

        $yono = $this->sentence;
        echo strtoupper($yono);
    }

    function smallFirstWord(){
        $sentence = $this->sentence;

        $array = explode(" ",$sentence);

        $empty = [];
        for($y=0; $y< count($array); $y++){

            $split = str_split($array[$y]);

            for($i=0; $i< count($split); $i++){
                if($i == 0){
                    array_push($empty,$split[$i]);

                }else{
                    $upword = ucwords($split[$i]);
                    array_push($empty,$upword);
                }

            }

            array_push($empty," ");
        }

        $result = implode($empty);
        echo $result;

    }

    function createXml(){
        $originalWord = $this->sentence;

        $explode = explode(" ", $originalWord);

        $empty = [];
        foreach($explode as $item){
            $split = str_split($item);
            foreach($split as $one){
                array_push($empty,$one);
            }
        }

        $xml = new DomDocument( "1.0" );
        //create element using createElelement();
        //append child to parrent using appendChild();

        //this for format down
        $xml->formatOutput = true;

        //*************create root element***//
        $sentences = $xml->createElement("sentences");
        $xml->appendChild($sentences);
        //******************** */

        $sentence = $xml->createElement("sentence");
        $sentences->appendChild($sentence);

        for($i=0; $i<count($empty); $i++){
            $word = $xml->createElement("word",$empty[$i]);
            $sentence->appendChild($word);
        }

        //echo "<xmp>".$xml->saveXML()."</xmp>";

        //this for save xlm
        $xml->save("tryoop.xml") or die("error unable save xml");

        echo "xml created";
    }
}

$hello = new helloword;
$hello->uppercase();
echo "\n"; //for call next line
$hello->smallFirstWord();
echo "\n";
$hello->createXml();

?>