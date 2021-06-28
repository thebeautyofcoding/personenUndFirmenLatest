<?php
namespace Heiner\Heiner\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Heiner Giehl <heiner.giehl@tu-dortmund.de>
 */
class CompanyControllerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Heiner\Heiner\Controller\CompanyController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Heiner\Heiner\Controller\CompanyController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllCompaniesFromRepositoryAndAssignsThemToView()
    {

        $allCompanies = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $companyRepository = $this->getMockBuilder(\Heiner\Heiner\Domain\Repository\CompanyRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $companyRepository->expects(self::once())->method('findAll')->will(self::returnValue($allCompanies));
        $this->inject($this->subject, 'companyRepository', $companyRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('companies', $allCompanies);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenCompanyToView()
    {
        $company = new \Heiner\Heiner\Domain\Model\Company();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('company', $company);

        $this->subject->showAction($company);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenCompanyToCompanyRepository()
    {
        $company = new \Heiner\Heiner\Domain\Model\Company();

        $companyRepository = $this->getMockBuilder(\Heiner\Heiner\Domain\Repository\CompanyRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $companyRepository->expects(self::once())->method('add')->with($company);
        $this->inject($this->subject, 'companyRepository', $companyRepository);

        $this->subject->createAction($company);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenCompanyToView()
    {
        $company = new \Heiner\Heiner\Domain\Model\Company();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('company', $company);

        $this->subject->editAction($company);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenCompanyInCompanyRepository()
    {
        $company = new \Heiner\Heiner\Domain\Model\Company();

        $companyRepository = $this->getMockBuilder(\Heiner\Heiner\Domain\Repository\CompanyRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $companyRepository->expects(self::once())->method('update')->with($company);
        $this->inject($this->subject, 'companyRepository', $companyRepository);

        $this->subject->updateAction($company);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenCompanyFromCompanyRepository()
    {
        $company = new \Heiner\Heiner\Domain\Model\Company();

        $companyRepository = $this->getMockBuilder(\Heiner\Heiner\Domain\Repository\CompanyRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $companyRepository->expects(self::once())->method('remove')->with($company);
        $this->inject($this->subject, 'companyRepository', $companyRepository);

        $this->subject->deleteAction($company);
    }
}
