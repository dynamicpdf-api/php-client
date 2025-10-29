<?php
namespace DynamicPDF\Api;

class FullNameTable {
    public $fontName;

    public static function fromBuffer($buffer, $tableDirectory, $position) {
        $table = new FullNameTable();

        $intOffset = FullNameTable::readULong($tableDirectory, $position + 8);
        $intLength = FullNameTable::readULong($tableDirectory, $position + 12);

        $data = substr($buffer, $intOffset, $intLength);

        $dataStart = FullNameTable::readUShort($data, 4);
        $headerStart = 6;
        $headerEnd = FullNameTable::readUShort($data, 2) * 12;

        $fontName = "";

        for ($i = $headerStart; $i < $headerEnd; $i += 12) {
            if (FullNameTable::readUShort($data, $i + 6) === 4) {
                if (
                    FullNameTable::readUShort($data, $i) === 3 &&
                    FullNameTable::readUShort($data, $i + 2) === 1 &&
                    FullNameTable::readUShort($data, $i + 4) === 0x0409
                ) {
                    $offset = $dataStart + FullNameTable::readUShort($data, $i + 10);
                    $length = FullNameTable::readUShort($data, $i + 8);
                    $fontName = FullNameTable::decodeUTF16BE(substr($data, $offset, $length));
                    break;
                }
            }
        }

        // fallback
        if ($fontName === "") {
            for ($i = $headerStart; $i < $headerEnd; $i += 12) {
                if (FullNameTable::readUShort($data, $i + 6) === 4) {
                    if (
                        FullNameTable::readUShort($data, $i) === 3 &&
                        FullNameTable::readUShort($data, $i + 2) === 0 &&
                        FullNameTable::readUShort($data, $i + 4) === 0x0409
                    ) {
                        $offset = $dataStart + FullNameTable::readUShort($data, $i + 10);
                        $length = FullNameTable::readUShort($data, $i + 8);
                        $fontName = FullNameTable::decodeUTF16BE(substr($data, $offset, $length));
                        break;
                    }
                }
            }
        }

        $fontName = str_replace([" ", "-"], "", $fontName);
        $table->fontName = $fontName;

        return $table;
    }

    private static function readULong($data, $index) {
        return (ord($data[$index]) << 24) |
               (ord($data[$index + 1]) << 16) |
               (ord($data[$index + 2]) << 8) |
               ord($data[$index + 3]);
    }

    private static function readUShort($data, $index) {
        return (ord($data[$index]) << 8) | ord($data[$index + 1]);
    }

    private static function decodeUTF16BE($str) {
        $result = "";
        for ($i = 0; $i < strlen($str); $i += 2) {
            $code = (ord($str[$i]) << 8) | ord($str[$i + 1]);
            $result .= mb_convert_encoding(pack("n", $code), "UTF-8", "UTF-16BE");
        }
        return $result;
    }
}
