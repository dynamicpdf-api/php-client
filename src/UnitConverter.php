<?php
namespace DynamicPDF\Api;

class UnitConverter
{

    public static function getPaperSize($size): array
    {
        switch ($size) {
            case PageSize::Letter:
                $smaller = UnitConverter::InchesToPoints(8.5);
                $larger = UnitConverter::InchesToPoints(11);
                break;
            case PageSize::Legal:
                $smaller = UnitConverter::InchesToPoints(8.5);
                $larger = UnitConverter::InchesToPoints(14);
                break;
            case PageSize::Executive:
                $smaller = UnitConverter::InchesToPoints(7.25);
                $larger = UnitConverter::InchesToPoints(10.5);
                break;
            case PageSize::Tabloid:
                $smaller = UnitConverter::InchesToPoints(11);
                $larger = UnitConverter::InchesToPoints(17);
                break;
            case PageSize::Envelope10:
                $smaller = UnitConverter::InchesToPoints(4.125);
                $larger = UnitConverter::InchesToPoints(9.5);
                break;
            case PageSize::EnvelopeMonarch:
                $smaller = UnitConverter::InchesToPoints(3.875);
                $larger = UnitConverter::InchesToPoints(7.5);
                break;
            case PageSize::Folio:
                $smaller = UnitConverter::InchesToPoints(8.5);
                $larger = UnitConverter::InchesToPoints(13);
                break;
            case PageSize::Statement:
                $smaller = UnitConverter::InchesToPoints(5.5);
                $larger = UnitConverter::InchesToPoints(8.5);
                break;
            case PageSize::A4:
                $smaller = UnitConverter::MillimetersToPoints(210);
                $larger = UnitConverter::MillimetersToPoints(297);
                break;
            case PageSize::A5:
                $smaller = UnitConverter::MillimetersToPoints(148);
                $larger = UnitConverter::MillimetersToPoints(210);
                break;
            case PageSize::B4:
                $smaller = UnitConverter::MillimetersToPoints(250);
                $larger = UnitConverter::MillimetersToPoints(353);
                break;
            case PageSize::B5:
                $smaller = UnitConverter::MillimetersToPoints(176);
                $larger = UnitConverter::MillimetersToPoints(250);
                break;
            case PageSize::A3:
                $smaller = UnitConverter::MillimetersToPoints(297);
                $larger = UnitConverter::MillimetersToPoints(420);
                break;
            case PageSize::B3:
                $smaller = UnitConverter::MillimetersToPoints(353);
                $larger = UnitConverter::MillimetersToPoints(500);
                break;
            case PageSize::A6:
                $smaller = UnitConverter::MillimetersToPoints(105);
                $larger = UnitConverter::MillimetersToPoints(148);
                break;
            case PageSize::B5JIS:
                $smaller = UnitConverter::MillimetersToPoints(182);
                $larger = UnitConverter::MillimetersToPoints(257);
                break;
            case PageSize::EnvelopeDL:
                $smaller = UnitConverter::MillimetersToPoints(110);
                $larger = UnitConverter::MillimetersToPoints(220);
                break;
            case PageSize::EnvelopeC5:
                $smaller = UnitConverter::MillimetersToPoints(162);
                $larger = UnitConverter::MillimetersToPoints(229);
                break;
            case PageSize::EnvelopeB5:
                $smaller = UnitConverter::MillimetersToPoints(176);
                $larger = UnitConverter::MillimetersToPoints(250);
                break;
            case PageSize::PRC16K:
                $smaller = UnitConverter::MillimetersToPoints(146);
                $larger = UnitConverter::MillimetersToPoints(215);
                break;
            case PageSize::PRC32K:
                $smaller = UnitConverter::MillimetersToPoints(97);
                $larger = UnitConverter::MillimetersToPoints(151);
                break;
            case PageSize::Quatro:
                $smaller = UnitConverter::MillimetersToPoints(215);
                $larger = UnitConverter::MillimetersToPoints(275);
                break;
            case PageSize::DoublePostcard:
                $smaller = UnitConverter::MillimetersToPoints(148.0);
                $larger = UnitConverter::MillimetersToPoints(200.0);
                break;
            case PageSize::Postcard:
                $smaller = UnitConverter::InchesToPoints(3.94);
                $larger = UnitConverter::InchesToPoints(5.83);
                break;
            default:
                $smaller = UnitConverter::InchesToPoints(8.5);
                $larger = UnitConverter::InchesToPoints(11);
        }
        return array($smaller, $larger);
    }

    private static function InchesToPoints($size)
    {
        return $size * 72.0;
    }

    private static function MillimetersToPoints($size)
    {
        return $size * 2.8346456692913385826771653543307;
    }
}