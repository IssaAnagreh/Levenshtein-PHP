<?php

declare(strict_types=1);
use App\Calculations;
use PHPUnit\Framework\TestCase;

final class Test extends TestCase
{
    public function testingOfZero()
    {
        $hamming = new Hamming();
        $this->assertEquals(0, $hamming->setStrings("", ""));
        $this->assertEquals(0, $hamming->setStrings("Anagreh", "Anagreh"));
        $levenshtein = new Levenshtein();
        $this->assertEquals(0, $levenshtein->setStrings("", ""));
        $this->assertEquals(0, $levenshtein->setStrings("Issa", "Issa"));
    }
    public function testing()
    {
        $hamming = new Hamming();
        $this->assertEquals(3, $hamming->setStrings("Iss", "sa"));
        $this->assertEquals(7, $hamming->setStrings("nagre", "Anagreh"));
        $levenshtein = new Levenshtein();
        $this->assertEquals(1, $levenshtein->setStrings("Issa", "I"));
    }
}
?>

