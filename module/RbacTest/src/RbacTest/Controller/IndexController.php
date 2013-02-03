<?php

namespace RbacTest\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function publicAreaAction()
    {
        // no rbac here
        return new ViewModel();
    }

    public function membersOnlyAction()
    {
        $this->rbac()->checkAccess('member_access');
        return new ViewModel();
    }

    public function administrationAction()
    {
        $this->rbac()->checkAccess('administration');
        return new ViewModel();
    }
}
