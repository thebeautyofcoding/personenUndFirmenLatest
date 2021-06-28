<?php
namespace Heiner\Heiner\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Heiner Giehl <heiner.giehl@tu-dortmund.de>
 */
class CompanyTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Heiner\Heiner\Domain\Model\Company
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Heiner\Heiner\Domain\Model\Company();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameForStringSetsName()
    {
        $this->subject->setName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'name',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getUnterzeileReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getUnterzeile()
        );
    }

    /**
     * @test
     */
    public function setUnterzeileForStringSetsUnterzeile()
    {
        $this->subject->setUnterzeile('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'unterzeile',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getStrasseReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getStrasse()
        );
    }

    /**
     * @test
     */
    public function setStrasseForStringSetsStrasse()
    {
        $this->subject->setStrasse('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'strasse',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPlzReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPlz()
        );
    }

    /**
     * @test
     */
    public function setPlzForStringSetsPlz()
    {
        $this->subject->setPlz('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'plz',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getOrtReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getOrt()
        );
    }

    /**
     * @test
     */
    public function setOrtForStringSetsOrt()
    {
        $this->subject->setOrt('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'ort',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTelefonReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTelefon()
        );
    }

    /**
     * @test
     */
    public function setTelefonForStringSetsTelefon()
    {
        $this->subject->setTelefon('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'telefon',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getFaxReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getFax()
        );
    }

    /**
     * @test
     */
    public function setFaxForStringSetsFax()
    {
        $this->subject->setFax('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'fax',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getWebReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getWeb()
        );
    }

    /**
     * @test
     */
    public function setWebForStringSetsWeb()
    {
        $this->subject->setWeb('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'web',
            $this->subject
        );
    }
}
