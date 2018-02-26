<?php

namespace GST\ImmobilierBundle\Repository;

/**
 * BienRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BienRepository extends \Doctrine\ORM\EntityRepository
{
    // public function findBienByValues($idLocalite = 0, $idType = 0, $prix_loc = 0)
        
     
    // {
public function findBienByValues($localite,$typebien,$prix_loc){ 
        
            
    $query = $this->createQueryBuilder('b')
    ->join('b.localite', 'l')
    ->join('b.typebien', 't')
    ->addSelect('l')
    ->addSelect('t')    
    ->WHERE('l.id = :localite OR t.id = :typebien ')
    ->setParameters(array('localite' => $localite, 'typebien' => $typebien));

    return $query->getQuery()->getResult();
}
        }
//         $dql = "SELECT b, i FROM GST\ImmobilierBundle\Entity\Bien b 
//         left Join b.images i Join b.typebien t Join b.localite l WHERE b.etat = 1";
//         if ($idLocalite != 0) {
//             $dql .= ' AND l.id = :idLoc';
//         }
//         if ($idType != 0) {
//             $dql .= ' AND t.id = :idType';
//         }
//         if ($prix_loc != 0) {
//             $dql .= ' AND b.prix_loc BETWEEN :prixMin AND :prixMax';
//         }

//         $query = $this->getEntityManager()->createQuery($dql);

//         if ($idLocalite != 0) {
//             $query->setParameter('idLoc', $idLocalite);
//         }
//         if ($idType != 0) {
//             $query->setParameter('idType', $idType);
//         }
//         if ($prix_loc != 0) {
//             $query->setParameter('prixMin', $prix_loc - 10000)
//             ->setParameter('prixMax', $prix_loc + 20000);
//         }

//         return $query->getResult();
//     }

// }