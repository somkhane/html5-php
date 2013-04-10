<?php
/**
 * @file
 * Test the Scanner. This requires the InputStream tests are all good.
 */
namespace HTML5\Parser;

require_once __DIR__ . '/../TestCase.php';

class CharacterReferenceTest extends \HTML5\Tests\TestCase {
  public function testLookupName() {
    $this->assertEquals('&', CharacterReference::lookupName('amp'));
    $this->assertEquals('<', CharacterReference::lookupName('lt'));
    $this->assertEquals('>', CharacterReference::lookupName('gt'));
    $this->assertEquals('"', CharacterReference::lookupName('quot'));
    $this->assertEquals('∌', CharacterReference::lookupName('NotReverseElement'));
  }

  public function testLookupHex() {
    $this->assertEquals('<', CharacterReference::lookupHex('3c'));
    $this->assertEquals('<', CharacterReference::lookupHex('003c'));
    $this->assertEquals('&', CharacterReference::lookupHex('26'));
    $this->assertEquals('}', CharacterReference::lookupHex('7d'));
    $this->assertEquals('Σ', CharacterReference::lookupHex('3A3'));
    $this->assertEquals('Σ', CharacterReference::lookupHex('03A3'));
    $this->assertEquals('Σ', CharacterReference::lookupHex('3a3'));
    $this->assertEquals('Σ', CharacterReference::lookupHex('03a3'));
  }

  public function testLookupDecimal() {
    $this->assertEquals('&', CharacterReference::lookupDecimal(38));
    $this->assertEquals('&', CharacterReference::lookupDecimal('38'));
    $this->assertEquals('<', CharacterReference::lookupDecimal(60));
    $this->assertEquals('Σ', CharacterReference::lookupDecimal(931));
    $this->assertEquals('Σ', CharacterReference::lookupDecimal('0931'));
  }

}
