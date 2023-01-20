<?php
namespace DynamicPDF\Api;

class UnitConverter
{
    private $_smaller;

    private $_larger;

    public function getPaperSize($size)
    {
        switch ($size) {
            case PageSize::Letter:
                $this->_smaller = $this->InchesToPoints(8.5);
                $this->_larger = $this->InchesToPoints(11);
                break;
            case PageSize::Legal:
                $this->_smaller = $this->InchesToPoints(8.5);
                $this->_larger = $this->InchesToPoints(14);
                break;
            case PageSize::Executive:
                $this->_smaller = $this->InchesToPoints(7.25);
                $this->_larger = $this->InchesToPoints(10.5);
                break;
            case PageSize::Tabloid:
                $this->_smaller = $this->InchesToPoints(11);
                $this->_larger = $this->InchesToPoints(17);
                break;
            case PageSize::Envelope10:
                $this->_smaller = $this->InchesToPoints(4.125);
                $this->_larger = $this->InchesToPoints(9.5);
                break;
            case PageSize::EnvelopeMonarch:
                $this->_smaller = $this->InchesToPoints(3.875);
                $this->_larger = $this->InchesToPoints(7.5);
                break;
            case PageSize::Folio:
                $this->_smaller = $this->InchesToPoints(8.5);
                $this->_larger = $this->InchesToPoints(13);
                break;
            case PageSize::Statement:
                $this->_smaller = $this->InchesToPoints(5.5);
                $this->_larger = $this->InchesToPoints(8.5);
                break;
            case PageSize::A4:
                $this->_smaller = $this->MillimetersToPoints(210);
                $this->_larger = $this->MillimetersToPoints(297);
                break;
            case PageSize::A5:
                $this->_smaller = $this->MillimetersToPoints(148);
                $this->_larger = $this->MillimetersToPoints(210);
                break;
            case PageSize::B4:
                $this->_smaller = $this->MillimetersToPoints(250);
                $this->_larger = $this->MillimetersToPoints(353);
                break;
            case PageSize::B5:
                $this->_smaller = $this->MillimetersToPoints(176);
                $this->_larger = $this->MillimetersToPoints(250);
                break;
            case PageSize::A3:
                $this->_smaller = $this->MillimetersToPoints(297);
                $this->_larger = $this->MillimetersToPoints(420);
                break;
            case PageSize::B3:
                $this->_smaller = $this->MillimetersToPoints(353);
                $this->_larger = $this->MillimetersToPoints(500);
                break;
            case PageSize::A6:
                $this->_smaller = $this->MillimetersToPoints(105);
                $this->_larger = $this->MillimetersToPoints(148);
                break;
            case PageSize::B5JIS:
                $this->_smaller = $this->MillimetersToPoints(182);
                $this->_larger = $this->MillimetersToPoints(257);
                break;
            case PageSize::EnvelopeDL:
                $this->_smaller = $this->MillimetersToPoints(110);
                $this->_larger = $this->MillimetersToPoints(220);
                break;
            case PageSize::EnvelopeC5:
                $this->_smaller = $this->MillimetersToPoints(162);
                $this->_larger = $this->MillimetersToPoints(229);
                break;
            case PageSize::EnvelopeB5:
                $this->_smaller = $this->MillimetersToPoints(176);
                $this->_larger = $this->MillimetersToPoints(250);
                break;
            case PageSize::PRC16K:
                $this->_smaller = $this->MillimetersToPoints(146);
                $this->_larger = $this->MillimetersToPoints(215);
                break;
            case PageSize::PRC32K:
                $this->_smaller = $this->MillimetersToPoints(97);
                $this->_larger = $this->MillimetersToPoints(151);
                break;
            case PageSize::Quatro:
                $this->_smaller = $this->MillimetersToPoints(215);
                $this->_larger = $this->MillimetersToPoints(275);
                break;
            case PageSize::DoublePostcard:
                $this->_smaller = $this->MillimetersToPoints(148.0);
                $this->_larger = $this->MillimetersToPoints(200.0);
                break;
            case PageSize::Postcard:
                $this->_smaller = $this->InchesToPoints(3.94);
                $this->_larger = $this->InchesToPoints(5.83);
                break;
            default:
                $this->_smaller = $this->InchesToPoints(8.5);
                $this->_larger = $this->InchesToPoints(11);
        }
        return array($this->_smaller,$this->_larger);
    }

    private function InchesToPoints($size)
    {
        return $size * 72.0;
    }

    private function MillimetersToPoints($size)
    {
        return $size * 2.8346456692913385826771653543307;
    }
}