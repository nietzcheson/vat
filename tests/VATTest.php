<?php

use nietzcheson\vat\VAT;

/**
 * @author Cristian Angulo <cristianangulonova@gmail.com>
 */

class VATTest extends PHPUnit_Framework_TestCase
{

  public function testWithVAT()
  {

    $vat = new VAT();
    $vat->setValue(100);
    $vat->setPercent(16);

    $vat = $vat->withVAT();

    $this->assertEquals(116, $vat['total']);
  }

  public function testWithoutVAT()
  {

    $vat = new VAT();
    $vat->setValue(100);
    $vat->setPercent(16);

    $vat = $vat->withOutVAT();

    $this->assertEquals(100, $vat['total']);
  }

}
