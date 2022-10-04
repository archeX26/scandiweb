<?php

class Product
{
    private  $ID;
    private  $SKU;
    private  $Name;
    private  $Price;
    private  $Type;
    private  $MB;
    private  $KG;
    private  $Height;
    private  $Width;
    private  $Length;

    /**
     * @param $ID
     * @param $SKU
     * @param $Name
     * @param $Price
     * @param $Type
     * @param $MB
     * @param $KG
     * @param $Height
     * @param $Width
     * @param $Length
     */
    public function __construct($ID, $SKU, $Name, $Price, $Type, $MB, $KG, $Height, $Width, $Length)
    {
        $this->ID = $ID;
        $this->SKU = $SKU;
        $this->Name = $Name;
        $this->Price = $Price;
        $this->Type = $Type;
        $this->MB = $MB;
        $this->KG = $KG;
        $this->Height = $Height;
        $this->Width = $Width;
        $this->Length = $Length;
    }

    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @param mixed $ID
     */
    public function setID($ID): void
    {
        $this->ID = $ID;
    }

    /**
     * @return mixed
     */
    public function getSKU()
    {
        return $this->SKU;
    }

    /**
     * @param mixed $SKU
     */
    public function setSKU($SKU): void
    {
        $this->SKU = $SKU;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @param mixed $Name
     */
    public function setName($Name): void
    {
        $this->Name = $Name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->Price;
    }

    /**
     * @param mixed $Price
     */
    public function setPrice($Price): void
    {
        $this->Price = $Price;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->Type;
    }

    /**
     * @param mixed $Type
     */
    public function setType($Type): void
    {
        $this->Type = $Type;
    }

    /**
     * @return mixed
     */
    public function getMB()
    {
        return $this->MB;
    }

    /**
     * @param mixed $MB
     */
    public function setMB($MB): void
    {
        $this->MB = $MB;
    }

    /**
     * @return mixed
     */
    public function getKG()
    {
        return $this->KG;
    }

    /**
     * @param mixed $KG
     */
    public function setKG($KG): void
    {
        $this->KG = $KG;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->Height;
    }

    /**
     * @param mixed $Height
     */
    public function setHeight($Height): void
    {
        $this->Height = $Height;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->Width;
    }

    /**
     * @param mixed $Width
     */
    public function setWidth($Width): void
    {
        $this->Width = $Width;
    }

    /**
     * @return mixed
     */
    public function getLength()
    {
        return $this->Length;
    }

    /**
     * @param mixed $Length
     */
    public function setLength($Length): void
    {
        $this->Length = $Length;
    }




}



//
//class Product
//{
//    private ?int $ID;
//    private string $SKU;
//    private string $Name;
//    private float $Price;
//    private string $Type;
//    private ?float $MB;
//    private ?float $KG;
//    private ?float $Height;
//    private ?float $Width;
//    private ?float $Length;
//
//    /**
//     * @param int $ID
//     * @param string $SKU
//     * @param string $Name
//     * @param float $Price
//     * @param string $Type
//     * @param float $MB
//     * @param float $KG
//     * @param float $Height
//     * @param float $Width
//     * @param float $Length
//     */
//    public function __construct(?int $ID, string $SKU, string $Name, float $Price, string $Type, ?float $MB, ?float $KG, ?float $Height, ?float $Width, ?float $Length)
//    {
//        $this->ID = $ID;
//        $this->SKU = $SKU;
//        $this->Name = $Name;
//        $this->Price = $Price;
//        $this->Type = $Type;
//        $this->MB = $MB;
//        $this->KG = $KG;
//        $this->Height = $Height;
//        $this->Width = $Width;
//        $this->Length = $Length;
//    }
//
//    /**
//     * @return int|null
//     */
//    public function getID(): ?int
//    {
//        return $this->ID;
//    }
//
//    /**
//     * @param int|null $ID
//     */
//    public function setID(?int $ID): void
//    {
//        $this->ID = $ID;
//    }
//
//    /**
//     * @return string
//     */
//    public function getSKU(): string
//    {
//        return $this->SKU;
//    }
//
//    /**
//     * @param string $SKU
//     */
//    public function setSKU(string $SKU): void
//    {
//        $this->SKU = $SKU;
//    }
//
//    /**
//     * @return string
//     */
//    public function getName(): string
//    {
//        return $this->Name;
//    }
//
//    /**
//     * @param string $Name
//     */
//    public function setName(string $Name): void
//    {
//        $this->Name = $Name;
//    }
//
//    /**
//     * @return float
//     */
//    public function getPrice(): float
//    {
//        return $this->Price;
//    }
//
//    /**
//     * @param float $Price
//     */
//    public function setPrice(float $Price): void
//    {
//        $this->Price = $Price;
//    }
//
//    /**
//     * @return string
//     */
//    public function getType(): string
//    {
//        return $this->Type;
//    }
//
//    /**
//     * @param string $Type
//     */
//    public function setType(string $Type): void
//    {
//        $this->Type = $Type;
//    }
//
//    /**
//     * @return float|null
//     */
//    public function getMB(): ?float
//    {
//        return $this->MB;
//    }
//
//    /**
//     * @param float|null $MB
//     */
//    public function setMB(?float $MB): void
//    {
//        $this->MB = $MB;
//    }
//
//    /**
//     * @return float|null
//     */
//    public function getKG(): ?float
//    {
//        return $this->KG;
//    }
//
//    /**
//     * @param float|null $KG
//     */
//    public function setKG(?float $KG): void
//    {
//        $this->KG = $KG;
//    }
//
//    /**
//     * @return float|null
//     */
//    public function getHeight(): ?float
//    {
//        return $this->Height;
//    }
//
//    /**
//     * @param float|null $Height
//     */
//    public function setHeight(?float $Height): void
//    {
//        $this->Height = $Height;
//    }
//
//    /**
//     * @return float|null
//     */
//    public function getWidth(): ?float
//    {
//        return $this->Width;
//    }
//
//    /**
//     * @param float|null $Width
//     */
//    public function setWidth(?float $Width): void
//    {
//        $this->Width = $Width;
//    }
//
//    /**
//     * @return float|null
//     */
//    public function getLength(): ?float
//    {
//        return $this->Length;
//    }
//
//    /**
//     * @param float|null $Length
//     */
//    public function setLength(?float $Length): void
//    {
//        $this->Length = $Length;
//    }
//
//
//
//
//}
