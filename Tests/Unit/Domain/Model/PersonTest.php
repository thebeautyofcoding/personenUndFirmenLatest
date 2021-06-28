<?php
namespace Heiner\Heiner\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Heiner Giehl <heiner.giehl@tu-dortmund.de>
 */
class PersonTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Heiner\Heiner\Domain\Model\Person
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Heiner\Heiner\Domain\Model\Person();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getAnredeReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getAnrede()
        );
    }

    /**
     * @test
     */
    public function setAnredeForStringSetsAnrede()
    {
        $this->subject->setAnrede('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'anrede',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getVornameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getVorname()
        );
    }

    /**
     * @test
     */
    public function setVornameForStringSetsVorname()
    {
        $this->subject->setVorname('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'vorname',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getNachnameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getNachname()
        );
    }

    /**
     * @test
     */
    public function setNachnameForStringSetsNachname()
    {
        $this->subject->setNachname('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'nachname',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getEmailReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getEmail()
        );
    }

    /**
     * @test
     */
    public function setEmailForStringSetsEmail()
    {
        $this->subject->setEmail('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'email',
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
    public function getHandyReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getHandy()
        );
    }

    /**
     * @test
     */
    public function setHandyForStringSetsHandy()
    {
        $this->subject->setHandy('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'handy',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getFirmaReturnsInitialValueForCompany()
    {
        self::assertEquals(
            null,
            $this->subject->getFirma()
        );
    }

    /**
     * @test
     */
    public function setFirmaForCompanySetsFirma()
    {
        $firmaFixture = new \Heiner\Heiner\Domain\Model\Company();
        $this->subject->setFirma($firmaFixture);

        self::assertAttributeEquals(
            $firmaFixture,
            'firma',
            $this->subject
        );
    }
}
