<?php

namespace RbacTest\Controller\Plugin;

use Zend\Permissions\Rbac\Rbac as ZendRbac;
use Zend\Mvc\Controller\Plugin\AbstractPlugin;

use RbacTest\Exception\AccessDeniedException;

class Rbac extends AbstractPlugin
{

    /**
     * @var \Zend\Permissions\Rbac\Rbac
     */
    protected $rbac;

    public function __construct(ZendRbac $rbac)
    {
        $this->rbac = $rbac;
    }

    /**
     * @param ZendRbac $rbac
     */
    public function setRbac(ZendRbac $rbac)
    {
        $this->rbac = $rbac;
    }

    /**
     * @return \Zend\Permissions\Rbac\Rbac
     */
    public function getRbac()
    {
        return $this->rbac;
    }

    public function checkAccess($role, $permission, $assert = null)
    {
        if (!$this->rbac->isGranted($role, $permission, $assert)) {
            throw new AccessDeniedException("Role '$role' has no permission to '$permission'.");
        }
    }
}