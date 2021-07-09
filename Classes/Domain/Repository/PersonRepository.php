<?php
namespace Heiner\Heiner\Domain\Repository;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;

/***
 *
 * This file is part of the "personenundfirmen" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2021 Heiner Giehl <heiner.giehl@tu-dortmund.de>, HeinerGiehl
 *
 ***/
/**
 * The repository for Persons
 */
class PersonRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    public $personRepository;
    
    /**
     * @param \Heiner\Heiner\Domain\Repository\PersonRepository $personRepository
     */
    
    public function injectPersonRepository(\Heiner\Heiner\Domain\Repository\PersonRepository $personRepository)
    {
        $this->personRepository = $personRepository;
    }
    
    /**
     * custom method: Get all Persons for a specific company
     * @param $firmaid
     * @return \Heiner\Heiner\Domain\Model\Person $persons
     */
    public function findAllPersonsBelongingToCompany(int $firmaId){
       $query= $this->personRepository->createQuery();
        $query->matching(
            $query->equals('firma.uid', $firmaId)
        );
        $persons=$query->execute();
     

        return $persons;
    }


    public function pagination(int $currentPage, int $limit)
    {
        $total = $this->createQuery()->count('uid');
        $data['pages'] = [];
        $linksShown = (int)3;
        $totalPages = (int) ceil($total / $limit);
        $total = (int) $total;
        for (
            $x = $currentPage - $linksShown;
            $x < $currentPage + $linksShown + 1;
            $x++
        ) {
            if ($x > 0 && $x <= $totalPages) {
                array_push($data['pages'], $x);
            }
        }
 
        $offset = (int) ($currentPage - 1) * $limit;
        $persons = $this->createQuery()
            ->setOffset($offset)
            ->setLimit($limit)
            ->execute();
        $data['totalPages']=$totalPages;
        $data['persons'] = $persons;
 
        return $data;
    }
    /**
     *custom method: Delete multiple entries at once
     * @param array $personsToDelete
     * @var \Heiner\Heiner\Domain\Model\Person $person
     * @return void
     */
    
    public function deleteMultipleEntries(array $personsToDelete)
    {
        foreach($personsToDelete as $person){
            $personToDelete=$this->findByUid($person);
            $this->remove($personToDelete);
        }
    }
}