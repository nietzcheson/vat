<?php

namespace nietzcheson\vat;

/**
 * @author Cristian Angulo <cristianangulonova@gmail.com>
 */

class VAT
{
  private $value;

  private $percent;

  public function setValue($value)
  {
    $this->value = $value;
  }

  public function getValue()
  {
    return $this->value;
  }

  public function setPercent($percent)
  {
    $this->percent = $percent;
  }

  public function getPercent()
  {
    return $this->percent;
  }

  /**
   * Add VAT to value
   */
  public function withVAT()
  {
    return $this->operationVAT($this->value, 1);
  }

  /**
   * Show VAT percent to value
   */
  public function withoutVAT()
  {
    return $this->operationVAT($this->value, 2);
  }

  private function percentOperation()
  {
    return $this->percent / 100;
  }

  /**
   * Operation VAT
   * @param $value Value operations
   * @param $operation Determine the kind of operation
   */

  private function operationVAT($value, $operation)
  {

    $values = [];

    switch ($operation) {
      case 1:

        $vat = $value * $this->percentOperation();
        $values = [
          'subtotal' => $value,
          'vat' => $vat,
          'total' => $value + $vat
        ];

        break;
      case 2:

      $sutotal = $value / ($this->percentOperation() + 1);
      $values = [
        'subtotal' => $sutotal,
        'vat' => $value - $sutotal,
        'total' => $value
      ];

      break;
    }

    return $values;
  }

}
