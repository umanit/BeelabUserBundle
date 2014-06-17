<?php

namespace Beelab\UserBundle\Tests\Repository;

use Beelab\UserBundle\Repository\UserRepository;

class UserRepositoryTest extends \PHPUnit_Framework_TestCase
{
    protected $repository, $em, $class;

    public function setUp()
    {
        $this->em = $this->getMockBuilder('Doctrine\ORM\EntityManager')->disableOriginalConstructor()->getMock();
        $this->class = $this->getMockBuilder('Doctrine\ORM\Mapping\ClassMetadata')->disableOriginalConstructor()->getMock();

        $this->repository = new UserRepository($this->em, $this->class);
    }

    /**
     * @expectedException Symfony\Component\Security\Core\Exception\UsernameNotFoundException
     */
    public function testLoadUserByUsernameNotFound()
    {
        $queryBuilder = $this->getMockBuilder('Doctrine\ORM\QueryBuilder')->disableOriginalConstructor()->getMock();
        $query = $this->getMockBuilder('Doctrine\ORM\AbstractQuery')->setMethods(array('getOneOrNullResult'))->disableOriginalConstructor()->getMockForAbstractClass();

        $this->em->expects($this->any())->method('createQueryBuilder')->will($this->returnValue($queryBuilder));
        $queryBuilder->expects($this->any())->method('select')->will($this->returnSelf());
        $queryBuilder->expects($this->any())->method('from')->will($this->returnSelf());
        $queryBuilder->expects($this->any())->method('where')->will($this->returnSelf());
        $queryBuilder->expects($this->any())->method('setParameter')->will($this->returnSelf());
        $queryBuilder->expects($this->any())->method('getQuery')->will($this->returnValue($query));
        $query->expects($this->any())->method('getOneOrNullResult')->will($this->returnValue(null));

        $this->assertInstanceOf('Symfony\Component\Security\Core\User\UserInterface', $this->repository->loadUserByUsername('foo'));
    }

    public function testLoadUserByUsernameFound()
    {
        $user = $this->getMock('Symfony\Component\Security\Core\User\UserInterface');
        $queryBuilder = $this->getMockBuilder('Doctrine\ORM\QueryBuilder')->disableOriginalConstructor()->getMock();
        $query = $this->getMockBuilder('Doctrine\ORM\AbstractQuery')->setMethods(array('getOneOrNullResult'))->disableOriginalConstructor()->getMockForAbstractClass();

        $this->em->expects($this->any())->method('createQueryBuilder')->will($this->returnValue($queryBuilder));
        $queryBuilder->expects($this->any())->method('select')->will($this->returnSelf());
        $queryBuilder->expects($this->any())->method('from')->will($this->returnSelf());
        $queryBuilder->expects($this->any())->method('where')->will($this->returnSelf());
        $queryBuilder->expects($this->any())->method('setParameter')->will($this->returnSelf());
        $queryBuilder->expects($this->any())->method('getQuery')->will($this->returnValue($query));
        $query->expects($this->any())->method('getOneOrNullResult')->will($this->returnValue($user));

        $this->assertInstanceOf('Symfony\Component\Security\Core\User\UserInterface', $this->repository->loadUserByUsername('baz'));
    }

    public function testRefreshUserUnsupported()
    {
        $this->markTestIncomplete();
    }

    public function testRefreshUserSupported()
    {
        $this->markTestIncomplete();
    }

    public function testSupportsClass()
    {
        $this->markTestIncomplete();
    }

    public function testFindByRole()
    {
        $this->markTestIncomplete();
    }
}
