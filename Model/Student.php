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

namespace Magestore\Student\Model;

use Magestore\Student\Api\Data\StudentInterface;

class Student extends \Magento\Framework\Model\AbstractExtensibleModel implements StudentInterface
{
    /**
     * @inheritdoc
     */
    public function _construct()
    {
        parent::_construct();
        $this->_init('Magestore\Student\Model\ResourceModel\Student');
    }

    /**
     * @inheritdoc
     */
    public function getStudentId()
    {
        // TODO: Implement getStudentId() method.
        return $this->getData(self::STUDENT_ID);
    }

    /**
     * @inheritdoc
     */
    public function setStudentId($id)
    {
        // TODO: Implement setStudentId() method.
        return $this->setData(self::STUDENT_ID, $id);
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        // TODO: Implement getName() method.
        return $this->getData(self::STUDENT_NAME);
    }

    /**
     * @inheritdoc
     */
    public function setName($name)
    {
        // TODO: Implement setName() method.
        return $this->setData(self::STUDENT_NAME, $name);
    }

    /**
     * @inheritdoc
     */
    public function getClass()
    {
        // TODO: Implement getClass() method.
        return $this->getData(self::STUDENT_CLASS);
    }

    /**
     * @inheritdoc
     */
    public function setClass($class)
    {
        // TODO: Implement setClass() method.
        return $this->setData(self::STUDENT_CLASS, $class);
    }

    /**
     * @inheritdoc
     */
    public function getUniversity()
    {
        // TODO: Implement getUniversity() method.
        return $this->getData(self::STUDENT_UNIVERSITY);
    }

    /**
     * @inheritdoc
     */
    public function setUniversity($university)
    {
        // TODO: Implement setUniversity() method.
        return $this->setData(self::STUDENT_UNIVERSITY, $university);
    }
}