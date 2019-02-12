
<?php

class Hamming
{
    // strings from the form(might be edited from the helper class)
    private $str1;
    private $str2;

    // get the hamming algorithm value method
    private static function getStrings($str1, $str2)
    {
        // edge case: check if srt1 length is 0 to return the length of str2 as a final answer
        if (strlen($str2) !== 0 and strlen($str1) === 0) {
            echo "Hamming: " . strlen($str2);
            echo "<br>";
            return strlen($str2);
        }
        // edge case: check if srt2 length is 0 to return the length of str1 as a final answer
        if (strlen($str1) !== 0 and strlen($str2) === 0) {
            echo "Hamming: " . strlen($str1);
            echo "<br>";
            return strlen($str1);
        }

        // normal case: str1 and str2 are with higher than 0 lengths
        if (strlen($str1) !== 0 and strlen($str2) !== 0) {
            // padding the shorter str with " " to make the two strings with the same lenght
            if (strlen($str1) < strlen($str2)) {
                $str1 = $str1 . str_repeat(" ", (strlen($str2) - strlen($str1)));
            }
            if (strlen($str1) > strlen($str2)) {
                $str2 = $str2 . str_repeat(" ", (strlen($str1) - strlen($str2)));
            }

            // fill the first row of the matrix with the range of str1
            $matrix[0] = range(0, strlen($str1) - 1);
            // fill the first column of the matrix with the range of str2
            for ($i = 0; $i < strlen($str2); $i++) {
                $matrix[$i][0] = $i;
            }

            // fill in the rest of the matrix
            for ($i = 1; $i <= strlen($str2); $i++) {
                for ($j = 1; $j <= strlen($str1); $j++) {
                    // if chars from both strings are the same
                    if ($str2{$i - 1} == $str1{$j - 1}) {
                        $matrix[$i][$j] = $matrix[$i - 1][$j - 1];
                    }
                    // if chars from both strings are not the same
                    if ($str2{$i - 1} != $str1{$j - 1}) {
                        // susbstitution
                        $x = ($matrix[($i - 1)][($j - 1)]) + 1;
                        $matrix[$i][$j] = $x; 

                        // you can use this echo in below if you want to see the procces of hamming
                        /*
                        foreach ($matrix as $row) {
                        foreach ($row as $col) {
                        echo $col . ' ';
                        }
                        echo "<br>";
                        }
                        echo "<br>";
                        */
                    }
                }
            }
            // UI output
            echo "Hamming: " . $matrix[strlen($str2)][strlen($str1)];
            echo "<br>";
            // return integer value
            return $matrix[strlen($str2)][strlen($str1)];
        }
    }

    // call for the hamming algorithm method
    public function setStrings($a, $b)
    {
        return $this->getStrings($a, $b);
    }
}

class Levenshtein
{
    // strings from the form(might be edited from the helper class)
    private $str1;
    private $str2;

    // get the levenshtein algorithm value method
    private static function getStrings($str1, $str2)
    {
        // edge case: check if srt1 length is 0 to return the length of str2 as a final answer
        if (strlen($str2) !== 0 and strlen($str1) === 0) {
            echo "Levenshtein: " . strlen($str2) . "\n";
            return strlen($str2);
        }
        // edge case: check if srt2 length is 0 to return the length of str1 as a final answer
        if (strlen($str1) !== 0 and strlen($str2) === 0) {
            echo "Levenshtein: " . strlen($str1) . "\n";
            return strlen($str1);
        }

        // normal case: str1 and str2 are with higher than 0 lengths
        if (strlen($str1) !== 0 and strlen($str2) !== 0) {
            // fill the first row of the matrix with the range of str1
            $matrix[0] = range(0, strlen($str1) - 1);
            // fill the first column of the matrix with the range of str2
            for ($i = 0; $i < strlen($str2); $i++) {
                $matrix[$i][0] = $i;
            }

            // fill in the rest of the matrix
            for ($i = 1; $i <= strlen($str2); $i++) {
                for ($j = 1; $j <= strlen($str1); $j++) {
                    // if chars from both strings are the same
                    if ($str2{$i - 1} == $str1{$j - 1}) {
                        $matrix[$i][$j] = $matrix[$i - 1][$j - 1];
                    }
                    // if chars from both strings are not the same
                    if ($str2{$i - 1} != $str1{$j - 1}) {
                        $x = min($matrix[$i - 1][$j - 1] + 1, // susbstitution
                            min($matrix[$i][$j - 1] + 1, // insertion
                                $matrix[$i - 1][$j] + 1)); // deletion

                        $matrix[$i][$j] = $x;


                        // you can use this echo in below if you want to see the procces of levenshtein
                        /*
                        foreach ($matrix as $row) {
                            foreach ($row as $col) {
                                echo $col . ' ';
                            }
                            echo "<br>";
                        }
                        echo "<br>";
                        */
                    }
                }
            }
            // UI output
            echo "Levenshtein: " . $matrix[strlen($str2)][strlen($str1)] . "\n";
            // return integer value
            return $matrix[strlen($str2)][strlen($str1)];
        }
    }

    // call for the hamming algorithm method
    public function setStrings($a, $b)
    {
        return $this->getStrings($a, $b);
    }
}

class Helpers
{
    public static function helper($a, $b)
    {
        // trim the white spaces from the left and the right hand side of the input strings
        $a = trim($a, " ");
        $b = trim($b, " ");

        // if the strings have no chars then ask for adding chars
        if (strlen($a) === 0 and strlen($b) === 0) {
            echo "Please add a and b, or atleaset one of them" . "\n";
        }

        // if the strings are OKii
        // Hamming new instance
        $hamming_dis = new Hamming();
        // call for setStrings method
        $hamming_dis->setStrings($a, $b);
        // Levenshtein new instance
        $levenshtein_dis = new Levenshtein();
        // call for setStrings method
        $levenshtein_dis->setStrings($a, $b);
    }

}

// the inputs are from the terminal
if (is_string($argv[1]) and is_string($argv[2])) {
    // trim the white spaces from the left and the right hand side of the input strings
    $a = trim($argv[1], " ");
    $b = trim($argv[2], " ");

    // Hamming new instance
    $levenshtein_dis = new Levenshtein();
    // call for setStrings method
    $levenshtein_dis->setStrings($a, $b);
}

// the inputs are from the UI
if (!is_string($argv[1]) and !is_string($argv[2])) {
    // Helpers new instance
    $helper = new Helpers();
    // call for helper method
    $helper->helper($_POST["a"], $_POST["b"]);
}
?>