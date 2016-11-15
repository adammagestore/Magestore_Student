<?php
/**
 * Magestore
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Magestore.com license that is
 * available through the world-wide-web at this URL:
 * http://www.magestore.com/license-agreement.html
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Magestore
 * @package     Magestore_Student
 * @copyright   Copyright (c) 2012 Magestore (http://www.magestore.com/)
 * @license     http://www.magestore.com/license-agreement.html
 */

namespace Magestore\Student\Controller\Index;

class Save extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {

        $studentModel = $this->_objectManager->get('Magestore\Student\Model\Student');
        $id = $this->getRequest()->getParam('student_id');
        if($id){
            $student = $studentModel->load($id);
            if($student->getId()){
                $this->messageManager->addError(__('This student already exists.'));
                $this->_redirect('student/index/save');
                return;
            } else {
                try{
                    $studentModel->setStudentId(1)
                        ->setName('Adam')
                        ->setClass('Magent 2')
                        ->setUniversity('Magestore')
                        ->save();
                    $this->messageManager->addSuccess(__('You save a new student'));
                    $this->_redirect('student/index/index');
                    return;
                } catch (\Exception $e){

                }
            }
        }

    }
}